<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Surat_masuk;
use Illuminate\Http\Request;

class SuratMasukApi extends Controller
{
    public function index()
    {
        $data = Surat_masuk::all();
        return response()->json($data);
    }
}
