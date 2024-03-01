<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class m_kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $data1 = [
//            [
//                'kategori_id' => 1,
//                'kategori_kode' => 1,
//                'kategori_nama' => 'Toyota',
//            ],
//            [
//                'kategori_id' => 2,
//                'kategori_kode' => 2,
//                'kategori_nama' => 'Volkswagen',
//            ],
//            [
//                'kategori_id' => 3,
//                'kategori_kode' => 3,
//                'kategori_nama' => 'Ford',
//            ],
//            [
//                'kategori_id' => 4,
//                'kategori_kode' => 4,
//                'kategori_nama' => 'BMW',
//            ],
//            [
//                'kategori_id' => 5,
//                'kategori_kode' => 5,
//                'kategori_nama' => 'Subaru',
//            ],
//        ];

        $data = [];
        $kategori_nama = ['Toyota', 'Volkswagen', 'Ford', 'BMW', 'Subaru'];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'kategori_kode' => 'MBL' . $i + 1,
                'kategori_nama' => $kategori_nama[$i],
            ];
        }

        DB::table('m_kategori')->insert($data);
    }
}
