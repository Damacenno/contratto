<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContractFileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'html' => 'required|string',
            'client_id' => 'required|integer',
            'contract_id' => 'nullable|integer',
        ]);

        $clientId   = $request->client_id;
        $contractId = $request->contract_id ?? Str::uuid();

        // Caminho no bucket
        $path = "clients/{$clientId}/contracts/{$contractId}.html";

        // Salva no S3
        Storage::disk('s3')->put(
            $path,
            $request->html,
            'private'
        );

        return response()->json([
            'path' => $path,
            'url'  => Storage::disk('s3')->temporaryUrl(
                $path,
                now()->addMinutes(10)
            )
        ]);
    }
}
