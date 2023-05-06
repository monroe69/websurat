<?php

namespace App\Http\Controllers\CETAK;

use App\Http\Controllers\Controller;
use App\Models\Surat_keluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratKeluarPdfController extends Controller
{
    public function index()
    {
        $data = Surat_keluar::with('surat')->get();
        // return view('ketua.surat_keluar.cetak_pdf', [
        //     'data' => $data
        // ]);
        $pdf = PDF::loadView('ketua.surat_keluar.cetak_pdf', [
            'data' => $data
        ]);

        return $pdf->stream('Laporan Surat Keluar.pdf');
    }
}
