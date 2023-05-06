<?php

namespace App\Http\Controllers\CRUD;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Surat_keluar;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SuratKeluarController extends Controller
{
    // validation
    protected function spartaValidation($request, $id = "")
    {

        $validator = Validator::make($request, [
            'tujuan_surat' => 'required',
            'tgl_keluar' => 'required',
        ]);

        if ($validator->fails()) {
            $pesan = [
                'judul' => 'Gagal',
                'pesan' => $validator->errors()->first(),
                'type' => 'error'
            ];
            return response()->json($pesan);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Surat_keluar::with('surat')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($data) {
                    return '<button type="button" class="btn btn-warning btnUbah btn-sm" data-id="' . $data->id . '">Ubah</button>
                    <button type="button" data-id="' . $data->id . '" class="btn btn-danger btnHapus btn-sm">Delete</button>';
                }
            )
            ->editColumn('surat.tgl_surat', function ($data) {
                return Carbon::createFromFormat('Y-m-d', $data->surat->tgl_surat)->isoFormat('D MMM Y');
            })
            ->editColumn('tgl_keluar', function ($data) {
                // return date('d-m-Y', strtotime($data->tgl_keluar));
                return Carbon::createFromFormat('Y-m-d', $data->tgl_keluar)->isoFormat('D MMM Y');
            })
            ->addColumn(
                'file_surat',
                function ($data) {
                    $img = '<a href="' . $data->surat->file_surat . '">
                               File Surat ' . $data->surat->no_surat . '
                            </a>';
                    return $img;
                }
            )
            ->rawColumns(['file_surat', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->spartaValidation($request->all());
        if ($validate) {
            return $validate;
        }
        $surat = (new SuratController)->store($request);

        Surat_keluar::create([
            'surat_id' => $surat->id,
            'tujuan_surat' => $request->tujuan_surat,
            'tgl_keluar' => $request->tgl_keluar,
        ]);

        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Ditambahkan',
            'type' => 'success'
        ];
        return response()->json($pesan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Surat_keluar::with('surat')->findOrFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $surat_keluar = Surat_keluar::find($id);
        $surat = (new SuratController)->update($request, $surat_keluar->surat_id);
        $surat_keluar->update([
            'tujuan_surat' => $request->tujuan_surat,
            'tgl_keluar' => $request->tgl_keluar,
        ]);
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Ditambahkan',
            'type' => 'success'
        ];
        return response()->json($pesan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat_keluar = Surat_keluar::find($id);
        $surat = (new SuratController)->destroy($surat_keluar->surat_id);
        // surat$surat_keluar::destroy($id);
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Dihapus',
            'type' => 'success'
        ];
        return response()->json($pesan);
    }
}
