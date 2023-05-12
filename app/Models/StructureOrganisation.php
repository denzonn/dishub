<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructureOrganisation extends Model
{
    use HasFactory;

    protected $table = 'structure_organisations';

    protected $fillable = [
        'photo_structure',
    ];
}
