<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Surat_keluar;
use Illuminate\Http\Request;

class SuratKeluarApi extends Controller
{
    public function index()
    {
        $data = Surat_keluar::all();
        return response()->json($data);
    }
}
