<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawabans';

    protected $fillable = [
        'survey_id',
        'pertanyaans_id',
        'bidangs_id',
        'options_id'
    ];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaans_id', 'id');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidangs_id', 'id');
    }

    public function options()
    {
        return $this->belongsTo(Option::class, 'options_id', 'id');
    }
}
