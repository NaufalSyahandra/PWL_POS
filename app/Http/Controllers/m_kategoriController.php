<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Http\Requests\KategoriRequest;
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

    /**
     * Show page kategori form
     */
    public function create(): View
    {
        return view('kategori.create');
    }

    /**
     * validate kategori form and store that in database
     */
    public function store(KategoriRequest $request): RedirectResponse
    {
        /**
         * The incoming request is valid...
         */

        /**
         * Retrieve the validated input data...
         */
        $validated = $request->validated();

        /**
         * Retrieve a portion of the validated input data...
         */
        $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);

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
