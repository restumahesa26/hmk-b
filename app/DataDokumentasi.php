<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataDokumentasi extends Model
{
    public $table = "data_dokumentasi";

    protected $fillable = [
        'judul', 'name'
    ];
}
