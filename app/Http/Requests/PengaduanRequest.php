<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengaduanRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_pengadu' => 'required',
            'email_pengadu' => 'required|email',
            'no_hp_pengadu' => 'required|numeric',
            'judul_pengaduan' => 'required',
            'isi_pengaduan' => 'required',
            'photo_pengaduan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ];
    }
}
