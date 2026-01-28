<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Contract;
class ContractFileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:10240',
            'contract_type_id' => 'required',
        ]);

        try {
            $file = $request->file('pdf_file');

            // $fileName = 'contracts/' . Str::uuid() . '.pdf';
            // $path = Storage::disk('s3')->put($fileName, file_get_contents($file), 'public');
            // $url = Storage::disk('s3')->url($fileName);

            $url = "urltesteparainserir";
            // dd($request);
            $contract = Contract::create([
                'contract_number' => $request->contract_number,
                'contract_type_id' => $request->contract_type_id,
                'contract_company_owner_id' => auth()->user()->company_id,
                'contract_status_id' => 1,
                'client_name' => $request->contractor_name,
                'payment_total' => $request->payment_total,
                'regret_period' => $request->regret_period_days,
                'payment_initial' => $request->payment_initial,
                'payment_final' => $request->payment_final,
                'start_date' => now(),
                'end_date' => now()->addMonths((int) $request->contract_duration_month),
                'contract_duration_months' => $request->contract_duration_month,
                'contract_file_url' => $url,
                'is_signed' => false,
                'access_level' => 'owner',
            ]);

            return redirect()->route('contracts.showDetails', ['contract' => $contract->id])
                ->with('success', 'Contrato salvo com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao salvar contrato: ' . $e->getMessage());
        }
    }
}
