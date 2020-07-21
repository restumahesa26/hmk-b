<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DataDokumentasiRequest extends FormRequest
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
            'judul' => 'required|min:3|max:255',
            'name.*' => 'image|mimes:jpeg,png,jpg|max:5038'
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Oops.. field judul belum diisi',
            'judul.min' => 'Judul tidak valid', 
            'name.*.image' => 'File harus berupa gambar',
            'name.*.mimes' => 'File harus berformat jpeg, jpg, atau png',
            'name.*.max' => 'Ukuran file harus kurang dari 5 Mb'
        ];
    }
}
