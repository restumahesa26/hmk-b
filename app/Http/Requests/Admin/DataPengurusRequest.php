<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DataPengurusRequest extends FormRequest
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
            'nama'=>'required|min:3|max:255',
            'posisi'=>'required|min:3|max:255',
            'fotoProfil' => 'image|mimes:jpeg,png,jpg|max:5048'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Oops.. field nama belum diisi', 
            'nama.min' => 'Nama tidak valid',
            'posisi.required' => 'Oops.. field posisi belum diisi', 
            'posisi.min' => 'Posisi tidak valid',
            'fotoProfil.image' => 'File harus berupa gambar', 
            'fotoProfil.mimes' => 'Foto harus berformat jpeg, jpg atau png', 
            'fotoProfil.max' => 'File harus berukuran kurang dari 5 MB'
        ];
    }
}
