<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataAnggotaAktif;
use App\DataAlumni;
use App\RequestData;

class DashboardController extends Controller
{
    public function index(Request $request) 
    {
        $data_anggota_aktif = DataAnggotaAktif::count();
        $data_alumni = DataAlumni::count();
        $total = $data_anggota_aktif + $data_alumni;
        $data = RequestData::count();

        return view('pages.admin.dashboard', [
            'data_anggota_aktif' => $data_anggota_aktif, 'data_alumni' => $data_alumni, 'total' => $total,
            'data' => $data
        ]);
    }
}
