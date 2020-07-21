<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\RequestDataRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\RequestData;

class KirimDataController extends Controller
{
    public function store(RequestDataRequest $request)
    {
        $data = $request-> all();

        $nama = $request->get('nama');
        $tempatLahir = $request->get('tempat_lahir');
        $tanggalLahir = $request->get('tanggal_lahir');
        $check = RequestData::where('nama', '=', $nama)->where('tempat_lahir', '=', $tempatLahir)->where('tanggal_lahir', '=', $tanggalLahir)->first();

        if ($check === null) {
            $file = $request->file('foto');

            $extension = $file->extension();
            $imageNames = uniqid('img_', microtime()).'.'.$extension;
            Storage::putFileAs('public/images/foto-request', $file, $imageNames);
            $thumbnailpath = public_path('storage/images/foto-request/'.$imageNames);
            $img = Image::make($thumbnailpath)->resize(280, 320)->save($thumbnailpath);
    
            RequestData::insert([
                'nama' => $data['nama'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'agama' => $data['agama'],
                'alamat_asal' => $data['alamat_asal'],
                'asal_sekolah' => $data['asal_sekolah'],
                'alamat_bengkulu' => $data['alamat_bengkulu'],
                'status_tinggal' => $data['status_tinggal'],
                'asal_kampus' => $data['asal_kampus'],
                'jurusan' => $data['jurusan'],
                'angkatan' => $data['angkatan'],
                'no_hp' => $data['no_hp'],
                'media_sosial' => $data['media_sosial'],
                'email' => $data['email'],
                'foto' => $imageNames,
            ]);
            
            return redirect()->back()->with('success' , 'Berhasil Mengirim Data');         
        }else{
            return redirect()->back()->withInput()->with('error', 'Data Anda Sudah Terkirim Sebelumnya');
        }
    }
}
