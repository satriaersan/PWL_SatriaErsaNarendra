<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        // Menambahkan data baru menggunakan Eloquent
        // $data = [
        //     // 'username' => 'customer-1',
        //     'nama' => 'Pelanggan pertama',
        //     // 'password' => Hash::make('12345'), // class untuk mengenkripsi/hash password
        //     // 'level_id' => 5
        // ];

        // // UserModel::insert($data); //tambah data ke tabel 'm_user'
        // UserModel::where('username', 'customer-1')->update($data); //update data

        // //coba akses model UserModel
        // $user = UserModel::all();       //abil semua data dari tabel 'm_user'
       
        // return view('user', ['data' => $user]);

        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        // $user = UserModel::find(1);
        // return view('user', ['data' => $user]);

        // $user = UserModel::where('level_id', 1)->first();
        // return view('user', ['data' => $user]);

        // $user = UserModel::firstwhere('level_id', 1);
        // return view('user', ['data' => $user]);

        // $user = UserModel::findOr(1, ['username', 'nama'], function(){ //Mencari data dengan id = 1 dari tabel users
        //     abort(404);                                                //tapi hanya mengambil kolom username dan nama
        // });
        // return view('user', ['data' => $user]);

        $user = UserModel::findOr(20, ['username', 'nama'], function(){ //Mencari data dengan id = 20 dari tabel users
            abort(404);                                                //tapi hanya mengambil kolom username dan nama
        });
        return view('user', ['data' => $user]);
    }
    }
