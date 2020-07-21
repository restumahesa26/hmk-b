<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataAnggotaAktif extends Model
{
    use SoftDeletes;

    public $table = "data_anggota_aktif";

    protected $fillable = [
        'nama', 'tempat_lahir', 'jenis_kelamin', 'agama', 'alamat_asal', 'asal_sekolah', 'alamat_bengkulu',
        'status_tinggal', 'asal_kampus', 'jurusan', 'angkatan', 'no_hp', 'media_sosial', 'email', 'tanggal_lahir', 'foto'
    ];
}
