<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\LevelModel;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    // public function index()
    // {
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


    // $user = UserModel::create([  //membuat data (semua data disimpan ke database)
    //     'username'  => 'manager11',
    //     'nama'      => 'Manager11',
    //     'password'  => Hash::make('12345'),
    //     'level_id'  => 2,
    // ]);

    // $user->username = 'manager12'; //merubah username dari manager11 menajadi manager12 (blm ke database)
    // $user->save();  //menyimpan ke database

    // $user->wasChanged();   //true
    // $user->wasChanged('username');     //true
    // $user->wasChanged(['username', 'level_id']);    //true
    // $user->wasChanged('nama');     //false
    // dd($user->wasChanged(['nama', 'username']));     //true


    //     $user = UserModel::all();         //mengambil semua data tabel 'm_user'
    //     return view('user', ['data' => $user]);
    // }
    // public function tambah()
    // {
    //     return view('user_tambah');
    // }
    // public function tambah_simpan(Request $request)  // menerima data dari form inputan
    // {
    //     UserModel::create([             //menyimpan data ke database
    //         'username' => $request->username,
    //         'nama' => $request->nama,
    //         'password' => Hash::make('$request->password'),
    //         'level_id' => $request->level_id
    //     ]);

    //     return redirect('/user');       //return hasil ke view 'user'
    // }
    // public function ubah($id)    //ambil data berdasarkan ID yang dipilih
    // {
    //     $user = UserModel::find($id);   //mencari data berdasarkan ID 
    //     return view('user_ubah', ['data' => $user]);
    // }
    // public function ubah_simpan($id, Request $request)    //untuk menerima data dari form inputan 
    // {
    //     $user = UserModel::find($id);           //cari data berdasarkan ID 

    //     $user->username = $request->username;
    //     $user->nama     = $request->nama;
    //     $user->password = Hash::make('$request->password');
    //     $user->level_id = $request->level_id;

    //     $user->save();

    //     return redirect('/user');
    // }
    // public function hapus($id)  //hapus data berdasarkan ID 
    // {        
    //     $user = UserModel::find($id);  
    //     $user->delete();        // menghapus dari database

    //     return redirect('/user');   


    // $user = UserModel::with('level')->get();
    // return view('user', ['data' => $user]);
    //  }

    public function index()
    {
        $breadcrumb = (object) [
            'title' => "Daftar User",
            'list' => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    // Ambil data user dalam bentuk JSON untuk DataTables
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');

        return DataTables::of($users)
            // Menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                // Menambahkan kolom aksi
                $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // Memberitahu bahwa kolom aksi adalah HTML
            ->make(true);
    }

    // Menampilkan halaman form tambah user
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah user baru'
        ];

        $level = LevelModel::all(); // Ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; // Set menu yang sedang aktif

        return view('user.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter, dan unik di tabel m_user kolom username
            'username' => 'required|string|min:3|unique:m_user,username',
            // nama harus diisi, berupa string, dan maksimal 100 karakter
            'nama' => 'required|string|max:100',
            // password harus diisi dan minimal 5 karakter
            'password' => 'required|min:5',
            // level_id harus diisi dan berupa angka
            'level_id' => 'required|integer',
        ]);

        // Menyimpan data user ke database
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password), // password dienkripsi sebelum disimpan
            'level_id' => $request->level_id,
        ]);

        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    // Menampilkan detail user
    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail'],
        ];

        $page = (object) [
            'title' => 'Detail user',
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.show', [
            'breadcrumb'  => $breadcrumb,
            'page'        => $page,
            'user'        => $user,
            'activeMenu'  => $activeMenu,
        ]);
    }

    // Menampilkan halaman form edit user
    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit user'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            // Username harus diisi, berupa string, minimal 3 karakter,
            // dan unik di tabel m_user kecuali untuk user dengan id yang sedang diedit
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100', // Nama harus diisi, berupa string, dan maksimal 100 karakter
            'password' => 'nullable|min:5', // Password bisa diisi (minimal 5 karakter) dan bisa tidak diisi
            'level_id' => 'required|integer' // Level_id harus diisi dan berupa angka
        ]);

        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    // Menghapus data user
    public function destroy(string $id)
    {
        // Mengecek apakah data user dengan ID yang dimaksud ada atau tidak
        $check = UserModel::find($id);

        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            UserModel::destroy($id); // Hapus data user
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan pesan error
            return redirect('/user')->with(
                'error',
                'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini'
            );
        }
    }
}
