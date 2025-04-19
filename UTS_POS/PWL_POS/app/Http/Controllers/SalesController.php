<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use App\Models\PenjualanModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
;

class SalesController extends Controller
{
    public function index()
    {
        
        // $breadcrumb = (object)[
        //     'title' => 'Data Penjualan',
        //     'list' => ['Home', 'Penjualan']
        // ];

        // $page = (object)[
        //     'title' => 'Daftar Penjualan'
        // ];

        // $penjualan = PenjualanModel::all();
        
        // $activeMenu = 'penjualan';

        // return view('penjualan.index', compact('breadcrumb', 'page', 'penjualan', 'activeMenu'));
        $breadcrumb = (object) [
            'title' => 'Daftar Penjualan',
            'list'  => ['Home', 'Penjualan']
        ];

        $page = (object) [
            'title' => 'Daftar penjualan yang terdaftar dalam sistem'
        ];

        $activeMenu = 'penjualan';


        $users = UserModel::all();

        return view('penjualan.index', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'users'      => $users,
            'activeMenu' => $activeMenu
        ]);
        
    }

    public function create()
    {
        $users = DB::table('m_user')->get(); // Mengambil semua data pengguna
        $breadcrumb = (object)[
            'title' => 'Tambah Penjualan',
            'list' => ['Home', 'Penjualan', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah data penjualan baru'
        ];

        $activeMenu = 'penjualan';

        return view('penjualan.create', compact('breadcrumb', 'page', 'activeMenu','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'penjualan_kode' => 'required',
            'pembeli' => 'required',
            'user_id' => 'required|exists:m_user,user_id',
        ]);

        
        PenjualanModel::create($request->all());

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil disimpan');
    }

    public function show($id)
    {
        $penjualan = PenjualanModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Penjualan',
            'list' => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail data penjualan'
        ];
        $users = DB::table('m_user')->get(); // Mengambil semua data pengguna
        $activeMenu = 'penjualan';

        return view('penjualan.show', compact('breadcrumb', 'page', 'penjualan', 'activeMenu','users'));
    }

    public function edit($id)
    {
        $penjualan = PenjualanModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Penjualan',
            'list' => ['Home', 'Penjualan', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit data penjualan'
        ];
        $users = DB::table('m_user')->get(); // Mengambil semua data pengguna
        $activeMenu = 'penjualan';

        return view('penjualan.edit', compact('breadcrumb', 'page', 'penjualan', 'activeMenu','users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'penjualan_kode' => 'required',
            'pembeli' => 'required',
            'user_id' => 'required|exists:m_user,user_id',
        ]);

        PenjualanModel::find($id)->update($request->all());

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil diubah');
    }

    public function destroy($id)
    {
        $check = PenjualanModel::find($id);

        if (!$check) {
            return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
        }

        try {
            PenjualanModel::destroy($id);
            return redirect('/penjualan')->with('success', 'Data penjualan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/penjualan')->with('error', 'Gagal menghapus data penjualan karena masih terhubung dengan tabel lain');
        }
    }

    public function list(Request $request)
    {
        $data = PenjualanModel::with('user')->orderBy('penjualan_id', 'ASC');
        
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($p) {
                

                $btn = '<button onclick="modalAction(\'' . url('/penjualan/' . $p->penjualan_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan/' . $p->penjualan_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan/' . $p->penjualan_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                 return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function confirm_ajax(string $id)
     {
         $penjualan = PenjualanModel::with('user')->find($id);
 
         return view('penjualan.confirm_ajax', ['penjualan' => $penjualan]);
     }

     public function delete_ajax(Request $request, $id)
     {
         // Mengecek apakah request dari ajax
         if ($request->ajax() || $request->wantsJson()) {
             $penjualan = PenjualanModel::find($id);
             if ($penjualan) {
                 try {
                     $penjualan->delete();
                     return response()->json([
                         'status' => true,
                         'message' => 'Data berhasil dihapus'
                     ]);
                 } catch (\Illuminate\Database\QueryException $e) {
                     return response()->json([
                         'status' => false,
                         'message' => 'Data tidak bisa dihapus'
                     ]);
                 }
             } else {
                 return response()->json([
                     'status' => false,
                     'message' => 'Data tidak ditemukan'
                 ]);
             }
         }
         return redirect('/');
     }

     public function edit_ajax(string $id)
    {
        $penjualan = PenjualanModel::find($id);
        $user = UserModel::select('user_id', 'nama')->get();

        return view('penjualan.edit_ajax', [
            'penjualan' => $penjualan,
            'user' => $user,
        ]);
    }

     public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'penjualan_kode'    => ['required', 'string','max:10'],
                'pembeli'  => ['required', 'string'], 
                'tanggal_penjualan' => ['required', 'date'],
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Validasi gagal.',
                    'msgField' => $validator->errors(),
                ]);
            }

            $penjualan = PenjualanModel::find($id);
            if ($penjualan) {
                $penjualan->update($request->all());

                return response()->json([
                    'status'  => true,
                    'message' => 'Data Penjualan berhasil diupdate.',
                ]);
            }

            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan.',
            ]);
        }
    }
    
    public function create_ajax()
    {
        return view('penjualan.create_ajax');
    }

    // Simpan data stok baru
    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {

            $rules = [
                'pembeli'           => ['required', 'string', 'max:100'],
                'penjualan_kode'    => ['required', 'string', 'max:20', 'unique:t_penjualan,penjualan_kode'],
                'tanggal_penjualan' => ['required', 'date'],
            ];
            


            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Validasi gagal.',
                    'msgField' => $validator->errors(),
                ]);
            }

            $data = $request->all();
            $data['user_id'] = auth()->id();

            PenjualanModel::create($data);



            return response()->json([
                'status'  => true,
                'message' => 'Data stok berhasil disimpan.',
            ]);
        }
    }

    public function show_ajax(string $id)
     {
         $penjualan = PenjualanModel::with('user')->find($id);
        
         return view('penjualan.show_ajax', ['penjualan' => $penjualan]);
     }

     public function import()
     {
         return view('penjualan.import');
     }
 
     public function import_ajax(Request $request)
     {
         if ($request->ajax() || $request->wantsJson()) {
             $rules = [
                 'file_penjualan' => ['required', 'mimes:xlsx', 'max:4096'],
             ];
             $validator = Validator::make($request->all(), $rules);
 
             if ($validator->fails()) {
                 return response()->json([
                     'status' => false,
                     'message' => 'Validasi Gagal',
                     'msgField' => $validator->errors(),
                 ]);
             }
 
             $file = $request->file('file_penjualan');
             $reader = IOFactory::createReader('Xlsx');
             $reader->setReadDataOnly(true);
             $spreadsheet = $reader->load($file->getRealPath());
             $sheet = $spreadsheet->getActiveSheet();
             $data = $sheet->toArray(null, false, true, true);
             $insert = [];
 
             if (count($data) > 1) {
                 foreach ($data as $baris => $value) {
                     if ($baris > 1) {
                         $tanggal = $value['D'];
         
                         // Cek apakah kolom D adalah angka (mungkin format tanggal Excel)
                         if (is_numeric($tanggal)) {
                             // Format Excel serial number
                             $tanggal = Date::excelToDateTimeObject($tanggal)->format('Y-m-d H:i:s');
                         } else {
                             // Format teks "14/04/2025 08:17:55"
                             $date = \DateTime::createFromFormat('d/m/Y H:i:s', $tanggal);
                             if ($date) {
                                 $tanggal = $date->format('Y-m-d H:i:s');
                             } else {
                                 // Kalau gagal parsing, set null aja
                                 $tanggal = null;
                             }
                         }
                         $insert[] = [
                             'user_id' => $value['A'],
                             'pembeli' => $value['B'],
                             'penjualan_kode' => $value['C'],
                             'tanggal_penjualan' => $tanggal,
                             'created_at' => now(),
                         ];
                     }
                 }
 
                 if (count($insert) > 0) {
                     PenjualanModel::insertOrIgnore($insert);
                 }
 
                 return response()->json([
                     'status' => true,
                     'message' => 'Data berhasil diimport',
                 ]);
             } else {
                 return response()->json([
                     'status' => false,
                     'message' => 'Tidak ada data yang diimport',
                 ]);
             }
         }
 
         return redirect('/');
     }

}