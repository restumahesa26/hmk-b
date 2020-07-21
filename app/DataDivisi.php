<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataDivisi extends Model
{
    use SoftDeletes;
    
    public $table = 'data_divisi';

    protected $fillable = [
        'title', 'deskripsi', 'namaKetua', 'anggota', 'proker', 'foto', 'icon'
    ];
}
