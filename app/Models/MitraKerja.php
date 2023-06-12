<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraKerja extends Model
{
    use HasFactory;

    protected $table = 'mitra_kerjas';

    protected $fillable = [
        'photo',
        'judul',
        'description',
    ];
}
