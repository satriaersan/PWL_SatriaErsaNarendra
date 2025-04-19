<?php

use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\BarangController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesDetailController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SupplierController;
use Illuminate\Http\Request;
use OpenSpout\Common\Entity\Row;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
Route::get('/', [WelcomeController::class, 'index']);

// Route::group(['prefix' => 'user'], function () {
//     Route::get('/', [UserController::class, 'index']);          // menampilkan halaman awal user
//     Route::post('/list', [UserController::class, 'list']);      // menampilkan data user dalam bentuk json untuk datatables
//     Route::get('/create', [UserController::class, 'create']);   // menampilkan halaman form tambah user
//     Route::post('/', [UserController::class, 'store']);         // menyimpan data user baru 

//     Route::get('/create_ajax', [UserController::class, 'create_ajax']);     //menampilkan halaman form tambah user ajax
//     Route::post('/ajax', [UserController::class, 'store_ajax']);            //menyimpan data user baru ajax

//     Route::get('/{id}', [UserController::class, 'show']);       // menampilkan detail user
//     Route::get('/{id}/edit', [UserController::class, 'edit']);  // menampilkan halaman form edit user
//     Route::put('/{id}', [UserController::class, 'update']);     // menyimpan perubahan data user

//     Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);    //menampilkan halaman form edit user ajax
//     Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);    //menyimpan perubahan data user ajax

//     Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);       //menampilkan form confirm delete user ajax
//     Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);     //menghapus data user ajax

//     Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
// });


// Route::prefix('level')->group(function () {
//     Route::get('/', [LevelController::class, 'index']);
//     Route::post('/list', [LevelController::class, 'list']);
//     Route::get('/create', [LevelController::class, 'create']);
//     Route::post('/', [LevelController::class, 'store']);

//     Route::get('/create_ajax', [LevelController::class, 'create_ajax']);     //menampilkan halaman form tambah level ajax
//     Route::post('/ajax', [LevelController::class, 'store_ajax']);            //menyimpan data level baru ajax

//     Route::get('/{id}/edit', [LevelController::class, 'edit']);
//     Route::put('/{id}', [LevelController::class, 'update']);

//     Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);    //menampilkan halaman form edit level ajax
//     Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);    //menyimpan perubahan data level ajax

//     Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);       //menampilkan form confirm delete level ajax
//     Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);     //menghapus data level ajax

//     Route::delete('/{id}', [LevelController::class, 'destroy']);
// });

// Route::prefix('kategori')->group(function () {
//     Route::get('/', [KategoriController::class, 'index']);
//     Route::post('/list', [KategoriController::class, 'list']);
//     Route::get('/create', [KategoriController::class, 'create']);
//     Route::post('/', [KategoriController::class, 'store']);

//     Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);     //menampilkan halaman form tambah kategori ajax
//     Route::post('/ajax', [KategoriController::class, 'store_ajax']);            //menyimpan data kategori baru ajax

//     Route::get('/{id}/edit', [KategoriController::class, 'edit']);
//     Route::put('/{id}', [KategoriController::class, 'update']);

//     Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);    //menampilkan halaman form edit kategori ajax
//     Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);    //menyimpan perubahan data kategori ajax
//     Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);       //menampilkan form confirm delete kategori ajax
//     Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);     //menghapus data kategori ajax

//     Route::delete('/{id}', [KategoriController::class, 'destroy']);
// });

// Route::prefix('supplier')->group(function () {
//     Route::get('/', [SupplierController::class, 'index']);
//     Route::post('/list', [SupplierController::class, 'list']);
//     Route::get('/create', [SupplierController::class, 'create']);
//     Route::post('/', [SupplierController::class, 'store']);

//     Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);     //menampilkan halaman form tambah supplier ajax
//     Route::post('/ajax', [SupplierController::class, 'store_ajax']);            //menyimpan data supplier baru ajax

//     Route::get('/{id}', [SupplierController::class, 'show']);
//     Route::get('/{id}/edit', [SupplierController::class, 'edit']);
//     Route::put('/{id}', [SupplierController::class, 'update']);

