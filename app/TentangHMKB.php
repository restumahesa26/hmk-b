<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TentangHMKB extends Model
{
    public $table = 'tentang_hmkb';

    use SoftDeletes;

    protected $fillable = [
        'dataTentang'
    ];
}
