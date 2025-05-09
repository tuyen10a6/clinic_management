<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name'       => 'TS. BSCKII Lê Quốc Việt',
                'email'      => 'lequocviet@gmail.com',
                'password'   => Hash::make('tuyen10a6'),
                'permission' => 'doctor'
            ],
            [
                'name'       => 'admin',
                'email'      => 'admin@gmail.com',
                'password'   => Hash::make('tuyen10a6'),
                'permission' => 'manager'
            ],
        ];

        foreach ($data as $item) {
            $check = User::query()->where('email', $item['email'])->first();
            if (!$check) {
                User::query()->create($item);
                dump('Import Data User Successfully');
            }
        }
    }
}
