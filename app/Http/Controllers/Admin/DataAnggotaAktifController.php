<?php

namespace App\Http\Controllers\Admin;

use App\DataAlumni;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataAnggotaAktifRequest;
use Illuminate\Http\Request;
use App\DataAnggotaAktif;
use App\Kampus;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;

class DataAnggotaAktifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DataAnggotaAktif::paginate(10);

        return view('pages.admin.data-anggota-aktif.index', [
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
        $kampus = Kampus::all();
        return view('pages.admin.data-anggota-aktif.create', [
            'kampus' => $kampus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataAnggotaAktifRequest $request)
    {
        $data = $request -> all();

        $nama2 = $request->get('nama');
        $tempatLahir2 = $request->get('tempat_lahir');
        $tanggalLahir2 = $request->get('tanggal_lahir');
        $check = DataAnggotaAktif::where('nama', '=', $nama2)->where('tempat_lahir', '=', $tempatLahir2)->where('tanggal_lahir', '=', $tanggalLahir2)->first();

        if ($check === null) {
            $file = $request->file('foto');
        
            if ($request->has('foto')) {
                $extension = $file->extension();
                $imageNames = uniqid('img_', microtime()).'.'.$extension;
                Storage::putFileAs('public/images/foto-anggota', $file, $imageNames);
                $thumbnailpath = public_path('storage/images/foto-anggota/'.$imageNames);
                $img = Image::make($thumbnailpath)->resize(280, 320)->save($thumbnailpath);
            }

            DataAnggotaAktif::insert([
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

            return redirect() -> route('data-anggota-aktif.index')->with('success' , 'Data Anggota Aktif Berhasil Ditambah');
        }else{
            return redirect()->back()->withInput()->with('error', 'Data Anda Sudah Ada Sebelumnya');
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
        $item = DataAnggotaAktif::findOrFail($id);
        return view('pages.admin.data-anggota-aktif.show', [
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
        $item = DataAnggotaAktif::findOrFail($id);
        $kampus = Kampus::all();
        return view('pages.admin.data-anggota-aktif.edit', [
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
    public function update(DataAnggotaAktifRequest $request, $id)
    {
        $data = $request -> all();

        $item = DataAnggotaAktif::findOrFail($id);

        $nama = $item-> nama;
        $tempatLahir = $item-> tempat_lahir;
        $tanggalLahir = $item-> tanggal_lahir;
        $nama2 = $request->get('nama');
        $tempatLahir2 = $request->get('tempat_lahir');
        $tanggalLahir2 = $request->get('tanggal_lahir');
        $check = DataAnggotaAktif::where('nama', '=', $nama2)->where('tempat_lahir', '=', $tempatLahir2)->where('tanggal_lahir', '=', $tanggalLahir2)->first();

        if ($check === null || (strtolower($nama) == strtolower($nama2) && strtolower($tempatLahir) == strtolower($tempatLahir2) && strtolower($tanggalLahir) == strtolower($tanggalLahir2))) {
            $imageName = null;
            $filename  = ('public/images/foto-anggota/').$item-> foto;
            $file = $request->file('foto');
    
            if ($request->has('foto')) {
                $extension = $file->extension();
                $imageNames = uniqid('img_', microtime()).'.'.$extension;
                Storage::delete($filename);
                Storage::putFileAs('public/images/foto-anggota', $file, $imageNames);
                $imageName = $imageNames;
                $thumbnailpath = public_path('storage/images/foto-anggota/'.$imageNames);
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
    
            return redirect() -> route('data-anggota-aktif.index')->with('success2' , 'Data Anggota Aktif Berhasil Diubah');
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
        $item = DataAnggotaAktif::findOrFail($id);

        $filename  = ('public/images/foto-anggota/').$item-> foto;
        Storage::delete($filename);

        $item -> delete();

        return redirect() -> route('data-anggota-aktif.index')->with('success4' , 'Data Anggota Aktif Berhasil Dihapus');
    }

    public function move($id) 
    {
        $dataAnggota = DataAnggotaAktif::findOrFail($id);

        $nama = $dataAnggota-> nama;
        $tempat_lahir = $dataAnggota-> tempat_lahir;
        $tanggal_lahir = $dataAnggota-> tanggal_lahir;
        $jenis_kelamin = $dataAnggota-> jenis_kelamin;
        $agama = $dataAnggota-> agama;
        $alamat_asal = $dataAnggota-> alamat_asal;
        $asal_sekolah = $dataAnggota-> asal_sekolah;
        $alamat_bengkulu = $dataAnggota-> alamat_bengkulu;
        $status_tinggal = $dataAnggota-> status_tinggal;
        $asal_kampus = $dataAnggota-> asal_kampus;
        $jurusan = $dataAnggota-> jurusan;
        $angkatan = $dataAnggota-> angkatan;
        $no_hp = $dataAnggota-> no_hp;
        $media_sosial = $dataAnggota-> media_sosial;
        $email = $dataAnggota-> email;
        $foto = $dataAnggota-> foto;
        $a = $dataAnggota-> deleted_at;
        $b = $dataAnggota-> created_at;
        $c = $dataAnggota-> updated_at;
        $dataAnggota->delete();

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
        $dataAlumni->deleted_at = $a;
        $dataAlumni->created_at = $b;
        $dataAlumni->updated_at = $c;
        $dataAlumni->save();

        Storage::move('public/images/foto-anggota/'.$foto  , 'public/images/foto-alumni/'.$foto);

        return redirect() -> route('data-alumni.index')->with('success3' , 'Data Anggota Aktif Berhasil Dipindah Ke Data Alumni');
    }
}
