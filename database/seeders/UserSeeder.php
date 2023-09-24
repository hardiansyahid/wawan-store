<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'ADMIN SISTEM',
                'role' => 1,
                'username' => 'admin',
                'password' => Hash::make(123),
                'created_at' => now(),
            ],
            [
                'name' => 'KASIR 1',
                'role' => 2,
                'username' => 'kasir',
                'password' => Hash::make(123),
                'created_at' => now(),
            ]
        ];

        DB::table('users')->insert($data);
    }
}
