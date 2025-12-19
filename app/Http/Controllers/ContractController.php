<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use App\Models\Contract;
use App\Models\ContractType;
use App\Models\Company;
use App\Models\ContractFieldMapping;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::with('company')
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
                'can' => [
                    'view' => true,
                ],
            ]),
        ]);
    }

    public function startContract(Request $request)
    {
        $user = auth()->user();

        $contractTypes = ContractType::select('id', 'contract_type_name')->get();

        $fields = collect();

        if ($request->filled('contract_type_id')) {
            $fields = ContractFieldMapping::where(
                'contract_type_id',
                $request->contract_type_id
            )->get();
        }

        $company = null;

        if ($user && $user->company_id) {
            $companyModel = Company::find($user->company_id);

            if ($companyModel) {
                $company = [
                    'name' => $companyModel->company_name,
                    'document' => $companyModel->company_document,
                    'agency' => $companyModel->company_agency,
                    'account' => $companyModel->company_account,
                    'bank' => $companyModel->company_bank,
                    'pix' => $companyModel->company_pix,
                    'city' => $companyModel->company_city,
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
        ]);
    }

    public function getFieldMappingsForType(ContractType $contractType)
    {
        $fields = ContractFieldMapping::where('contract_type_id', $contractType)
            ->orderBy('order')
            ->get();
        return $fields;
    }

    public function showDetails()
    {
        $id = request()->query('id');
        $contract = Contract::findOrFail($id);
        return Inertia::render('Contracts/ContractDetail', [
            'contract' => $contract,
        ]);
    }
}
