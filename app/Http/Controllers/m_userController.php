<?php

namespace App\Http\Controllers;

use App\Models\m_userModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class m_userController extends Controller
{
    public function index()
    {
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

        $user = m_userModel::findOr(20, ['username', 'nama'], function () {
            abort(404);
        });
        return view('m_user', ['data' => $user]);

    }
}
