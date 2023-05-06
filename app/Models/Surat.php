<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surat';
    protected $guarded = [];

    public function suratMasuk()
    {
        return $this->hasOne(Surat_masuk::class);
    }

    public function suratKeluar()
    {
        return $this->hasOne(Surat_keluar::class);
    }
}
