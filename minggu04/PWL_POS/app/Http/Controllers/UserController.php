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

        // $user = UserModel::findOr(20, ['username', 'nama'], function(){ //Mencari data dengan id = 20 dari tabel users
        //     abort(404);                                                //tapi hanya mengambil kolom username dan nama
        // });
        // return view('user', ['data' => $user]);


        // $user = UserModel::findOrFail(1);     
        // return view('user', ['data' => $user]);


        // $user = UserModel::where('username', 'manager9')->firstOrFail();      
        // return view('user', ['data' => $user]);


        // $user = UserModel::where('level_id', 2)->count();      
        // // dd($user);                                            //  Biasanya digunakan untuk debugging, Akan menampilkan nilai $user dan menghentikan eksekusi script.
        // return view('user', ['data' => $user]);


        // $user = UserModel::firstOrCreate(       //jika ada maka akan ditampilkan, jika tidak ada akan dibuatkan
        //     [
        //         'username'  => 'manager',       //username = manager
        //         'nama'      => 'Manager',       //nama = Manager
        //     ],
        // );

        // return view('user', ['data' => $user]);


        // $user = UserModel::firstOrCreate(      //jika ada maka akan ditampilkan, jika tidak ada akan dibuatkan
        //     [      
        //         'username' => 'manager22',        
        //         'nama' => 'Manager Dua Dua',        
        //         'password' => Hash::make('12345'), 
        //         'level_id' => 2                     
        //     ],
        // );

        // return view('user', ['data' => $user]);


        // $user = UserModel::firstOrNew(        //jika ada maka akan ditampilkan, jika tidak ada akan dibuatkan melalui browser tapi tidak ke database
        //     [
        //         'username' => 'manager',        //dengan username = manager
        //         'nama'     => 'Manager',        //dengan nama = Manager 
        //     ],
        // );

        // return view('user', ['data' => $user]);


        //         $user = UserModel::firstOrNew(       //jika ada maka akan ditampilkan, jika tidak ada akan dibuatkan melalui browser tapi tidak ke database
        //      [
        //          'username' => 'manager33',                 
        //          'nama'     => 'Manager Tiga Tiga',        
        //          'password' => Hash::make('12345'),        
        //          'level_id' => 2                           
        //      ],
        //  );

        //  return view('user', ['data' => $user]);


        // $user = UserModel::firstOrNew(        //jika ada maka akan ditampilkan, jika tidak ada akan dibuatkan melalui browser tapi tidak ke database   
        //     [
        //         'username' => 'manager33',
        //         'nama'     => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );

        // $user->save();          //simpan ke database
        // return view('user', ['data' => $user]);


        // $user = UserModel::create([  //membuat data
        //     'username'  => 'manager55',
        //     'nama'      => 'Manager55',
        //     'password'  => Hash::make('12345'),
        //     'level_id'  => 2,
        // ]);

        // $user->username = 'manager56'; //merubah username dari manager55 menajadi manager66

        // $user->isDirty();   //true karena terdapat perubahan
        // $user->isDirty('username');    //true
        // $user->isDirty('nama');     //false karena tidak ada perubahan
        // $user->isDirty(['nama', 'username']);     //true

        // $user->isClean();   //false
        // $user->isClean('username');     //false
        // $user->isClean('nama');     //true
        // $user->isClean(['nama', 'username']);     //false

        // $user->save();  //menyimpan data

        // $user->isDirty();   //false
        // $user->isClean();   //true
        // dd($user->isDirty()); //menampilkan hasil ekspreksi


          $user = UserModel::create([  //membuat data (semua data disimpan ke database)
            'username'  => 'manager11',
            'nama'      => 'Manager11',
            'password'  => Hash::make('12345'),
            'level_id'  => 2,
        ]);

        $user->username = 'manager12'; //merubah username dari manager11 menajadi manager12 (blm ke database)
        $user->save();  //menyimpan ke database

        $user->wasChanged();   //true
        $user->wasChanged('username');     //true
        $user->wasChanged(['username', 'level_id']);    //true
        $user->wasChanged('nama');     //false
        dd($user->wasChanged(['nama', 'username']));     //true
    }
}
