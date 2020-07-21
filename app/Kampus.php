<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kampus extends Model
{
    public $table = "kampus";

    use SoftDeletes;

    protected $fillable = [
        'nama_kampus', 'image'
    ];
}
