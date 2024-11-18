<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_data = [
            'name' => 'Bot Service Administrator',
            'email' => 'botservice@mailinator.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'contact_no' => '1111111111',
        ];

        User::create($user_data);
    }
}
