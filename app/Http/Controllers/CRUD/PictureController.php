<?php

namespace App\Http\Controllers\CRUD;

use App\Models\Picture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
// import the Intervention Image Manager Class
use Image;

class PictureController extends Controller
{
    // validation
    protected function spartaValidation($request, $id = "")
    {
        $required = $id == "" ? 'required|' : '';

        $rules = [
            'type' => 'required',
            'path' => $required . '|max:1028'
        ];

        $messages = [
            'path.required' => 'Gambar harus diisi.',
            'path.max' => 'Gambar tidak boleh lebih dari 1MB.',
            'path.uploaded' => 'Gambar gagal diupload. File tidak boleh lebih dari 1MB',
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
        $data = Picture::all();
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
                'path',
                function ($data) {
                    $img = '<a href="' . $data->path . '" data-lightbox="path">
                                <img src="' . $data->path . '" alt="' . $data->path . '" height="60px">
                            </a>';
                    return $img;
                }
            )
            ->rawColumns(['path', 'action'])
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
        $data = $request->all();
        $validate = $this->spartaValidation($data);
        if ($validate) {
            return $validate;
        }
        // save picture to storage if exist
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            // get extension
            $extension = $file->getClientOriginalExtension();
            // generate new name
            $fileName = time() . '.' . $extension;
            $imgFile = Image::make($file->getRealPath());
            $imgFile->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            // create directory if not exist
            if (!file_exists(public_path('storage/my_picture'))) {
                mkdir(public_path('storage/my_picture'), 0777, true);
            }
            $imgFile->save(public_path('/storage/my_picture/' . $fileName));
            // $imgFile->storeAs('public/my_picture', $fileName);
            $saveName = "/storage/my_picture/" . $fileName;
        } else {
            $saveName = "/storage/default.png";
        }

        // save data to database
        $data['path'] = $saveName;


        Picture::create($data);
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
        return Picture::findOrFail($id);
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
        $data = $request->all();
        $validate = $this->spartaValidation($data, $id);
        if ($validate) {
            return $validate;
        }
        // find data by id
        $picture = Picture::find($id);
        $my_picture = $picture->path;

        // save picture to storage if exist
        if ($request->hasFile('path')) {
            $path = public_path($my_picture);
            // if file exists
            if (file_exists($path)) {
                // if path /storage/default.png
                if ($my_picture != "/storage/default.png") {
                    // delete file
                    unlink($path);
                }
            }
            $file = $request->file('path');
            // get extension
            $extension = $file->getClientOriginalExtension();
            // generate new name
            $fileName = time() . '.' . $extension;
            $imgFile = Image::make($file->getRealPath());
            $imgFile->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imgFile->save(public_path('/storage/my_picture/' . $fileName));
            $saveName = "/storage/my_picture/" . $fileName;
        } else {
            $saveName = $my_picture;
        }

        // save data to database
        $data['path'] = $saveName;


        $picture->update($data);
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
        $data = Picture::find($id);
        $file = $data->path;
        $path = public_path($file);
        // if file exists
        if (file_exists($path)) {
            // if my_picture /storage/default.png
            if ($file != "/storage/default.png") {
                // delete file
                unlink($path);
            }
        }
        // remove data
        $data->delete();
        $pesan = [
            'judul' => 'Berhasil',
            'pesan' => 'Data Telah Ditambahkan',
            'type' => 'success'
        ];
        return response()->json($pesan);
    }
}
