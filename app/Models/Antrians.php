<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrians extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'no_antrian',
        'id_poli',
        'tanggal',
        'status',
    ];
}
