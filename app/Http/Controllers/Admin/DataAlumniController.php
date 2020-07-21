<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataAlumniRequest;
use Illuminate\Http\Request;
use App\DataAnggotaAktif;
use App\DataAlumni;
use App\Kampus;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class DataAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DataAlumni::paginate(10);

        return view('pages.admin.data-alumni.index', [
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
        return view('pages.admin.data-alumni.create', [
            'kampus' => $kampus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataAlumniRequest $request)
    {
        $data = $request -> all();

        $nama2 = $request->get('nama');
        $tempatLahir2 = $request->get('tempat_lahir');
        $tanggalLahir2 = $request->get('tanggal_lahir');
        $check = DataAlumni::where('nama', '=', $nama2)->where('tempat_lahir', '=', $tempatLahir2)->where('tanggal_lahir', '=', $tanggalLahir2)->first();

        if ($check === null) {
            $file = $request->file('foto');

            $extension = $file->extension();
            $imageNames = uniqid('img_', microtime()).'.'.$extension;
            Storage::putFileAs('public/images/foto-alumni', $file, $imageNames);
            $thumbnailpath = public_path('storage/images/foto-alumni/'.$imageNames);
            $img = Image::make($thumbnailpath)->resize(280, 320)->save($thumbnailpath);
    
            DataAlumni::insert([
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
    
            return redirect() -> route('data-alumni.index')->with('success' , 'Data Alumni Berhasil Ditambah');            
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
        $item = DataAlumni::findOrFail($id);
        return view('pages.admin.data-alumni.show', [
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
        $item = DataAlumni::findOrFail($id);
        $kampus = Kampus::all();

        return view('pages.admin.data-alumni.edit', [
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
    public function update(DataAlumniRequest $request, $id)
    {
        $data = $request -> all();

        $item = DataAlumni::findOrFail($id);

        $nama = $item-> nama;
        $tempatLahir = $item-> tempat_lahir;
        $tanggalLahir = $item-> tanggal_lahir;
        $nama2 = $request->get('nama');
        $tempatLahir2 = $request->get('tempat_lahir');
        $tanggalLahir2 = $request->get('tanggal_lahir');
        $check = DataAlumni::where('nama', '=', $nama2)->where('tempat_lahir', '=', $tempatLahir2)->where('tanggal_lahir', '=', $tanggalLahir2)->first();

        if ($check === null || (strtolower($nama) == strtolower($nama2) && strtolower($tempatLahir) == strtolower($tempatLahir2) && strtolower($tanggalLahir) == strtolower($tanggalLahir2))) {
            $imageName = null;
            $filename  = ('public/images/foto-alumni/').$item-> foto;
            $file = $request->file('foto');
    
            if ($request->has('foto')) {
                $extension = $file->extension();
                $imageNames = uniqid('img_', microtime()).'.'.$extension;
                Storage::delete($filename);
                Storage::putFileAs('public/images/foto-alumni', $file, $imageNames);
                $imageName = $imageNames;
                $thumbnailpath = public_path('storage/images/foto-alumni/'.$imageNames);
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
    
            return redirect() -> route('data-alumni.index')->with('success2' , 'Data Alumni Berhasil Diubah');            
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
        $item = DataAlumni::findOrFail($id);

        $filename  = ('public/images/foto-alumni/').$item-> foto;
        Storage::delete($filename);

        $item -> delete();

        return redirect() -> route('data-alumni.index')->with('success4' , 'Data Alumni Berhasil Dihapus');
    }

    public function move($id)
    {
        $dataAlumni = DataAlumni::findOrFail($id);

        $nama = $dataAlumni-> nama;
        $tempat_lahir = $dataAlumni-> tempat_lahir;
        $tanggal_lahir = $dataAlumni-> tanggal_lahir;
        $jenis_kelamin = $dataAlumni-> jenis_kelamin;
        $agama = $dataAlumni-> agama;
        $alamat_asal = $dataAlumni-> alamat_asal;
        $asal_sekolah = $dataAlumni-> asal_sekolah;
        $alamat_bengkulu = $dataAlumni-> alamat_bengkulu;
        $status_tinggal = $dataAlumni-> status_tinggal;
        $asal_kampus = $dataAlumni-> asal_kampus;
        $jurusan = $dataAlumni-> jurusan;
        $angkatan = $dataAlumni-> angkatan;
        $no_hp = $dataAlumni-> no_hp;
        $media_sosial = $dataAlumni-> media_sosial;
        $email = $dataAlumni-> email;
        $foto = $dataAlumni-> foto;
        $a = $dataAlumni-> deleted_at;
        $b = $dataAlumni-> created_at;
        $c = $dataAlumni-> updated_at;
        $dataAlumni->delete();

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
        $dataAnggota->deleted_at = $a;
        $dataAnggota->created_at = $b;
        $dataAnggota->updated_at = $c;
        $dataAnggota->save();

        Storage::move('public/images/foto-alumni/'.$foto  , 'public/images/foto-anggota/'.$foto);

        return redirect() -> route('data-anggota-aktif.index')->with('success3' , 'Data Alumni Berhasil Dikembalikan');
    }
}
