<?php

namespace App\Http\Controllers\CRUD;

use Image;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SuratController extends Controller
{
    // validation
    protected function spartaValidation($request, $id = "")
    {
        $rules = [
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'perihal' => 'required',
            'file' => 'max:1028'
        ];

        $messages = [
            'file.max' => 'Gambar tidak boleh lebih dari 1MB.',
            'file.uploaded' => 'Gambar gagal diupload. File tidak boleh lebih dari 1MB',
        ];
        $validator = Validator::make($request, $rules, $messages);

        if ($validator->fails()) {
            $pesan = [
                'judul' => 'Gagal',
                'pesan' => $validator->messages()->first(),
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
        $data = Surat::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn(
                'action',
                function ($data) {
                    return '<button type="button" class="btn btn-warning btnUbah btn-sm" data-id="' . $data->id . '">Ubah</button>
                    <button type="button" data-id="' . $data->id . '" class="btn btn-danger btnHapus btn-sm">Delete</button>';
                }
            )
            ->addColumn(
                'file_surat',
                function ($data) {
                    $img = '<a href="' . $data->file_surat . '">
                               File Surat ' . $data->no_surat . '
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
        // $data = $request->all();
        // all request except tujuan_surat and tgl_keluar
        $data = $request->except(['tujuan_surat', 'tgl_keluar', 'tgl_masuk', 'asal_surat']);

        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }
        // save picture to storage if exist
        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            // get extension
            $extension = $file->getClientOriginalExtension();
            // generate new name
            $fileName = time() . '.' . $extension;
            // create directory if not exist
            if (!file_exists(public_path('storage/surat'))) {
                mkdir(public_path('storage/surat'), 0777, true);
            }
            // save file to storage
            $file->move(public_path('storage/surat'), $fileName);
            // $imgFile->storeAs('public/surat', $fileName);
            $saveName = "/storage/surat/" . $fileName;
        } else {
            $saveName = null;
        }

        // save data to database
        $data['file_surat'] = $saveName;


        $surat = Surat::create($data);
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Ditambahkan',
            'type' => 'success'
        ];
        return $surat;
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
        return Surat::findOrFail($id);
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
        $data = $request->except(['tujuan_surat', 'tgl_keluar', 'tgl_masuk', 'asal_surat']);
        $validate = $this->spartaValidation($data, $id);
        if ($validate) {
            return $validate;
        }
        // find data by id
        $surat = Surat::find($id);
        $file = $surat->file_surat;
        $path = public_path($file);

        // save picture to storage if exist
        if ($request->hasFile('file_surat')) {
            $path = public_path($file);
            // if file exists
            if (file_exists($path)) {
                // if my_picture /storage/default.png
                unlink($path);
            }

            $file = $request->file('file_surat');
            // get extension
            $extension = $file->getClientOriginalExtension();
            // generate new name
            $fileName = time() . '.' . $extension;
            // create directory if not exist
            if (!file_exists(public_path('storage/surat'))) {
                mkdir(public_path('storage/surat'), 0777, true);
            }
            // save file to storage
            $file->move(public_path('storage/surat'), $fileName);
            // $imgFile->storeAs('public/surat', $fileName);
            $saveName = "/storage/surat/" . $fileName;
        } else {
            $saveName = $file;
        }

        // save data to database
        $data['file_surat'] = $saveName;


        $surat->update($data);
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
        // remove storage
        $data = Surat::find($id);
        $file = $data->file_surat;
        $path = public_path($file);
        // if file exists
        if (file_exists($path)) {
            // if my_picture /storage/default.png
            unlink($path);
        }
        $data->delete();
        // remove data
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Ditambahkan',
            'type' => 'success'
        ];
        return response()->json($pesan);
    }
}
