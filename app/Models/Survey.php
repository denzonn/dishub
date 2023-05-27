<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'survey';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'pekerjaan',
        'email',
        'pertanyaan_id',
        'jawaban_id',
    ];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class);
    }
}
