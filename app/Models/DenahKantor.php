<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenahKantor extends Model
{
    use HasFactory;

    protected $table = 'denah_kantors';

    protected $fillable = [
        'photo',
    ];
}
