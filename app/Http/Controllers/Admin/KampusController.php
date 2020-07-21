<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KampusRequest;
use Illuminate\Http\Request;
use App\Kampus;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class KampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Kampus::all();
        return view('pages.admin.data-kampus.index', [
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
        return view('pages.admin.data-kampus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KampusRequest $request)
    {
        $data = $request -> all();

        $kampus = $request->get('nama_kampus');
        $check = Kampus::where('nama_kampus', '=', $kampus)->first();

        if ($check === null) {
            $file = $request->file('image');

            $extension = $file->extension();
            $imageNames = uniqid('img_', microtime()).'.'.$extension;
            Storage::putFileAs('public/images/gambar-kampus', $file, $imageNames);
            $thumbnailpath = public_path('storage/images/gambar-kampus/'.$imageNames);
            $img = Image::make($thumbnailpath)->resize(2000, 1300)->save($thumbnailpath);
    
            Kampus::insert([
                'nama_kampus' => $data['nama_kampus'],
                'image' => $imageNames,
            ]);
            return redirect() -> route('kampus.index')->with('success' , 'Data Kampus Berhasil Ditambah');
        }else{
            return redirect()->back()->withInput()->with('error', 'Nama Kampus sudah dimasukkan sebelumnya');
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
        $item = Kampus::findOrFail($id);
        return view('pages.admin.data-kampus.edit', [
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
    public function update(KampusRequest $request, $id)
    {
        $data = $request -> all();
        $item = Kampus::findOrFail($id);

        $kampus = $request->get('nama_kampus');
        $kampus2 = $item-> nama_kampus;
        $check = Kampus::where('nama_kampus', '=', $kampus)->first();

        if (strtolower($kampus) == strtolower($kampus2) && $check === null) {
            $imageName = null;
            $filename  = ('public/images/gambar-kampus/').$item-> image;
            $file = $request->file('image');
    
            if ($request->has('image')) {
                $extension = $file->extension();
                $imageNames = uniqid('img_', microtime()).'.'.$extension;
                Storage::delete($filename);
                Storage::putFileAs('public/images/gambar-kampus', $file, $imageNames);
                $imageName = $imageNames;
                $thumbnailpath = public_path('storage/images/gambar-kampus/'.$imageNames);
                $img = Image::make($thumbnailpath)->resize(2000, 1300)->save($thumbnailpath);
            }else{
                $namaFile = $item-> image;
                $imageName = $namaFile;
            }
    
            $item->update([
                'nama_kampus' => $data['nama_kampus'],
                'image' => $imageName,
            ]); 
            
            return redirect() -> route('kampus.index')->with('success2' , 'Data Kampus Berhasil Diubah');
        }else{
            return redirect()->back()->withInput()->with('error', 'Nama Kampus sudah dimasukkan sebelumnya');
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
        $item = Kampus::findOrFail($id);

        $filename  = ('public/images/gambar-kampus/').$item-> image;
        Storage::delete($filename);

        $item -> delete();

        return redirect() -> route('kampus.index')->with('success3' , 'Data Kampus Berhasil Dihapus'); 
    }
}
