<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    use HasFactory;

    protected $table = 'sosmeds';

    protected $fillable = [
        'nama_sosmed',
        'icon_sosmed',
        'link_sosmed',
    ];
}
