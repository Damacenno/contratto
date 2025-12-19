<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(usersSeeder::class);
        $this->call(contractTypeSeeder::class);
        $this->call(contractStatusSeeder::class);
        $this->call(contractSeeder::class);
        $this->call(ContractFieldMappingsSeeder::class);
        $this->call(companySeeder::class);
    }
}
