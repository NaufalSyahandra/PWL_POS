<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\m_kategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class m_kategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        /**
         * Syntax for insert using Query Builder Facade
         */
        /*$data = [
            'kategori_kode' => 'SNK',
            'kategori_nama' => 'Snack/Makanan Ringan',
            'created_at' => now(),
        ];
        DB::table('m_kategori')->insert($data);
        return 'Insert data baru berhasil';*/

        /**
         * Syntax for update using Query Builder Facade
         */
        /* $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
         return 'Update data berhasil. Jumlah data yang di update: ' . $row . ' baris';*/

        /**
         * Syntax for update using Query Builder Facade
         */
        /*$row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        return 'Delete data berhasil. Jumlah data yang di delete: ' . $row . ' baris';*/

        /*$data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);*/
        return $dataTable->render('kategori.index');
    }

    public function create(): view
    {
        return view('kategori.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'kategori_kode' => 'bail|unique:m_kategori|required',
            'kategori_nama' => 'bail|required|max:255'
        ]);
        return redirect('/kategori');
    }

    /**
     * show editing view that select to updated kategori data
     */
    public function edit($id)
    {
        $kategori = m_kategoriModel::find($id);
        return view('kategori.edit', ['data' => $kategori]);
    }

    /**
     * Updated specified kategori data
     */
    public function update(Request $request, $id)
    {
        $kategori = m_kategoriModel::find($id);
        $kategori->kategori_kode = $request->kategori_kode;
        $kategori->kategori_nama = $request->kategori_nama;

        $kategori->save();
        return redirect('/kategori');
    }

    /**
     * Deleted specific kategori data
     */
    public function delete($id)
    {
        $kategori = m_kategoriModel::find($id);
        $kategori->delete();

        return redirect('/kategori');
    }
}
