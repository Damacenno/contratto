<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContractFieldMapping;


class ContractFieldMappingsSeeder extends Seeder
{
    public function run(): void
    {
        // PAYMENT TOTAL
        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'payment_total',
                'display_name' => 'Valor Total',
                'prefix' => 'R$ ',
                'format' => 'number',
                'field_key' => 'CONTRACT_FIELD_PAYMENT_TOTAL',
                'font_size' => 10,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        // INITIAL PAYMENT
        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'payment_initial',
                'display_name' => 'Parcela Inicial',
                'prefix' => 'R$ ',
                'format' => 'number',
                'field_key' => 'CONTRACT_FIELD_PAYMENT_INITIAL',
                'font_size' => 10,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        // FINAL PAYMENT
        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'payment_final',
                'display_name' => 'Parcela Final',
                'prefix' => 'R$ ',
                'format' => 'number',
                'field_key' => 'CONTRACT_FIELD_PAYMENT_FINAL',
                'font_size' => 10,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        // PAYMENT DAYS
        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'regret_period_days',
                'display_name' => 'Período de Experiência',
                'prefix' => '',
                'format' => 'string',
                'field_key' => 'CONTRACT_FIELD_REGRET_PERIOD',
                'font_size' => 10,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        // CONTRACT DURATION
        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'contract_duration_month',
                'display_name' => 'Duração do Contrato',
                'prefix' => '',
                'format' => 'string',
                'field_key' => 'CONTRACT_FIELD_CONTRACT_DURATION',
                'font_size' => 10,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        // CONTRACTOR NAME 
        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'contractor_name',
                'display_name' => 'Nome do Contratante',
                'prefix' => '',
                'format' => 'string',
                'field_key' => 'CONTRACT_FIELD_CONTRACTOR_NAME',
                'font_size' => 10,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // RAZAOSOCIAL/NOME
        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'company_name',
                'display_name' => 'Nome da Empresa',
                'prefix' => '',
                'format' => 'string',
                'field_key' => 'CONTRACT_FIELD_COMPANY_NAME',
                'font_size' => 10,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // CPF/CNPJ
        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'company_document',
                'display_name' => 'Documento',
                'prefix' => '',
                'format' => 'string',
                'field_key' => 'CONTRACT_FIELD_COMPANY_DOCUMENT',
                'font_size' => 10,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // AGENCY
        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'company_agency',
                'display_name' => 'Agência',
                'prefix' => 'N° ',
                'format' => 'string',
                'field_key' => 'CONTRACT_FIELD_AGENCY',
                'font_size' => 10,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // ACCOUNT
        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'company_account',
                'display_name' => 'Conta Bancária',
                'prefix' => ', Conta N° ',
                'format' => 'string',
                'field_key' => 'CONTRACT_FIELD_ACCOUNT',
                'font_size' => 10,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // BANK 
        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'company_bank',
                'display_name' => 'Banco',
                'prefix' => ', Instituição',
                'format' => 'string',
                'field_key' => 'CONTRACT_FIELD_BANK',
                'font_size' => 10,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // PIX KEY 
        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'company_pix',
                'display_name' => 'Chave PIX',
                'prefix' => '',
                'format' => 'string',
                'field_key' => 'CONTRACT_FIELD_PIX',
                'font_size' => 8,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // CITY 
        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'company_city',
                'display_name' => 'Logradouro',
                'prefix' => '',
                'format' => 'string',
                'field_key' => 'CONTRACT_FIELD_CITY',
                'font_size' => 10,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        ContractFieldMapping::Create(
            [
                'contract_type_id' => 1,
                'field_name' => 'signature',
                'display_name' => '',
                'prefix' => '',
                'format' => 'string',
                'field_key' => 'CONTRACT_FIELD_SIGNATURE',
                'font_size' => 10,
                'color' => '0,0,0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
