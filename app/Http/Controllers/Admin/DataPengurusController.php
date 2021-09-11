<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataPengurus; 
use App\Http\Requests\Admin\DataPengurusRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class DataPengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DataPengurus::all();
        $count = DataPengurus::count();
        return view('pages.admin.data-pengurus.index', [
            'items' => $items, 'count' => $count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ketua = DataPengurus::where('posisi', 'Ketua')->count();
        $wakil_ketua = DataPengurus::where('posisi', 'Wakil Ketua')->count();
        $sekretaris = DataPengurus::where('posisi', 'Sekretaris')->count();
        $bendahara = DataPengurus::where('posisi', 'Bendahara')->count();
        $dpo = DataPengurus::where('posisi', 'DPO')->count();
        return view('pages.admin.data-pengurus.create', [
            'ketua' => $ketua, 'dpo' => $dpo, 'wakil_ketua' => $wakil_ketua, 
            'sekretaris' => $sekretaris, 'bendahara' => $bendahara
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataPengurusRequest $request)
    {
        $data = $request -> all();

        $posisi = $request->get('posisi');
        $check = DataPengurus::where('posisi', '=', $posisi)->first();
        $dpo = DataPengurus::where('posisi', 'DPO')->count();
        $namaPengurus = $request->get('nama');
        $check2 = DataPengurus::where('nama', '=', $namaPengurus)->first();

        if ($dpo < 5 || $check === null) {
            if ($check2 === null) {
                $file = $request->file('fotoProfil');

                $extension = $file->extension();
                $imageNames = uniqid('img_', microtime()).'.'.$extension;
                Storage::putFileAs('public/images/foto-pengurus', $file, $imageNames);
                $thumbnailpath = public_path('storage/images/foto-pengurus/'.$imageNames);
                $img = Image::make($thumbnailpath)->resize(280, 320)->save($thumbnailpath);

                DataPengurus::insert([
                    'nama' => $data['nama'],
                    'posisi' => $data['posisi'],
                    'foto' => $imageNames,
                ]);

                return redirect()->route('data-pengurus.index')->with('success' , 'Data Pengurus Berhasil Ditambah');
            }else{
                return redirect()->back()->withInput()->with('error2', 'Seseorang Tidak Boleh Mengisi Dua Posisi');
            }
        }else{
            return redirect()->back()->withInput()->with('error', 'Pengurus Sudah Ada');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DataPengurus::findOrFail($id);
        return view('pages.admin.data-pengurus.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DataPengurusRequest $request, $id)
    {
        $data = $request -> all();
        $item = DataPengurus::findOrFail($id);

        $nama = $item-> nama;
        $posisi2 = $item-> posisi;
        $posisi = $request->get('posisi');
        $check = DataPengurus::where('posisi', '=', $posisi)->first();
        $dpo = DataPengurus::where('posisi', 'DPO')->count();
        $namaPengurus = $request->get('nama');
        $check2 = DataPengurus::where('nama', '=', $namaPengurus)->first();

        if ($dpo < 5 || $check === null || strtolower($posisi) == strtolower($posisi2)) {
            if ($check2 === null || strtolower($nama) == strtolower($namaPengurus)) {
                $imageName = null;
                $filename  = ('public/images/foto-pengurus/').$item->foto;
                $file = $request->file('fotoProfil');
        
                if ($request->has('fotoProfil')) {
                    $extension = $file->extension();
                    $imageNames = uniqid('img_', microtime()).'.'.$extension;
                    Storage::delete($filename);
                    Storage::putFileAs('public/images/foto-pengurus', $file, $imageNames);
                    $imageName = $imageNames;
                    $thumbnailpath = public_path('storage/images/foto-pengurus/'.$imageNames);
                    $img = Image::make($thumbnailpath)->resize(280, 320)->save($thumbnailpath);
                }else{
                    $namaFile = $item->foto;
                    $imageName = $namaFile;
                }
        
                $item->update([
                    'nama' => $data['nama'],
                    'posisi' => $data['posisi'],
                    'foto' => $imageName
                ]);
        
                return redirect()->route('data-pengurus.index')->with('success2' , 'Data Pengurus Berhasil Diubah');
            }else{
                return redirect()->back()->withInput()->with('error2', 'Seseorang Tidak Boleh Mengisi Dua Posisi');
            }
        }else{
            return redirect()->back()->withInput()->with('error', 'Pengurus Sudah Ada');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DataPengurus::findOrFail($id);

        $filename  = ('public/images/foto-pengurus/').$item-> fotoProfil;
        Storage::delete($filename);
        
        $item -> delete();

        return redirect() -> route('data-pengurus.index')->with('success3' , 'Data Pengurus Berhasil Diubah');
    }
}
