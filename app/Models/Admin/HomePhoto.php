<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePhoto extends Model
{
    use HasFactory;

    protected  $table = 'home_photos';

    protected $fillable = [
        'photo',
    ];
}
