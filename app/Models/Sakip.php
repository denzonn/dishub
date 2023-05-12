<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sakip extends Model
{
    use HasFactory;

    protected $table = 'sakips';

    protected $fillable = [
        'judul_sakip',
        'file_sakip',
    ];
}
