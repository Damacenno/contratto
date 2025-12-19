<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContractStatus;

class contractStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContractStatus::create([
            'contract_status_name' => 'pending'
        ]);

        ContractStatus::create([
            'contract_status_name' => 'active'
        ]);
    }
}
