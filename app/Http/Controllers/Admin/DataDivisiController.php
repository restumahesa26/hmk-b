<?php

namespace App\Http\Controllers\Admin;

use App\DataDivisi;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataDivisiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class DataDivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DataDivisi::all();
        $count = DataDivisi::count();
        return view('pages.admin.data-divisi.index', [
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
        $kwu = DataDivisi::where('title', 'Kewirausahaan')->count();
        $psdm = DataDivisi::where('title', 'PSDM')->count();
        $kestari = DataDivisi::where('title', 'Kestari')->count();
        $minbak = DataDivisi::where('title', 'Minbak')->count();
        $rohani = DataDivisi::where('title', 'Kerohanian')->count();
        $infokom = DataDivisi::where('title', 'Infokom')->count();
        return view('pages.admin.data-divisi.create', [
            'kwu' => $kwu, 'psdm' => $psdm, 'kestari' => $kestari,
            'minbak' => $minbak, 'rohani' => $rohani, 'infokom' => $infokom
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataDivisiRequest $request)
    {
        $data = $request -> all();

        $title = $request->get('title');
        $check = DataDivisi::where('title', '=', $title)->first();
        $nama = $request->get('namaKetua');
        $check2 = DataDivisi::where('namaKetua', '=', $nama)->first();

        if ($check === null) {
            if ($check2 === null) {
                $aa = array();
                $bb = array();

                $extension = $request->file('foto')->extension();
                $imageNames = uniqid('img_', microtime()).'.'.$extension;
                Storage::putFileAs('public/images/foto-profil', $request->file('foto'), $imageNames);
                $thumbnailpath = public_path('storage/images/foto-profil/'.$imageNames);
                $img = Image::make($thumbnailpath)->resize(280, 320)->save($thumbnailpath);
        
                $extension2 = $request->file('icon')->extension();
                $iconNames2 = uniqid('img_', microtime()).'.'.$extension2;
                Storage::putFileAs('public/images/icon', $request->file('icon'), $iconNames2);
                $thumbnailpath = public_path('storage/images/icon/'.$iconNames2);
                $img = Image::make($thumbnailpath)->resize(512, 512)->save($thumbnailpath);
        
                if($files=$request->input('anggota')){
                    foreach ($files as $file) {
                        $aa[]=$file;
                    }
                }
        
                if($files=$request->input('proker')){
                    foreach ($files as $file) {
                        $bb[]=$file;
                    }
                }
        
                DataDivisi::insert([
                    'title' => $data['title'],
                    'deskripsi' => $data['deskripsi'],
                    'namaKetua' => $data['namaKetua'],
                    'foto' => $imageNames,
                    'anggota' => implode("|", $aa), 
                    'proker' => implode("|", $bb),
                    'icon' => $iconNames2
                ]);
        
                return redirect() -> route('data-divisi.index')->with('success' , 'Data Divisi Berhasil Ditambah');
            }else {
                return redirect()->back()->withInput()->with('error2', 'Seseorang Tidak Boleh Mengisi Dua Posisi');
            }
        }else{
            return redirect()->back()->withInput()->with('error', 'Data Divisi Sudah Ada');
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
        $item = DataDivisi::findOrFail($id);
        return view('pages.admin.data-divisi.edit', [
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
    public function update(DataDivisiRequest $request, $id)
    {
        $data = DataDivisi::findOrfail($id);

        $item = $request -> all();

        $title2 = $data-> title;
        $title = $request->get('title');
        $check = DataDivisi::where('title', '=', $title)->first();
        $nama2 = $data-> namaKetua;
        $nama = $request->get('namaKetua');
        $check2 = DataDivisi::where('namaKetua', '=', $nama)->first();

        if ($check === null || strtolower($title) == strtolower($title2)) {
            if ($check2 === null || strtolower($nama) == strtolower($nama2)) {

                $imageName = null;
                $iconName = null;
                
                $filename  = ('public/images/foto-profil/').$data-> foto;
                $filename2  = ('public/images/icon/').$data-> icon;

                if ($request->has('foto')) {
                    $extension = $request->file('foto')->extension();
                    $imageNames = uniqid('img_', microtime()).'.'.$extension;
                    Storage::delete($filename);
                    Storage::putFileAs('public/images/foto-profil', $request->file('foto'), $imageNames);
                    $thumbnailpath = public_path('storage/images/foto-profil/'.$imageNames);
                    $img = Image::make($thumbnailpath)->resize(280, 320)->save($thumbnailpath);
                    $imageName = $imageNames;
                }else{
                    $namaFile = $data-> foto;
                    $imageName = $namaFile;
                }

                if ($request->has('icon')) {
                    $extension = $request->file('icon')->extension();
                    $iconNames = uniqid('img_', microtime()).'.'.$extension;
                    Storage::delete($filename2);
                    Storage::putFileAs('public/images/icon', $request->file('icon'), $iconNames);
                    $thumbnailpath = public_path('storage/images/icon/'.$iconNames);
                $img = Image::make($thumbnailpath)->resize(512, 512)->save($thumbnailpath);
                    $iconName = $iconNames;
                }else{
                    $ikonFile = $data-> icon;
                    $iconName = $ikonFile;
                }
            
                $aa = array();
                $bb = array();

                if($files=$request->input('anggota')){
                    foreach ($files as $file) {
                        $aa[]=$file;
                    }
                }

                if($files=$request->input('proker')){
                    foreach ($files as $file) {
                        $bb[]=$file;
                    }
                }

                $data->update([
                    'title' => $item['title'],
                    'deskripsi' => $item['deskripsi'],
                    'namaKetua' => $item['namaKetua'],
                    'foto' => $imageName,
                    'anggota' => implode("|", $aa), 
                    'proker' => implode("|", $bb),
                    'icon' => $iconName 
                ]);

                return redirect() -> route('data-divisi.index')->with('success2' , 'Data Divisi Berhasil Diubah');
            }else {
                return redirect()->back()->withInput()->with('error2', 'Seseorang Tidak Boleh Mengisi Dua Posisi');
            }
        }else{
            return redirect()->back()->withInput()->with('error', 'Data Divisi Sudah Ada');
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
        $data = DataDivisi::findOrfail($id);

        $foto  = ('public/images/foto-profil/').$data-> foto;
        $icon  = ('public/images/icon/').$data-> icon;
        Storage::delete($foto);
        Storage::delete($icon);

        $data->delete();

        return redirect() -> route('data-divisi.index')->with('success3' , 'Data Divisi Berhasil Dihapus');
    }
}