//     Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);    //menampilkan halaman form edit supplier ajax
//     Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);    //menyimpan perubahan data supplier ajax
//     Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);       //menampilkan form confirm delete supplier ajax
//     Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);     //menghapus data supplier ajax
//     Route::delete('/{id}', [SupplierController::class, 'destroy']);
// });

// Route::prefix('barang')->group(function () {
//     Route::get('/', [BarangController::class, 'index']);
//     Route::post('/list', [BarangController::class, 'list']);
//     Route::get('/create', [BarangController::class, 'create']);
//     Route::post('/', [BarangController::class, 'store']);

//     Route::get('/create_ajax', [BarangController::class, 'create_ajax']);     //menampilkan halaman form tambah barang ajax
//     Route::post('/ajax', [BarangController::class, 'store_ajax']);            //menyimpan data barang baru ajax

//     Route::get('/{id}', [BarangController::class, 'show']);
//     Route::get('/{id}/edit', [BarangController::class, 'edit']);
//     Route::put('/{id}', [BarangController::class, 'update']);

//     Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);    //menampilkan halaman form edit barang ajax
//     Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);    //menyimpan perubahan data barang ajax

//     Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);       //menampilkan form confirm delete barang ajax
//     Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);     //menghapus data barang ajax

//     Route::delete('/{id}', [BarangController::class, 'destroy']);
// });

Route::pattern('id', '[0-9]+'); // artinya ketika ada parameter {id}, maka harus berupa angka

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister']);

