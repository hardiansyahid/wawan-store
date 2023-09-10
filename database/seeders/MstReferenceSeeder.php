<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstReferenceSeeder extends Seeder
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
                'category' => 'ROLE',
                'nama' => 'ADMIN',
                'code' => 'ADM',
                'isactive' => 1,
                'created_at' => now(),
            ],
            [
                'category' => 'ROLE',
                'nama' => 'KASIR',
                'code' => 'KSR',
                'isactive' => 1,
                'created_at' => now(),
            ],
            [
                'category' => 'BARANG',
                'nama' => 'Minyak Goreng',
                'code' => 'KSR',
                'isactive' => 1,
                'created_at' => now(),
            ]
        ];

        DB::table('mst_reference')->insert($data);
    }
}
