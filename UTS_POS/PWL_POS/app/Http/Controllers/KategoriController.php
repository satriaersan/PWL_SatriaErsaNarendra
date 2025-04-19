<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;

class KategoriController extends Controller
{
  //     public function index(){
  //   $data = [
  //       'kategori_kode' => 'SNK',
  //       'kategori_nama' => 'Snack/Makanan Ringan',
  //       'created_at' => now()
  //   ];

  //   DB::table('m_kategori')->insert($data);
  //   return 'Insert data baru berhasil';

  // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
  // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

  // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
  // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

  //   $data = DB::table('m_kategori')->get();
  //   return view('kategori', ['data' => $data]);
  // }

  public function index()
  {
    $breadcrumb = (object) [
      'title' => 'Daftar Kategori',
      'list' => ['Home', 'Kategori']
    ];

    $page = (object) [
      'title' => 'Daftar Kategori yang terdaftar di sistem'
    ];

    $activeMenu = 'kategori';

    return view('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
  }

  public function list(Request $request)
  {
    $kategori = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');

    if ($request->kategori_nama) {
      $kategori->where('kategori_nama', 'like', '%' . $request->kategori_nama . '%');
    }

    return DataTables::of($kategori)
      ->addIndexColumn()
      ->addColumn('aksi', function ($kategori) {
        // $btn = '<a href="' . url('/kategori/' . $kategori->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
        // $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $kategori->kategori_id) . '">'
        //   . csrf_field() . method_field('DELETE') .
        //   '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
        $btn = '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id .
          '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
        $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id .
          '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
        $btn .= '<bsutton onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id .
          '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
        return $btn;
      })
      ->rawColumns(['aksi'])
      ->make(true);
  }

  public function create()
  {
    $breadcrumb = (object) [
      'title' => 'Tambah Kategori',
      'list' => ['Home', 'Kategori', 'Tambah']
    ];

    $page = (object) [
      'title' => 'Tambah Kategori Baru'
    ];

    $activeMenu = 'kategori';

    return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'kategori_kode' => 'required|unique:m_kategori',
      'kategori_nama' => 'required'
    ]);

    KategoriModel::create($request->all());