Route::middleware(['auth'])->group(function () { // artinya semua route di dalam group ini harus login dulu
    // masukkan semua route yang perlu autentikasi di sini
    Route::get('/', [WelcomeController::class, 'index']);




    // Route::group(['prefix' => 'user'], function () {
    Route::prefix('user')->middleware(['authorize:ADM'])->group(function () {
        Route::get('/', [UserController::class, 'index']);          // menampilkan halaman awal user
        Route::post('/list', [UserController::class, 'list']);      // menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [UserController::class, 'create']);   // menampilkan halaman form tambah user
        Route::post('/', [UserController::class, 'store']);         // menyimpan data user baru 

        Route::get('/profile', [UserController::class, 'profile']);
        Route::get('/profile_ajax', [UserController::class, 'profile_ajax']);
        Route::post('/profile_update', [UserController::class, 'profile_update']);

        Route::get('/create_ajax', [UserController::class, 'create_ajax']);     //menampilkan halaman form tambah user ajax
        Route::post('/ajax', [UserController::class, 'store_ajax']);            //menyimpan data user baru ajax

        Route::get('/{id}', [UserController::class, 'show']);       // menampilkan detail user
        Route::get('/{id}/edit', [UserController::class, 'edit']);  // menampilkan halaman form edit user
        Route::put('/{id}', [UserController::class, 'update']);     // menyimpan perubahan data user

        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);    //menampilkan halaman form edit user ajax
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);    //menyimpan perubahan data user ajax

        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);       //menampilkan form confirm delete user ajax
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);     //menghapus data user ajax

        Route::get('/import', [UserController::class, 'import']);                     //ajax form upload excel
        Route::post('/import_ajax', [UserController::class, 'import_ajax']);          //ajax import excel

        Route::get('/export_excel', [UserController::class, 'export_excel']);         //export_excel  
        Route::get('/export_pdf', [UserController::class, 'export_pdf']);         //export_pdf 

        Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
    });



    Route::prefix('level')->middleware(['authorize:ADM'])->group(function () {
        Route::get('/', [LevelController::class, 'index']);
        Route::post('/list', [LevelController::class, 'list']);
        Route::get('/create', [LevelController::class, 'create']);
        Route::post('/', [LevelController::class, 'store']);

        Route::get('/create_ajax', [LevelController::class, 'create_ajax']);     //menampilkan halaman form tambah level ajax
        Route::post('/ajax', [LevelController::class, 'store_ajax']);            //menyimpan data level baru ajax

        Route::get('/{id}/edit', [LevelController::class, 'edit']);
        Route::put('/{id}', [LevelController::class, 'update']);

        Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);    //menampilkan halaman form edit level ajax
        Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);    //menyimpan perubahan data level ajax

        Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);       //menampilkan form confirm delete level ajax
        Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);     //menghapus data level ajax

        Route::get('/import', [LevelController::class, 'import']);                     //ajax form upload excel
        Route::post('/import_ajax', [LevelController::class, 'import_ajax']);          //ajax import excel

        Route::get('/export_excel', [LevelController::class, 'export_excel']);         //export_excel 

        Route::get('/export_pdf', [LevelController::class, 'export_pdf']);         //export_pdf  

        Route::delete('/{id}', [LevelController::class, 'destroy']);
    });

    // Route::prefix('kategori')->group(function () {
    Route::prefix('kategori')->middleware(['authorize:ADM,MNG'])->group(function () {
        Route::get('/', [KategoriController::class, 'index']);
        Route::post('/list', [KategoriController::class, 'list']);
        Route::get('/create', [KategoriController::class, 'create']);
        Route::post('/', [KategoriController::class, 'store']);

        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);     //menampilkan halaman form tambah kategori ajax
        Route::post('/ajax', [KategoriController::class, 'store_ajax']);            //menyimpan data kategori baru ajax

        Route::get('/{id}/edit', [KategoriController::class, 'edit']);
        Route::put('/{id}', [KategoriController::class, 'update']);

        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);    //menampilkan halaman form edit kategori ajax
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);    //menyimpan perubahan data kategori ajax
        Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);       //menampilkan form confirm delete kategori ajax
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);     //menghapus data kategori ajax

        Route::get('/import', [KategoriController::class, 'import']);                     //ajax form upload excel
        Route::post('/import_ajax', [KategoriController::class, 'import_ajax']);          //ajax import excel

        Route::get('/export_excel', [KategoriController::class, 'export_excel']);         //export_excel  

        Route::get('/export_pdf', [KategoriController::class, 'export_pdf']);         //export_pdf 

        Route::delete('/{id}', [KategoriController::class, 'destroy']);
    });

    // Route::prefix('supplier')->group(function () {
    Route::prefix('supplier')->middleware(['authorize:ADM,MNG'])->group(function () {
        Route::get('/', [SupplierController::class, 'index']);
        Route::post('/list', [SupplierController::class, 'list']);
        Route::get('/create', [SupplierController::class, 'create']);
        Route::post('/', [SupplierController::class, 'store']);

        Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);     //menampilkan halaman form tambah supplier ajax
        Route::post('/ajax', [SupplierController::class, 'store_ajax']);            //menyimpan data supplier baru ajax

        Route::get('/{id}', [SupplierController::class, 'show']);
        Route::get('/{id}/edit', [SupplierController::class, 'edit']);
        Route::put('/{id}', [SupplierController::class, 'update']);

        Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);    //menampilkan halaman form edit supplier ajax
        Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);    //menyimpan perubahan data supplier ajax
        Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);       //menampilkan form confirm delete supplier ajax
        Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);     //menghapus data supplier ajax

        Route::get('/import', [SupplierController::class, 'import']);                     //ajax form upload excel
        Route::post('/import_ajax', [SupplierController::class, 'import_ajax']);          //ajax import excel

        Route::get('/export_excel', [SupplierController::class, 'export_excel']);         //export_excel 

        Route::get('/export_pdf', [SupplierController::class, 'export_pdf']);         //export_pdf

        Route::delete('/{id}', [SupplierController::class, 'destroy']);
    });

    Route::prefix('barang')->middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::get('/', [BarangController::class, 'index']);
        Route::post('/list', [BarangController::class, 'list']);
        Route::get('/create', [BarangController::class, 'create']);
        Route::post('/', [BarangController::class, 'store']);

        Route::get('/create_ajax', [BarangController::class, 'create_ajax']);     //menampilkan halaman form tambah barang ajax
        Route::post('/ajax', [BarangController::class, 'store_ajax']);            //menyimpan data barang baru ajax

        Route::get('/{id}', [BarangController::class, 'show']);
        Route::get('/{id}/edit', [BarangController::class, 'edit']);
        Route::put('/{id}', [BarangController::class, 'update']);

        Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);    //menampilkan halaman form edit barang ajax
        Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);    //menyimpan perubahan data barang ajax

        Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);       //menampilkan form confirm delete barang ajax
        Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);     //menghapus data barang ajax

        Route::get('/import', [BarangController::class, 'import']);                     //ajax form upload excel
        Route::post('/import_ajax', [BarangController::class, 'import_ajax']);          //ajax import excel

        Route::get('/export_excel', [BarangController::class, 'export_excel']);         //export_excel
        Route::get('/export_pdf', [BarangController::class, 'export_pdf']);         //export_pdf

        Route::delete('/{id}', [BarangController::class, 'destroy']);
    });

    Route::prefix('stok')->middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::get('/', [StokController::class, 'index']);                // Menampilkan halaman awal user
        Route::post('/list', [StokController::class, 'list']);            // Menampilkan data user dalam bentuk json untuk datatable
        Route::get('/create_ajax', [StokController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
        Route::post('/ajax', [StokController::class, 'store_ajax']);      // Menyimpan data user baru Ajax
        Route::get('/{id}', [StokController::class, 'show']);             // Menampilkan detail user
        Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
        Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
        Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
        Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']); // Untuk hapus data user Ajax

        Route::get('/import', [StokController::class, 'import']);                     //ajax form upload excel
        Route::post('/import_ajax', [StokController::class, 'import_ajax']);          //ajax import excel
        Route::get('/export_excel', [StokController::class, 'export_excel']); // menampilkan halaman form tambah user Ajax

        Route::delete('/{id}', [StokController::class, 'destroy']);       // Menghapus data user
    });

    Route::prefix('penjualan')->middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::get('/', [SalesController::class, 'index']);                // Menampilkan halaman awal user
        Route::post('/list', [SalesController::class, 'list']);            // Menampilkan data user dalam bentuk json untuk datatable
        Route::get('/create_ajax', [SalesController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
        Route::post('/ajax', [SalesController::class, 'store_ajax']);      // Menyimpan data user baru Ajax
        Route::get('/{id}', [SalesController::class, 'show']);             // Menampilkan detail user
        Route::get('/{id}/edit_ajax', [SalesController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
        Route::put('/{id}/update_ajax', [SalesController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
        Route::get('/{id}/delete_ajax', [SalesController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
        Route::delete('/{id}/delete_ajax', [SalesController::class, 'delete_ajax']); // Untuk hapus data user Ajax

        Route::get('/import', [SalesController::class, 'import']);                     //ajax form upload excel
        Route::post('/import_ajax', [SalesController::class, 'import_ajax']);          //ajax import excel
        Route::get('/export_excel', [SalesController::class, 'export_excel']); // menampilkan halaman form tambah user Ajax

        Route::delete('/{id}', [SalesController::class, 'destroy']);       // Menghapus data user
    });

    Route::prefix('penjualan_detail')->middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::get('/', [SalesDetailController::class, 'index']);                // Menampilkan halaman awal user
        Route::post('/list', [SalesDetailController::class, 'list']);            // Menampilkan data user dalam bentuk json untuk datatable
        Route::get('/create_ajax', [SalesDetailController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
        Route::post('/ajax', [SalesDetailController::class, 'store_ajax']);      // Menyimpan data user baru Ajax
        Route::get('/{id}', [SalesDetailController::class, 'show']);             // Menampilkan detail user
        Route::get('/{id}/edit_ajax', [SalesDetailController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
        Route::put('/{id}/update_ajax', [SalesDetailController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
        Route::get('/{id}/delete_ajax', [SalesDetailController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
        Route::delete('/{id}/delete_ajax', [SalesDetailController::class, 'delete_ajax']); // Untuk hapus data user Ajax

        Route::get('/import', [SalesDetailController::class, 'import']);                     //ajax form upload excel
        Route::post('/import_ajax', [SalesDetailController::class, 'import_ajax']);          //ajax import excel
        Route::get('/export_excel', [SalesDetailController::class, 'export_excel']); // menampilkan halaman form tambah user Ajax

        Route::delete('/{id}', [SalesDetailController::class, 'destroy']);       // Menghapus data user
    });
});
