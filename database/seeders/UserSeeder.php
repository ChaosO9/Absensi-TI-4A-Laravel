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
        User::create([
            'nim' => '216151001',
            'last_login' => '20-06-23 11:52:13',
            'name' => 'Irfan Noor Hidayat',
            'email' => 'irfannoorh@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}