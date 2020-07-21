<?php

namespace App\Http\Controllers;

use App\DataDivisi;
use Illuminate\Http\Request;
use App\TentangHMKB;
use App\DataPengurus;
use App\Kampus;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_tentang = TentangHMKB::all();
        $ketua = DataPengurus::where('posisi', 'Ketua')->get();
        $wakil_ketua = DataPengurus::where('posisi', 'Wakil Ketua')->get();
        $sekretaris = DataPengurus::where('posisi', 'Sekretaris')->get();
        $bendahara = DataPengurus::where('posisi', 'Bendahara')->get();
        $dpo = DataPengurus::where('posisi', 'DPO')->get();
        $divisi = DataDivisi::all();
        $kampus = Kampus::all();

        return view('pages.home', [
            'data_tentang' => $data_tentang, 'ketua' => $ketua, 'wakil_ketua' => $wakil_ketua,
            'sekretaris' => $sekretaris, 'bendahara' => $bendahara, 'dpo' => $dpo, 'divisi' => $divisi,
            'kampus' => $kampus
        ]);
    }
}
