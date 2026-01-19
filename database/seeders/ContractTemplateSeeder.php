<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Template;

class ContractTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Template::create([
            'contract_type_id' => 1,
            'version' => 1,
            'html_content' => '<h1>Contract Template for Type 1 - Version 1</h1><p>This is a sample contract template.</p>',
        ]);
    }
}
