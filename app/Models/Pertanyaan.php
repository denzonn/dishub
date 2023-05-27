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
        'options_id'
    ];

    public function options()
    {
        return $this->belongsTo(Option::class);
    }
}
