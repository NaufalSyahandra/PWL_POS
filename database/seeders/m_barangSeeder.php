<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class m_barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $data1 = [
//            [
//                'barang_id' => 1,
//                'kategori_id' => 1,
//                'barang_kode' => '111',
//                'barang_nama' => 'Toyota Camry',
//            ],
//            [
//                'barang_id' => 2,
//                'kategori_id' => 1,
//                'barang_kode' => '212',
//                'barang_nama' => 'Toyota Corolla',
//            ],
//            [
//                'barang_id' => 3,
//                'kategori_id' => 2,
//                'barang_kode' => '321',
//                'barang_nama' => 'Volkswagen Golf',
//            ],
//            [
//                'barang_id' => 4,
//                'kategori_id' => 2,
//                'barang_kode' => '422',
//                'barang_nama' => 'Volkswagen Atlas',
//            ],
//            [
//                'barang_id' => 5,
//                'kategori_id' => 3,
//                'barang_kode' => '531',
//                'barang_nama' => 'Ford F-150',
//            ],
//            [
//                'barang_id' => 6,
//                'kategori_id' => 3,
//                'barang_kode' => '632',
//                'barang_nama' => 'Ford Mustang',
//            ],
//            [
//                'barang_id' => 7,
//                'kategori_id' => 4,
//                'barang_kode' => '741',
//                'barang_nama' => 'BMW M2',
//            ],
//            [
//                'barang_id' => 8,
//                'kategori_id' => 4,
//                'barang_kode' => '842',
//                'barang_nama' => 'BMW M4',
//            ],
//            [
//                'barang_id' => 9,
//                'kategori_id' => 5,
//                'barang_kode' => '951',
//                'barang_nama' => 'Subaru Imperza',
//            ],
//            [
//                'barang_id' => 10,
//                'kategori_id' => 5,
//                'barang_kode' => '1052',
//                'barang_nama' => 'Subaru ',
//            ],
//        ];

        $barang_nama = [
            'Toyota Camry', 'Toyota Corolla',
            'Volkswagen Golf', 'Volkswagen Atlas',
            'Ford F-150', 'Ford Mustang',
            'BMW M2', 'BMW M4',
            'Subaru Imperza', 'Subaru WRX'
        ];
        $kategori_id = [
            1, 1,
            2, 2,
            3, 3,
            4, 4,
            5, 5
        ];
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'kategori_id' => $kategori_id[$i],
                'barang_kode' => 'TYPE' . $i + 1,
                'barang_nama' => $barang_nama[$i],
                'harga_beli' => random_int(400000000, 1000000000),
                'harga_jual' => random_int(500000000, 1200000000)
            ];
        }

        DB::table('m_barang')->insert($data);
    }
}
