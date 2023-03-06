<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konversi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'amount',
        'currency_name',
        'result',
];

protected $table = 'konversi';
}
