<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class m_levelController extends Controller
{
    public function index()
    {
//        DB::insert('insert into m_level(level_id, level_kode, level_nama, created_at) values(?, ?, ?, ?)', [4, 'CUS', 'Customer', now()]);
//
//        return 'Insert data berhasil';

//        $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
//        return 'Update data berhasil, jumlah data yang diupdate : ' . $row . ' baris';

//        $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
//        return 'delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

        $data = DB::select('select * from m_level');
        return view('m_level', ['data' => $data]);
    }
}
