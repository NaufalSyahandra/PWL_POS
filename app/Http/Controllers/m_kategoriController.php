<?php

namespace App\Http\Controllers;

use App\DataTables\kategoriDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class m_kategoriController extends Controller
{
//    public function index()
//    {
//        $data = [
//            'kategori_kode' => 'SNK',
//            'kategori_nama' => 'Snack/Makanan Ringan',
//            'created_at' => now()
//        ];
//        DB::table('m_kategori')->insert($data);
//        return "Insert data baru berhasil";

//        $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
//        return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . 'baris';

//        $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
//        return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

//        $data = DB::table('m_kategori')->get();
//        return view('m_kategori', ['data' => $data]);
//    }

    public function index(kategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }
}
