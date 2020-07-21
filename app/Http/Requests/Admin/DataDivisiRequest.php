<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DataDivisiRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'deskripsi' => 'required|min:3|max:255', 
            'namaKetua' => 'required|min:3|max:255', 
            'anggota.*' => 'required|min:3|max:255',
            'proker.*' => 'required|min:3|max:255', 
            'foto' => 'image|mimes:jpeg,png,jpg|max:5048',
            'icon' => 'image|mimes:jpeg,png,jpg|max:3048'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Oops.. field title belum diisi',
            'title.min' => 'Title tidak valid',
            'deskripsi.required' => 'Oops.. field deskripsi belum diisi',
            'deskripsi.min' => 'Deskripsi tidak valid',
            'namaKetua.required' => 'Oops.. field nama ketua belum diisi',
            'namaKetua.min' => 'Nama Ketua tidak valid',
            'anggota.*.required' => 'Oops.. field anggota belum diisi',
            'anggota.*.min' => 'Nama Anggota tidak valid', 
            'proker.*.required' => 'Oops.. field program kerja belum diisi',
            'proker.*.min' => 'Program Kerja tidak valid',
            'foto.image' => 'File harus berupa gambar', 
            'foto.mimes' => 'Foto harus berformat jpeg, jpg atau png', 
            'foto.max' => 'File harus berukuran kurang dari 5 MB',
            'icon.image' => 'File harus berupa gambar', 
            'icon.mimes' => 'Icon harus berformat jpeg, jpg atau png', 
            'icon.max' => 'File harus berukuran kurang dari 3 MB'
        ];
    }
}
