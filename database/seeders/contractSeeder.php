<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contract;

class contractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contract::create([
            'contract_number' => 'TFG1',
            'contract_type_id' => 1,
            'contract_company_owner_id' => 1,
            'contract_status_id' => 1,
            'client_name' => 'Sample Client',
            'payment_total' => 1200,
            'regret_period' => 15,
            'payment_initial' => 600,
            'initial_payment_date' => now(),
            'payment_final' => 600,
            'final_payment_date' => now()->addMonth(),
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'contract_file_url' => 'https://contrattos-app-bucket.s3.sa-east-1.amazonaws.com/Co%CC%81pia--de--Modelo-de-Contrato(1).docx',
            'is_signed' => false,
            'access_level' => 'owner',
        ]);

        Contract::create([
            'contract_number' => 'TFG2',
            'contract_type_id' => 2,
            'contract_company_owner_id' => 1,
            'contract_status_id' => 2,
            'client_name' => 'Sample Client 2',
            'payment_total' => 1200,
            'regret_period' => 15,
            'payment_initial' => 600,
            'initial_payment_date' => now(),
            'payment_final' => 600,
            'final_payment_date' => now()->addMonth(),
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'is_signed' => false,
            'access_level' => 'admin',
        ]);

        Contract::create([
            'contract_number' => 'TFG2',
            'contract_type_id' => 1,
            'contract_company_owner_id' => 2,
            'contract_status_id' => 2,
            'client_name' => 'Sample Client 2',
            'payment_total' => 1200,
            'regret_period' => 15,
            'payment_initial' => 600,
            'initial_payment_date' => now(),
            'payment_final' => 600,
            'final_payment_date' => now()->addMonth(),
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'is_signed' => false,
            'access_level' => 'user',
        ]);

        Contract::create([
            'contract_number' => 'TFG2',
            'contract_type_id' => 2,
            'contract_company_owner_id' => 2,
            'contract_status_id' => 2,
            'client_name' => 'Sample Client 2',
            'payment_total' => 1200,
            'regret_period' => 15,
            'payment_initial' => 600,
            'initial_payment_date' => now(),
            'payment_final' => 600,
            'final_payment_date' => now()->addMonth(),
            'start_date' => now(),
            'end_date' => now()->addYear(),
            'is_signed' => false,
            'access_level' => 'user',
        ]);
    }
}
