<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class t_penjualan_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $idIterator = 1;
        $barangData = DB::table('m_barang')->get(['barang_id', 'harga_jual']);
        for ($i = 1; $i <= 30; $i++) {
            $tempBarang_id = random_int(1, 5);
            $data[] = [
                'penjualan_id' => $i % 3 == 0 ? $idIterator++: $idIterator,
                'barang_id' => $tempBarang_id,
                'harga' => $barangData->where('barang_id', $tempBarang_id)->value('harga_jual'),
                'jumlah' => random_int(1, 30),
            ];
        }
        DB::table('t_penjualan_detail')->insert($data);
    }
}
