<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class KampusRequest extends FormRequest
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
            'nama_kampus' => 'required|max:255|min:3',
            'image' => 'image|mimes:jpeg,png,jpg|max:5048'
        ];
    }

    public function messages()
    {
        return [
            'nama_kampus.required' => 'Oops.. field nama kampus belum diisi',
            'nama_kampus.min' => 'Nama Kampus tidak valid',
            'image.image' => 'File harus berupa gambar', 
            'image.mimes' => 'Foto harus berformat jpeg, jpg atau png', 
            'image.max' => 'File harus berukuran kurang dari 5 MB'
        ];
    }
}
