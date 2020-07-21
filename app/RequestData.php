<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestData extends Model
{
    public $table = 'request_data';

    protected $fillable = [
        'nama', 'tanggal_lahir', 'tempat_lahir', 'jenis_kelamin', 'agama', 'alamat_asal', 'asal_sekolah', 'alamat_bengkulu',
        'status_tinggal', 'asal_kampus', 'jurusan', 'angkatan', 'no_hp', 'media_sosial', 'email', 'foto'
    ];
}
