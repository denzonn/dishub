<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';

    protected $fillable = [
        'nama_pengadu',
        'email_pengadu',
        'no_hp_pengadu',
        'judul_pengaduan',
        'isi_pengaduan',
        'photo_pengaduan',
        'status_pengaduan'
    ];
}
