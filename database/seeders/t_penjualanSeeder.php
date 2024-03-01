<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class t_penjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $listPembeli = ['Thomas', 'Alva', 'Edison', 'Aang', 'Viper', 'Jett', 'Raze', 'Omen', 'Skye', 'Brimstone'];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'user_id' => 3,
                'pembeli' => $listPembeli[$i],
                'penjualan_kode' => 'SELL' . $i + 1,
                'penjualan_tanggal' => '2024-01-10 12:00:00',
            ];
        }
        DB::table('t_penjualan')->insert($data);
    }
}
