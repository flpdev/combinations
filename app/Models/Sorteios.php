<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorteios extends Model
{
    use HasFactory;

    protected $fillable = ['concurso', 'numeros', 'data'];

    protected $casts = [
        'numeros' => 'array',  // Para lidar com o campo JSON
    ];
}
