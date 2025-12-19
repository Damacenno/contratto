<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Company;

class companySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'company_user_owner_id' => 1,
            'company_document' => '123.456.789/0001-00',
            'company_name' => 'Stackcode Systems',
            'company_agency' => '0001',
            'company_account' => '3245-6',
            'company_bank' => 'Nu Pagamentos S.A.',
            'company_pix' => 'CHAVEALEATORIA12312121',
            'company_city' => 'Jundiai',
            'licenses_avaliable' => 10,
        ]);

        Company::create([
            'company_user_owner_id' => 2,
            'company_document' => '123.456.789-24',
            'company_name' => 'Troncoso Sistemas',
            'company_agency' => '0023',
            'company_account' => '1243-3',
            'company_bank' => 'Nu Pagamentos S.A.',
            'company_pix' => 'CHAVEALEATORIA12312111',
            'company_city' => 'Brasilira',
            'licenses_avaliable' => 10,
        ]);
    }
}