    return redirect('/kategori')->with('status', 'Data kategori berhasil ditambahkan!');
  }

  public function edit($id)
  {
    $breadcrumb = (object) [
      'title' => 'Edit Kategori',
      'list' => ['Home', 'Kategori', 'Edit']
    ];

    $page = (object) [
      'title' => 'Edit Kategori'
    ];

    $activeMenu = 'kategori';

    $kategori = KategoriModel::find($id);

    return view('kategori.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'kategori' => $kategori]);
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'kategori_kode' => 'required|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
      'kategori_nama' => 'required'
    ]);

    KategoriModel::find($id)->update($request->all());

    return redirect('/kategori')->with('status', 'Data kategori berhasil diubah!');
  }

  public function destroy($id)
  {
    $check = KategoriModel::find($id);
    if (!$check) {
      return redirect('/kategori')->with('error', 'Data user tidak ditemukan');
    }

    try {
      KategoriModel::destroy($id);

      return redirect('/kategori')->with('success', 'Data user berhasil dihapus');
    } catch (\Exception $e) {
      return redirect('/kategori')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
    }
  }


  public function create_ajax()
  {
    return view('kategori.create_ajax');
  }

  public function store_ajax(Request $request)
  {
    // cek apakah request berupa ajax
    if ($request->ajax() || $request->wantsJson()) {
      $rules = [
        'kategori_kode'  => 'required|string|max:10|unique:m_kategori,kategori_kode',
        'kategori_nama'  => 'required|string|max:100',
      ];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
        return response()->json([
          'status' => false, // response status, false: error/gagal, true: berhasil
          'message' => 'Validasi gagal',
          'msgField' => $validator->errors(), // pesan error validasi
        ]);
      }

      KategoriModel::create($request->all());

      return response()->json([
        'status' => true,
        'message' => 'Data kategori berhasil disimpan'
      ]);
    }

    redirect('/');
  }

  //menampilkan halaman form edit kategori ajax
  public function edit_ajax(string $id)
  {
    $kategori = KategoriModel::find($id);

    return view('kategori.edit_ajax', ['kategori' => $kategori]);
  }

  public function update_ajax(Request $request, $id)
  {
    // cek apakah request dari ajax
    if ($request->ajax() || $request->wantsJson()) {
      $rules = [
        'kategori_kode'  => 'required|string|max:10|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
        'kategori_nama'  => 'required|string|max:100',
      ];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
        return response()->json([
          'status' => false, // respon json, true: berhasil, false: gagal
          'message' => 'Validasi gagal.',
          'msgField' => $validator->errors() // menunjukkan field mana yang error
        ]);
      }

      $kategori = KategoriModel::find($id);
      if ($kategori) {
        $kategori->update($request->all());
        return response()->json([
          'status' => true,
          'message' => 'Data berhasil diupdate'
        ]);
      } else {
        return response()->json([
          'status' => false,
          'message' => 'Data tidak ditemukan'
        ]);
      }
    }
    return redirect('/');
  }

  public function confirm_ajax(string $id)
  {
    $kategori = KategoriModel::find($id);

    return view('kategori.confirm_ajax', ['kategori' => $kategori]);
  }

  public function delete_ajax(Request $request, $id)
  {
    // cek apakah request dari ajax
    if ($request->ajax() || $request->wantsJson()) {
      $kategori = KategoriModel::find($id);
      if ($kategori) {
        $kategori->delete();
        return response()->json([
          'status' => true,
          'message' => 'Data berhasil dihapus'
        ]);
      } else {
        return response()->json([
          'status' => false,
          'message' => 'Data tidak ditemukan'
        ]);
      }
    }
    return redirect('/');
  }

  public function import()
  {
    return view('kategori.import');
  }

  public function import_ajax(Request $request)
  {
    if ($request->ajax() || $request->wantsJson()) {
      $rules = [
        'file_kategori' => ['required', 'mimes:xlsx', 'max:4096'],
      ];
      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
        return response()->json([
          'status' => false,
          'message' => 'Validasi Gagal',
          'msgField' => $validator->errors(),
        ]);
      }

      $file = $request->file('file_kategori');
      $reader = IOFactory::createReader('Xlsx');
      $reader->setReadDataOnly(true);
      $spreadsheet = $reader->load($file->getRealPath());
      $sheet = $spreadsheet->getActiveSheet();
      $data = $sheet->toArray(null, false, true, true);
      $insert = [];

      if (count($data) > 1) {
        foreach ($data as $baris => $value) {
          if ($baris > 1) {
            $insert[] = [
              'kategori_kode' => $value['A'],
              'kategori_nama' => $value['B'],
              'created_at' => now(),
            ];
          }
        }

        if (count($insert) > 0) {
          KategoriModel::insertOrIgnore($insert);
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

  public function export_excel()
  {
    // ambil data kategori yang akan di export
    $kategori = KategoriModel::select('kategori_kode', 'kategori_nama')
      ->orderBy('kategori_id')
      ->get();

    // load library excel
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet(); // ambil sheet yang aktif

    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Kode Kategori');
    $sheet->setCellValue('C1', 'Nama Kategori');

    $sheet->getStyle('A1:C1')->getFont()->setBold(true); // bold header

    $no = 1; // nomor data dimulai dari 1
    $baris = 2; // baris data dimulai dari baris ke 2
    foreach ($kategori as $key => $value) {
      $sheet->setCellValue('A' . $baris, $no);
      $sheet->setCellValue('B' . $baris, $value->kategori_kode);
      $sheet->setCellValue('C' . $baris, $value->kategori_nama);
      $baris++;
      $no++;
    }

    foreach (range('A', 'C') as $columnID) {
      $sheet->getColumnDimension($columnID)->setAutoSize(true); // set auto size untuk kolom
    }

    $sheet->setTitle('Data Kategori'); // set title sheet

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx'); //Membuat “penulis” file Excel dalam format .xlsx
    $filename = 'Data Kategori_' . date('Y-m-d H:i:s') . '.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); // memberi tahu bahwa ini adalah file excel
    header('Content-Disposition: attachment;filename="' . $filename . '"'); //Memberi tau browser supaya file langsung di-download, bukan dibuka di browser.  
    header('Cache-Control: max-age=0');
    header('Cache-Control: max-age=1'); //Supaya browser tidak menyimpan versi lama dari file ini.
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); //Tanggal kadaluarsa file ini ditetapkan ke masa lalu → artinya file ini harus dianggap baru setiap saat.  
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // memberi tahu bahwa sekarang adaah terakhir modifikasi.
    header('Cache-Control: cache, must-revalidate'); // File ini bisa di-cache, tapi harus diperiksa dulu ke server apakah ada versi terbaru.
    header('Pragma: public'); //Boleh disimpan (public cache) di beberapa kasus, untuk dukung browser lama.

    $writer->save('php://output');
    exit;
  }

  public function export_pdf(){
    $barang = KategoriModel::select('kategori_kode', 'kategori_nama')
                ->orderBy('kategori_id')
                ->get();
    $pdf = Pdf::loadView('kategori.export_pdf', ['barang' => $barang]);
    $pdf->setPaper('A4', 'portrait');
    $pdf->setOptions(['isRemoteEnabled' => true]);
    $pdf->render();

    return $pdf->stream('Data Kategori_' . date('Y-m-d H:i:s') . '.pdf');
}

public function show_ajax(string $id)
{
    $kategori = KategoriModel::find($id);

    return view('kategori.show_ajax', ['kategori' => $kategori]);
}

}
