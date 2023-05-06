<?php

namespace App\Http\Controllers\CRUD;

use App\Models\Surat;
use App\Models\Surat_masuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class SuratMasukController extends Controller
{
    // validation
    protected function spartaValidation($request, $id = "")
    {

        $validator = Validator::make($request, [
            'asal_surat' => 'required',
            'tgl_masuk' => 'required',
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
        $data = Surat_masuk::with('surat')->get();
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
            ->editColumn('tgl_masuk', function ($data) {
                // return date('d-m-Y', strtotime($data->tgl_masuk));
                return Carbon::createFromFormat('Y-m-d', $data->tgl_masuk)->isoFormat('D MMM Y');
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

        Surat_masuk::create([
            'surat_id' => $surat->id,
            'asal_surat' => $request->asal_surat,
            'tgl_masuk' => $request->tgl_masuk,
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
        $data = Surat_masuk::with('surat')->findOrFail($id);
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
        $surat_masuk = Surat_masuk::find($id);
        $surat = (new SuratController)->update($request, $surat_masuk->surat_id);
        $surat_masuk->update([
            'asal_surat' => $request->asal_surat,
            'tgl_masuk' => $request->tgl_masuk,
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
        $surat_masuk = Surat_masuk::find($id);
        $surat = (new SuratController)->destroy($surat_masuk->surat_id);
        // Surat_masuk::destroy($id);
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Dihapus',
            'type' => 'success'
        ];
        return response()->json($pesan);
    }
}
