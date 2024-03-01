<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class t_stokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $user_id = DB::table('m_user')->pluck('user_id');
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'barang_id' => $i,
                'user_id' => $user_id->random(),
                'stok_tanggal' => now(),
                'stok_jumlah' => random_int(10, 50),
            ];
        }
        DB::table('t_stok')->insert($data);
    }
}
