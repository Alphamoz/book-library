<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // making admin
        User::create(['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('12345'), 'is_admin' => 1]);
    }
}
