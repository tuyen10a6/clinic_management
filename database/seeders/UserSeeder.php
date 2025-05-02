<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
            'name'       => 'TS. BSCKII Lê Quốc Việt',
            'email'      => 'lequocviet@gmail.com',
            'password'   => Hash::make('tuyen10a6'),
            'permission' => 'doctor'
        ]);
    }
}
