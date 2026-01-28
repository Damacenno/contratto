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
                'contractor_name' => $contract->client_name
            ]),
            'templateHtml' => $templateHtml,
        ]);
    }
}
