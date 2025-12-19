<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'owner',
            'company_id' => 1
        ]);

        User::create([
            'name' => 'troncoso',
            'email' => 'troncoso@example.com',
            'password' => bcrypt('troncoso'),
            'role' => 'user',
            'company_id' => 1
        ]);
    }
}
