<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PejabatStructural extends Model
{
    use HasFactory;

    protected $table = 'pejabat_structurals';

    protected $fillable = [
        'photo_pejabat',
        'nama_pejabat',
        'jabatan_id',
        'nip_pejabat',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }
}
