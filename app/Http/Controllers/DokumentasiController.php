<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataDokumentasi;

class DokumentasiController extends Controller
{
    public function index()
    {
        $items = DataDokumentasi::all();

        return view('pages.dokumentasi', [
            'items' => $items
        ]);
    }
}
