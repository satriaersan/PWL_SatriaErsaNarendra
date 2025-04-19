<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanDetailModel;
use Illuminate\Support\Facades\Validator;
use App\Models\BarangModel;
use App\Models\PenjualanModel;

class SalesDetailController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Data Detail Penjualan',
            'list' => ['Home', 'Detail Penjualan']

        ];

        $barang = BarangModel::all();

        $page = (object)[
            'title' => 'Daftar Detail Penjualan'
        ];

        $data = PenjualanDetailModel::all();
        $activeMenu = 'penjualan_detail';

        return view('penjualan_detail.index', compact('breadcrumb', 'barang', 'page', 'data', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $data = PenjualanDetailModel::with(['barang', 'penjualan']);

        if ($request->barang_id) {
            $data->where('barang_id', $request->barang_id);
        }

        if ($request->penjualan_id) {
            $data->where('penjualan_id', $request->penjualan_id);
        }

        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($pd) {
                

                $btn = '<button onclick="modalAction(\'' . url('/penjualan_detail/' . $pd->detail_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan_detail/' . $pd->detail_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan_detail/' . $pd->detail_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                 return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Detail Penjualan',
            'list' => ['Home', 'Detail Penjualan', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah detail penjualan'
        ];

        $activeMenu = 'penjualan_detail';

        return view('penjualan_detail.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penjualan_id' => 'required|numeric',
            'barang_id' => 'required|numeric',
            'harga_barang' => 'required|numeric',
            'jumlah_barang' => 'required|numeric',
        ]);

        PenjualanDetailModel::create($request->all());

        return redirect('/penjualan_detail')->with('success', 'Detail penjualan berhasil disimpan');
    }

    public function show($id)
    {
        $detail = PenjualanDetailModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Data Penjualan',
            'list' => ['Home', 'Detail Penjualan', 'Lihat']
        ];

        $page = (object)[
            'title' => 'Lihat detail penjualan'
        ];

        $activeMenu = 'penjualan_detail';

        return view('penjualan_detail.show', compact('breadcrumb', 'page', 'detail', 'activeMenu'));
    }

    public function edit($id)
    {
        $detail = PenjualanDetailModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Detail Penjualan',
            'list' => ['Home', 'Detail Penjualan', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit detail penjualan'
        ];

        $activeMenu = 'penjualan_detail';

        return view('penjualan_detail.edit', compact('breadcrumb', 'page', 'detail', 'activeMenu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penjualan_id' => 'required|numeric',
            'barang_id' => 'required|numeric',
            'harga_barang' => 'required|numeric',
            'jumlah_barang' => 'required|numeric',
        ]);

        PenjualanDetailModel::find($id)->update($request->all());

        return redirect('/penjualan_detail')->with('success', 'Detail penjualan berhasil diubah');
    }

    public function destroy($id)
    {
        $check = PenjualanDetailModel::find($id);

        if (!$check) {
            return redirect('/penjualan_detail')->with('error', 'Data tidak ditemukan');
        }

        try {
            PenjualanDetailModel::destroy($id);
            return redirect('/penjualan_detail')->with('success', 'Detail penjualan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/penjualan_detail')->with('error', 'Gagal menghapus data karena masih terhubung dengan tabel lain');
        }
    }

    public function edit_ajax(string $id)
    {
        $penjualanDetail = PenjualanDetailModel::find($id);
        $penjualan = PenjualanModel::all();
        $barang = BarangModel::all();
        return view('penjualan_detail.edit_ajax', [
            'penjualanDetail' => $penjualanDetail,
            'penjualan' => $penjualan,
            'barang' => $barang,
        ]);
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'barang_id'    => ['required', 'integer', 'exists:m_barang,barang_id'],
                'penjualan_id'  => ['required', 'integer', 'exists:t_penjualan,penjualan_id'], // validasi supplier
                'harga_barang' => ['required', 'integer', 'min:1'],
                'jumlah_barang'  => ['required', 'integer', 'min:1'],
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Validasi gagal.',
                    'msgField' => $validator->errors(),
                ]);
            }

            $penjualanDetail = PenjualanDetailModel::find($id);
            if ($penjualanDetail) {
                $penjualanDetail->update($request->all());

                return response()->json([
                    'status'  => true,
                    'message' => 'Data Penjualan Detail berhasil diupdate.',
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
        $penjualan = PenjualanModel::all();
        $barang = BarangModel::all();
        return view('penjualan_detail.create_ajax', [
            'barang' => $barang,
            'penjualan' => $penjualan,
        ]);
    }

    // Simpan data stok baru
    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {

            $rules = [
                'barang_id'    => ['required', 'integer', 'exists:m_barang,barang_id'],
                'penjualan_id'  => ['required', 'integer', 'exists:t_penjualan,penjualan_id'], // validasi supplier
                'harga_barang' => ['required', 'integer', 'min:1'],
                'jumlah_barang'  => ['required', 'integer', 'min:1'],
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

            PenjualanDetailModel::create($data);

            return response()->json([
                'status'  => true,
                'message' => 'Data Penjualan Detail berhasil disimpan.',
            ]);
        }
    }

    public function confirm_ajax(string $id)
    {
        $penjualanDetail = PenjualanDetailModel::find($id);

        return view('penjualan_detail.confirm_ajax', ['penjualanDetail' => $penjualanDetail]);
    }

    public function delete_ajax(Request $request, $id)
    {
        // Mengecek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $penjualanDetail = PenjualanDetailModel::find($id);
            if ($penjualanDetail) {
                try {
                    $penjualanDetail->delete();
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

    public function show_ajax(string $id)
    {
        $penjualanDetail = PenjualanDetailModel::find($id);

        return view('penjualan_detail.show_ajax', ['penjualanDetail' => $penjualanDetail]);
    }
}
