<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPengurus extends Model
{
    public $table = 'data_pengurus';

    use SoftDeletes;

    protected $fillable = [
        'nama', 'posisi', 'fotoProfil'
    ];
}
