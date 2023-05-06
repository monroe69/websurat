<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat_keluar extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';
    protected $guarded = [];

    public function surat()
    {
        return $this->hasOne(Surat::class, 'id', 'surat_id');
    }
}
