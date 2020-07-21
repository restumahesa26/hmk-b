<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\RequestDataRequest;
use App\Kampus;
use App\RequestData;
use App\DataAnggotaAktif;
use App\DataAlumni;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = RequestData::all();

        return view('pages.admin.request-data.index', [
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = RequestData::findOrFail($id);
        return view('pages.admin.request-data.show', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = RequestData::findOrFail($id);
        $kampus = Kampus::all();
        return view('pages.admin.request-data.edit', [
            'item' => $item, 'kampus' => $kampus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestDataRequest $request, $id)
    {
        $data = $request -> all();

        $item = RequestData::findOrFail($id);

        $nama2 = $item-> nama;
        $tempatLahir2 = $item-> tempat_lahir;
        $tanggalLahir2 = $item-> tanggal_lahir;

        $nama = $request->get('nama');
        $tempatLahir = $request->get('tempat_lahir');
        $tanggalLahir = $request->get('tanggal_lahir');
        $check = RequestData::where('nama', '=', $nama)->where('tempat_lahir', '=', $tempatLahir)->where('tanggal_lahir', '=', $tanggalLahir)->first();

        if ($check === null || (strtolower($nama) == strtolower($nama2) && strtolower($tempatLahir) == strtolower($tempatLahir2) && strtolower($tanggalLahir) == strtolower($tanggalLahir2))) {
            $imageName = null;
            $filename  = ('public/images/foto-request/').$item-> foto;
            $file = $request->file('foto');
    
            if ($request->has('foto')) {
                $extension = $file->extension();
                $imageNames = uniqid('img_', microtime()).'.'.$extension;
                Storage::delete($filename);
                Storage::putFileAs('public/images/foto-request', $file, $imageNames);
                $imageName = $imageNames;
                $thumbnailpath = public_path('storage/images/foto-request/'.$imageNames);
                $img = Image::make($thumbnailpath)->resize(280, 320)->save($thumbnailpath);
            }else{
                $namaFile = $item-> foto;
                $imageName = $namaFile;
            }
    
            $item -> update([
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
                'foto' => $imageName,
            ]);
    
            return redirect() -> route('request-data.index')->with('success2' , 'Request Data Berhasil Diubah');
        }else{
            return redirect()->back()->withInput()->with('error', 'Data Anda Sudah Ada Sebelumnya');
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
        $item = RequestData::findOrFail($id);

        $filename  = ('public/images/foto-request/').$item-> foto;
        Storage::delete($filename);

        $item -> delete();

        return redirect() -> route('request-data.index')->with('success5' , 'Request Data Ditolak');
    }

    public function moveaktif($id)
    {
        $data = RequestData::findOrFail($id);

        $nama2 = $data-> nama;
        $tempatLahir2 = $data-> tempat_lahir;
        $tanggalLahir2 = $data-> tanggal_lahir;
        $check = DataAnggotaAktif::where('nama', '=', $nama2)->where('tempat_lahir', '=', $tempatLahir2)->where('tanggal_lahir', '=', $tanggalLahir2)->first();

        if ($check === null) {
            $nama = $data-> nama;
            $tempat_lahir = $data-> tempat_lahir;
            $tanggal_lahir = $data-> tanggal_lahir;
            $jenis_kelamin = $data-> jenis_kelamin;
            $agama = $data-> agama;
            $alamat_asal = $data-> alamat_asal;
            $asal_sekolah = $data-> asal_sekolah;
            $alamat_bengkulu = $data-> alamat_bengkulu;
            $status_tinggal = $data-> status_tinggal;
            $asal_kampus = $data-> asal_kampus;
            $jurusan = $data-> jurusan;
            $angkatan = $data-> angkatan;
            $no_hp = $data-> no_hp;
            $media_sosial = $data-> media_sosial;
            $email = $data-> email;
            $foto = $data-> foto;
            $a = $data-> created_at;
            $b = $data-> updated_at;
            $data->delete();
    
            $dataAnggota = new DataAnggotaAktif();
            $dataAnggota->nama = $nama;
            $dataAnggota->tempat_lahir = $tempat_lahir;
            $dataAnggota->tanggal_lahir = $tanggal_lahir;
            $dataAnggota->agama = $agama;
            $dataAnggota->jenis_kelamin = $jenis_kelamin;
            $dataAnggota->alamat_asal = $alamat_asal;
            $dataAnggota->asal_sekolah = $asal_sekolah;
            $dataAnggota->alamat_bengkulu = $alamat_bengkulu;
            $dataAnggota->status_tinggal = $status_tinggal;
            $dataAnggota->asal_kampus = $asal_kampus;
            $dataAnggota->jurusan = $jurusan;
            $dataAnggota->angkatan = $angkatan;
            $dataAnggota->no_hp = $no_hp;
            $dataAnggota->media_sosial = $media_sosial;
            $dataAnggota->email = $email;
            $dataAnggota->foto = $foto;
            $dataAnggota->deleted_at = null;
            $dataAnggota->created_at = $a;
            $dataAnggota->updated_at = $b;
            $dataAnggota->save();
    
            Storage::move('public/images/foto-request/'.$foto  , 'public/images/foto-anggota/'.$foto);
            $filename  = ('public/images/foto-request/').$foto;
            Storage::delete($filename);
    
            return redirect() -> route('request-data.index')->with('success3' , 'Disetujui Sebagai Anggota Aktif');
        }else{
            return redirect()->back()->with('error', 'Data Anda Sudah Ada Sebelumnya');
        }
    }

    public function movealumni($id)
    {
        $data = RequestData::findOrFail($id);

        $nama2 = $data-> nama;
        $tempatLahir2 = $data-> tempat_lahir;
        $tanggalLahir2 = $data-> tanggal_lahir;
        $check = DataAlumni::where('nama', '=', $nama2)->where('tempat_lahir', '=', $tempatLahir2)->where('tanggal_lahir', '=', $tanggalLahir2)->first();

        if ($check === null) {
            $nama = $data-> nama;
            $tempat_lahir = $data-> tempat_lahir;
            $tanggal_lahir = $data-> tanggal_lahir;
            $jenis_kelamin = $data-> jenis_kelamin;
            $agama = $data-> agama;
            $alamat_asal = $data-> alamat_asal;
            $asal_sekolah = $data-> asal_sekolah;
            $alamat_bengkulu = $data-> alamat_bengkulu;
            $status_tinggal = $data-> status_tinggal;
            $asal_kampus = $data-> asal_kampus;
            $jurusan = $data-> jurusan;
            $angkatan = $data-> angkatan;
            $no_hp = $data-> no_hp;
            $media_sosial = $data-> media_sosial;
            $email = $data-> email;
            $foto = $data-> foto;
            $a = $data-> created_at;
            $b = $data-> updated_at;
            $data->delete();
    
            $dataAlumni = new DataAlumni();
            $dataAlumni->nama = $nama;
            $dataAlumni->tempat_lahir = $tempat_lahir;
            $dataAlumni->tanggal_lahir = $tanggal_lahir;
            $dataAlumni->jenis_kelamin = $jenis_kelamin;
            $dataAlumni->agama = $agama;
            $dataAlumni->alamat_asal = $alamat_asal;
            $dataAlumni->asal_sekolah = $asal_sekolah;
            $dataAlumni->alamat_bengkulu = $alamat_bengkulu;
            $dataAlumni->status_tinggal = $status_tinggal;
            $dataAlumni->asal_kampus = $asal_kampus;
            $dataAlumni->jurusan = $jurusan;
            $dataAlumni->angkatan = $angkatan;
            $dataAlumni->no_hp = $no_hp;
            $dataAlumni->media_sosial = $media_sosial;
            $dataAlumni->email = $email;
            $dataAlumni->foto = $foto;
            $dataAlumni->deleted_at = null;
            $dataAlumni->created_at = $a;
            $dataAlumni->updated_at = $b;
            $dataAlumni->save();
    
            Storage::move('public/images/foto-request/'.$foto  , 'public/images/foto-alumni/'.$foto);
            $filename  = ('public/images/foto-request/').$foto;
            Storage::delete($filename);
            
            return redirect() -> route('request-data.index')->with('success4' , 'Disetujui Sebagai Alumni');
        }else{
            return redirect()->back()->with('error', 'Data Anda Sudah Ada Sebelumnya');
        }
    }
}
