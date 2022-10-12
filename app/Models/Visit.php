<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $table = 'visits_tabele';

    protected $fillable = [
        'id',
        'doctor',
        'user',
        'date',
    ];
}
