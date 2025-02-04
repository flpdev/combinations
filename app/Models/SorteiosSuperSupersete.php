<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SorteiosSuperSupersete extends Model
{
    use HasFactory;
    protected $table = 'sorteios_supersete';
    protected $fillable = ['concurso', 'data', 'local', 'dezenas'];
    protected $casts = [
        'dezenas' => 'array',
    ];
}
