<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    public $table = "jenis_kelamin";

    protected $fillable = [
        'jenis_kelamin'
    ];
}
