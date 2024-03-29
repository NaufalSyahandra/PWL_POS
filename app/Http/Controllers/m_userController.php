<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\Models\m_userModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class m_userController extends Controller
{
//    public function index()
//    {
        //add user data with Eloquent Model
//        $data = [
//            'username' => 'Customer-1',
//            'nama' => 'Pelanggan',
//            'password' => Hash::make('12345'),
//            'level_id' => 4
//        ];
//        m_userModel::insert($data); //proses add user data

//        $data = [
//            'level_id'  => 4,
//            'username' => 'manager_dua',
//            'nama' => 'Manager 2',
//            'password' => Hash::make('12345')
//        ];
//        m_userModel::create($data);

//        $data = [
//            'level_id' => 2,
//            'username' => 'manager_tiga',
//            'nama' => 'Manager 3',
//            'password' => Hash::make('12345')
//        ];
//        m_userModel::create($data);
//
//
//        $user = m_userModel::all(); // get all data from table m_user
//        return view('m_user', ['data' => $user]);

//        $user = m_userModel::find(1);
//        return view('m_user', ['data' => $user]);

//        $user = m_userModel::where('level_id', 1)->first();
//        return view('m_user', ['data' => $user]);

//        $user = m_userModel::findOr(1, ['username', 'nama'], function () {
//            abort(404);
//        });
//        return view('m_user', ['data' => $user]);

//        $user = m_userModel::findOr(20, ['username', 'nama'], function () {
//            abort(404);
//        });
//        return view('m_user', ['data' => $user]);

//        $user = m_userModel::findOrFail(1);
//        return view('m_user', ['data' => $user]);

//        $user = m_userModel::where('username', 'manager9')->firstOrFail();
//        return view('m_user', ['data' => $user]);

//        $user = m_userModel::where('level_id', 2)->count();
////        dd($user);
//        return view('m_user', ['data' => $user]);

//        $user = m_userModel::firstOrCreate(
//            [
//                'username' => 'manager',
//                'nama' =>  'Manager',
//            ],
//        );
//        return view('m_user', ['data' => $user]);

//        $user = m_userModel::firstOrCreate(
//            [
//                'username' => 'manager22',
//                'nama' => 'Manager Dua Dua',
//                'password' => Hash::make('12345'),
//                'level_id' => 2
//            ],
//        );
//
//        return view('m_user', ['data' => $user]);

//        $user = m_userModel::firstOrNew(
//            [
//                'username' => 'manager',
//                'nama' => 'Manager',
//            ],
//        );
//
//        return view('m_user', ['data' => $user]);

//        $user = m_userModel::firstOrNew(
//            [
//                'username' => 'manager23',
//                'nama' => 'Manager Tiga Tiga',
//                'password' => Hash::make('12345'),
//                'level_id' => 2
//            ],
//        );
//        $user->save();
//
//        return view('m_user', ['data' => $user]);

//        $user = m_userModel::create(
//            [
//                'username' => 'manager55',
//                'nama' => 'Manager55',
//                'password' => Hash::make('12345'),
//                'level_id' => 2,
//            ]
//        );
//
//        $user->username = 'manager56';
//
//        $user->isDirty();
//        $user->isDirty('username');
//        $user->isDIrty('nama');
//        $user->isDirty(['nama', 'username']);
//
//        $user->isClean();
//        $user->isClean('username');
//        $user->isClean('nama');
//        $user->isClean(['nama', 'username']);
//
//        $user->save();
//
//        $user->isDirty();
//        $user->isClean();
//        dd($user->isDirty());

//        $user = m_userModel::create(
//            [
//                'username' => 'manager55',
//                'nama' => 'Manager55',
//                'password' => Hash::make('12345'),
//                'level_id' => 2,
//            ]
//        );
//
//        $user->username = 'manager12';
//        $user->save();
//
//        $user->wasChanged();
//        $user->wasChanged('username');
//        $user->wasChanged(['username', 'level_id']);
//        $user->wasChanged('nama');
//        dd($user->wasChanged(['nama', 'username']));
//    }

    public function index(UserDataTable $dataTable)
    {
//        $user = m_userModel::with('level')->get();
//        return view('m_user', ['data' => $user]);

        return $dataTable->render('user.index');
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

        $validated = $request->safe()->only(['nama', 'password','level_id']);

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
