<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\ContractController;
class ContractFileController extends Controller
{
    public function store(Request $request, ContractController $ContractController)
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
            $request->merge(['contract_file_url' => $url]);
            $contract = $ContractController->create($request->all());
            return redirect()->route('contracts.showDetails', ['contract' => $contract->id]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao salvar contrato: ' . $e->getMessage());
        }
    }
}
