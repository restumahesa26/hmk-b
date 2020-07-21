<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DataAnggotaAktifRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required|min:3|max:255',
            'tempat_lahir' => 'required|min:3|max:255',
            'jenis_kelamin' => 'required|max:255',
            'agama' => 'required|min:3|max:255',
            'alamat_asal' => 'required|min:3|max:255',
            'asal_sekolah' => 'required|min:3|max:255',
            'alamat_bengkulu' => 'required|min:3|max:255',
            'status_tinggal' => 'required|min:3|max:255',
            'asal_kampus' => 'required|max:255',
            'jurusan' => 'required|min:3|max:255',
            'angkatan' => 'required|numeric|digits:4',
            'no_hp' => 'required|numeric|digits_between:11,13',
            'media_sosial' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'tanggal_lahir' => 'required|before:now|date',
            'foto' => 'image|mimes:jpeg,png,jpg|max:5048'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Oops.. field nama belum diisi',
            'nama.min' => 'Nama tidak valid',
            'tempat_lahir.required' => 'Oops.. field tempat lahir belum diisi',
            'tempat_lahir.min' => 'Tempat Lahir tidak valid',
            'tanggal_lahir.required' => 'Oops.. field tanggal lahir belum diisi',
            'tanggal_lahir.before' => 'Tanggal lahir tidak valid',
            'agama.required' => 'Oops.. field agama belum diisi',
            'agama.min' => 'Agama tidak valid',
            'alamat_asal.required' => 'Oops.. field alamat asal belum diisi',
            'alamat_asal.min' => 'Alamat Asal tidak valid',
            'asal_sekolah.required' => 'Oops.. field asal sekolah belum diisi',
            'asal_sekolah.min' => 'Asal Sekolah tidak valid',
            'alamat_bengkulu.required' => 'Oops.. field alamat belum diisi',
            'alamat_bengkulu.min' => 'Alamat tidak valid',
            'status_tinggal.required' => 'Oops.. field status tinggal belum diisi',
            'status_tinggal.min' => 'Status Tinggal tidak valid',
            'jurusan.required' => 'Oops.. field jurusan belum diisi',
            'jurusan.min' => 'Jurusan tidak valid',
            'angkatan.required' => 'Oops.. field angkatan belum diisi',
            'angkatan.digits' => 'Angkatan harus diisi 4 digits angka',
            'angkatan.numeric' => 'Field ini harus berupa angka',
            'no_hp.required' => 'Oops.. field No HP belum diisi',
            'no_hp.numeric' => 'No HP harus berupa angka',
            'no_hp.digits_between' => 'Digit angka tidak valid',
            'media_sosial.required' => 'Oops.. field media sosial belum diisi',
            'media_sosial.min' => 'Media Sosial tidak valid',
            'email.required' => 'Oops.. field email belum diisi',
            'email.min' => 'Email tidak valid',
            'email.email' => 'Field harus diisi berupa email',
            'foto.image' => 'File harus berupa gambar', 
            'foto.mimes' => 'Foto harus berformat jpeg, jpg atau png', 
            'foto.max' => 'File harus berukuran kurang dari 5 MB',
            'foto.required' => 'File gambar wajib dilampirkan'
        ];     
    }
}
