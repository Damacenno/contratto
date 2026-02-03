<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use App\Models\Contract;
use App\Models\ContractType;
use App\Models\Company;
use App\Models\Template;
use App\Models\ContractFieldMapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::with(['company', 'status'])
            ->get()
            ->filter(fn($contract) => Gate::allows('view', $contract))
            ->values();

        return Inertia::render('Contracts/Contracts', [
            'contracts' => $contracts->map(fn($contract) => [
                'id' => $contract->id,
                'contract_number' => $contract->contract_number,
                'access_level' => $contract->access_level,
                'client_name' => $contract->client_name,
                'start_date' => $contract->start_date,
                'end_date' => $contract->end_date,
                'status' => $contract->status ? $contract->status->contract_status_name : 'Sem Status',
                'can' => [
                    'view' => true,
                ],
            ]),
        ]);
    }

    public function startContract(Request $request)
    {
        $user = auth()->user();

        $contractTypes = ContractType::select(
            'id',
            'contract_type_name',
            'contract_template_id'
        )->get();

        $fields = collect();
        $templateHtml = null;

        if ($request->filled('contract_type_id')) {
            $contractType = ContractType::find($request->contract_type_id);

            if ($contractType) {
                $fields = ContractFieldMapping::where(
                    'contract_type_id',
                    $contractType->id
                )->get();

                if ($contractType->contract_template_id) {
                    $template = Template::find($contractType->contract_template_id);
                    $templateHtml = $template?->html_content;
                }
            }
        }
        $company = null;

        if ($user && $user->company_id) {
            $companyModel = Company::find($user->company_id);

            if ($companyModel) {
                $company = [
                    'company_name' => $companyModel->company_name,
                    'company_document' => $companyModel->company_document,
                    'company_agency' => $companyModel->company_agency,
                    'company_account' => $companyModel->company_account,
                    'company_bank' => $companyModel->company_bank,
                    'company_pix' => $companyModel->company_pix,
                    'company_city' => $companyModel->company_city,
                ];
            }
        }

        return Inertia::render('Contracts/CreateContract', [
            'contractTypes' => $contractTypes,
            'fields' => $fields,
            'selectedContractTypeId' => $request->filled('contract_type_id')
                ? (int) $request->contract_type_id
                : null,
            'company' => $company,
            'templateHtml' => $templateHtml,
        ]);
    }

    public function showDetails(Contract $contract)
    {

        if (auth()->user()->cannot('view', $contract)) {
            return redirect()->route('contracts.index')->with([
                'error' => 'Seu nível de acesso não permite visualizar este contrato.',
                'error_status' => 403
            ]);
        }
        $contract->load(['status', 'type.template', 'company.company']);
        $templateHtml = $contract->type?->template?->html_content ?? '';

        return Inertia::render('Contracts/ContractDetail', [
            'contract' => array_merge($contract->toArray(), [
                'status_name' => $contract->status?->contract_status_name ?? 'Pendente',
                'company_name' => $contract->company?->company?->company_name,
                'company_city' => $contract->company?->company?->company_city,
                'company_document' => $contract->company?->company?->company_document,
                'company_agency' => $contract->company?->company?->company_agency,
                'company_account' => $contract->company?->company?->company_account,
                'company_pix' => $contract->company?->company?->company_pix,
                'company_bank' => $contract->company?->company?->company_bank,
                'regret_period_days' => $contract->regret_period,
                'contract_duration_month' => $contract->contract_duration_months,
                'contract_date' => $contract->start_date,
                'contractor_name' => $contract->client_name,
                'contract_file_url' => $contract->contract_file_url
            ]),
            'templateHtml' => $templateHtml,
        ]);
    }

    public function create($object)
    {
        // dd($object['contract_number']);
        return Contract::create([
            'contract_number' => $object['contract_number'],
            'contract_type_id' => $object['contract_type_id'],
            'contract_company_owner_id' => auth()->user()->company_id,
            'contract_status_id' => 1,
            'client_name' => $object['contractor_name'],
            'payment_total' => $object['payment_total'],
            'regret_period' => $object['regret_period_days'],
            'payment_initial' => $object['payment_initial'],
            'payment_final' => $object['payment_final'],
            'start_date' => now(),
            'end_date' => now()->addMonths((int) $object['contract_duration_month']),
            'contract_duration_months' => $object['contract_duration_month'],
            'contract_file_url' => $object['contract_file_url'],
            'is_signed' => false,
            'access_level' => 'owner',
        ]);
    }

    public function getTemplatesPage()
    {
        $templates = Template::all();
        return Inertia::render('Contracts/Templates', [
            'templates' => $templates
        ]);
    }

    public function generateSignatureLink(Contract $contract)
    {
        $url = URL::temporarySignedRoute(
            'public.contract.sign',
            now()->addDays(2),
            ['contract' => $contract->id]
        );

        return response()->json([
            'link' => $url,
            'message' => 'Link de assinatura gerado com sucesso!'
        ]);
    }

    public function publicVerifyAndSign(Request $request, Contract $contract)
    {
        if (auth()->check()) {
            return redirect()->route('contracts.show', $contract->id)
                ->with('error', 'Atenção: Você está logado no sistema. O link de assinatura é exclusivo para clientes externos.');
        }

        $html = $contract->template_html;
        $data = $contract->toArray();

        foreach ($data as $key => $value) {
            $displayValue = $value ?? "___";
            if (is_bool($value))
                $displayValue = $value ? 'Sim' : 'Não';
            $html = str_replace('${{' . $key . '}}', $displayValue, $html);
        }
        $contract->rendered_content = $html;

        return inertia('Public/SignContract', [
            'contract' => $contract->only([
                'id',
                'contract_number',
                'client_name',
                'rendered_content'
            ]),
            'user_ip' => $request->ip()
        ]);
    }
}
