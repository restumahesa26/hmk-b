<?php

namespace App\Http\Controllers\Admin;

use App\DataAlumni;
use App\DataAnggotaAktif;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search(Request $request) 
    {
        $cari = $request->get('keyword');
        $items = DataAnggotaAktif::where('nama','like','%'. $cari .'%')->orWhere('angkatan','like','%'. $cari .'%')->orWhere('asal_kampus','like','%'. $cari .'%')->paginate(10);
        return view('pages.admin.data-anggota-aktif.index', [
            'items' => $items
        ]);
    }

    public function search2(Request $request) 
    {
        $cari = $request->get('keyword');
        $items = DataAlumni::where('nama','like','%'. $cari .'%')->orWhere('angkatan','like','%'. $cari .'%')->orWhere('asal_kampus','like','%'. $cari .'%')->paginate(10);
        return view('pages.admin.data-alumni.index', [
            'items' => $items
        ]);
    }

    public function sort() 
    {
        $items = DataAnggotaAktif::orderBy('nama', 'ASC')->paginate(10);
        return view('pages.admin.data-anggota-aktif.index', [
            'items' => $items
        ]);
    }

    public function sort2() 
    {
        $items = DataAnggotaAktif::orderBy('asal_kampus', 'ASC')->paginate(10);
        return view('pages.admin.data-anggota-aktif.index', [
            'items' => $items
        ]);
    }
    public function sort3() 
    {
        $items = DataAnggotaAktif::orderBy('angkatan', 'ASC')->paginate(10);
        return view('pages.admin.data-anggota-aktif.index', [
            'items' => $items
        ]);
    }

    public function sort4() 
    {
        $items = DataAlumni::orderBy('nama', 'ASC')->paginate(10);
        return view('pages.admin.data-alumni.index', [
            'items' => $items
        ]);
    }

    public function sort5() 
    {
        $items = DataAlumni::orderBy('asal_kampus', 'ASC')->paginate(10);
        return view('pages.admin.data-alumni.index', [
            'items' => $items
        ]);
    }
    public function sort6() 
    {
        $items = DataAlumni::orderBy('angkatan', 'ASC')->paginate(10);
        return view('pages.admin.data-alumni.index', [
            'items' => $items
        ]);
    }
    public function sort7() 
    {
        $items = DataAnggotaAktif::orderBy('jurusan', 'ASC')->paginate(10);
        return view('pages.admin.data-anggota-aktif.index', [
            'items' => $items
        ]);
    }
    public function sort8() 
    {
        $items = DataAlumni::orderBy('jurusan', 'ASC')->paginate(10);
        return view('pages.admin.data-alumni.index', [
            'items' => $items
        ]);
    }
}