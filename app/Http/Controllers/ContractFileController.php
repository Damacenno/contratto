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
        // Validação básica
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:10240',
            'contract_type_id' => 'required',
        ]);

        try {
            $file = $request->file('pdf_file');

            // 1. Gerar nome único e salvar no S3
            // $fileName = 'contracts/' . Str::uuid() . '.pdf';
            // $path = Storage::disk('s3')->put($fileName, file_get_contents($file), 'public');
            // $url = Storage::disk('s3')->url($fileName);
            $url = "urltesteparainserir";
            dd($request);
            $contract = Contract::create([
                'contract_number' => 'CNT-' . strtoupper(Str::random(5)),
                'contract_type_id' => $request->contract_type_id,
                'contract_company_owner_id' => auth()->user()->company_id,
                'contract_status_id' => 1, 
                'client_name' => $request->client_name,
                'payment_total' => $request->payment_total,
                'regret_period' => 15,
                'payment_initial' => $request->payment_total / 2,
                'initial_payment_date' => now(),
                'payment_final' => $request->payment_total / 2,
                'final_payment_date' => now()->addMonth(),
                'start_date' => now(),
                'end_date' => now()->addYear(),
                'contract_file_url' => $url,
                'is_signed' => false,
                'access_level' => 'owner',
            ]);

            return redirect()->back()->with('success', 'Contrato salvo com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao salvar contrato: ' . $e->getMessage());
        }
    }
}
