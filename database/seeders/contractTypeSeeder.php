<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContractType;

class contractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContractType::create([
            'contract_type_name' => 'Trafego Pago',
            'contract_template_id' => "1", // Assuming no template is provided
        ]);

        ContractType::create([
            'contract_type_name' => 'Social Media',
            'contract_template_id' => "1", // Assuming no template is provided
        ]);
    }
}
