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
        $data = [
            'username' => 'Customer-1',
            'nama' => 'Pelanggan',
            'password' => Hash::make('12345'),
            'level_id' => 4
        ];
        m_userModel::insert($data); //proses add user data

        $user = m_userModel::all(); // get all data from table m_user
        return view('m_user', ['data' => $user]);
    }
}
