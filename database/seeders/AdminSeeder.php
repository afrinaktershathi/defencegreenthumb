<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins   = [
            [
                'name' => 'Shourab',
                'email' => 'shourab.cit.bd@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Niloy',
                'email' => 'niloy@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Afrin',
                'email' => 'afrin@gmail.com',
                'password' => Hash::make('password'),
            ],
        ];
        foreach ($admins as $admin) {

            Admin::create($admin);
        }
    }
}
