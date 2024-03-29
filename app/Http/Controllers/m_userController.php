<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\Models\m_userModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class m_userController extends Controller
{
//    public function index(UserDataTable $dataTable)
//    {
////        $user = m_userModel::with('level')->get();
////        return view('m_user', ['data' => $user]);
//
//        return $dataTable->render('user.index');
//    }

    public function index()
    {
        $breadcumb = (object)[
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object)[
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user';
        return view('user.index', ['breadcumb' => $breadcumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $users = m_userModel::select('user_id', 'username', 'nama', 'level_id')->with('level');

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btninfo btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '"class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '"> ' . csrf_field() . method_field('DELETE')
                    . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create(): view
    {
        return view('user.create');
    }

    public function store(UserRequest $request): RedirectResponse
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

        $validated = $request->safe()->only(['nama', 'password', 'level_id']);

        m_userModel::create([
            'username' => $request['username'],
            'nama' => $validated['nama'],
            'password' => $validated['password'],
            'level_id' => $validated['level_id'],
        ]);

        return redirect('/user');
    }

    public function tambah()
    {
        return view('m_user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        m_userModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
        ]);
        return redirect('/user');
    }

    public function ubah($id)
    {
        $user = m_userModel::find($id);
        return view('m_user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $user = m_userModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->level_id = $request->level_id;

        $user->save();
        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = m_userModel::find($id);
        $user->delete();

        return redirect('/user');
    }
}
