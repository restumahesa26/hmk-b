<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataDokumentasi;
use App\Http\Requests\Admin\DataDokumentasiRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class DataDokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DataDokumentasi::all();
        return view('pages.admin.data-dokumentasi.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.data-dokumentasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataDokumentasiRequest $request)
    {
        $data = $request -> all();
        $name=array();

        if ($files=$request->file('name')) {
            foreach ($files as $file) {
                $extension = $file->extension();
                $imageNames = uniqid('img_', microtime()).'.'.$extension;
                Storage::putFileAs('public/images/foto-dokumentasi', $file, $imageNames);
                $name[]=$imageNames;
                $thumbnailpath = public_path('storage/images/foto-dokumentasi/'.$imageNames);
                $img = Image::make($thumbnailpath)->resize(2000, 1300)->save($thumbnailpath);
            }
        }

        DataDokumentasi::insert([
            'judul' => $data['judul'],
            'name' => implode("|", $name)
        ]);
        return redirect() -> route('data-dokumentasi.index')->with('success' , 'Data Dokumentasi Berhasil Ditambah');
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
        $item = DataDokumentasi::findOrFail($id);
        return view('pages.admin.data-dokumentasi.edit', [
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
    public function update(DataDokumentasiRequest $request, $id)
    {
        $data = DataDokumentasi::findOrfail($id);

        $name=array();

        $judul = $request->input('judul');

        if ($request->has('name')) {
            if($files=$request->file('name')){
                foreach ($files as $file) {
                    $extension = $file->extension();
                    $imageNames = uniqid('img_', microtime()).'.'.$extension;
                    $filename = explode("|", $data-> name);
                    foreach ($filename as $filena) {
                        Storage::delete('public/images/foto-dokumentasi/'.$filena);
                    }
                    Storage::putFileAs('public/images/foto-dokumentasi', $file, $imageNames);
                    $name[]=$imageNames;   
                    $thumbnailpath = public_path('storage/images/foto-dokumentasi/'.$imageNames);
                    $img = Image::make($thumbnailpath)->resize(2000, 1300)->save($thumbnailpath);     
                }
            }
        }else{
            $namaFile = explode("|", $data-> name);
            $name = $namaFile;
        }
        
        $data->update([
            'name' => implode("|", $name), 'judul' => $judul
        ]);

        return redirect() -> route('data-dokumentasi.index')->with('success2' , 'Data Dokumentasi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DataDokumentasi::findOrFail($id);

        $filename = explode("|", $item-> name);
        foreach ($filename as $filena) {
            Storage::delete('public/images/foto-dokumentasi/'.$filena);
        }
        $item -> delete($id);

        return redirect() -> route('data-dokumentasi.index')->with('success3' , 'Data Dokumentasi Berhasil Dihapus');
    }
}
