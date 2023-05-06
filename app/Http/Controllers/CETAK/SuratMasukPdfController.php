<?php

namespace App\Http\Controllers\CETAK;

use App\Http\Controllers\Controller;
use App\Models\Surat_masuk;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;


class SuratMasukPdfController extends Controller
{
    public function index()
    {
        $data = Surat_masuk::with('surat')->get();
        // return view('ketua.surat_masuk.cetak_pdf', [
        //     'data' => $data
        // ]);
        $pdf = PDF::loadView('ketua.surat_masuk.cetak_pdf', [
            'data' => $data
        ]);

        return $pdf->stream('Laporan Surat Masuk.pdf');
    }
}
