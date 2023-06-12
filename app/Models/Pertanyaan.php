<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaans';

    protected $fillable = [
        'pertanyaan',
        'bidangs_id'
    ];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidangs_id', 'id');
    }
}
