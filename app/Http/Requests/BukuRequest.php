<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'judul' => ['required', 'min:5', 'max:120'],
            'kategori' => 'required',
            'jumlah_halaman' => 'required',
            'tahun_terbit' => 'required',
            'penulis_id' => 'required'
            //
        ];
    }

    public function messages(){
        return [
            'judul.required' => 'judul harus diisi.',
            'judul.min' => 'judul harus memiliki setidaknya 5 karakter.',
            'judul.max' => 'Nama tidak boleh lebih dari 120 karakter.',
            'kategori.required' => 'Alamat harus diisi.',
            'jumlah_halaman.required' => 'Tanggal lahir harus diisi.',
            'tahun_terbit.required' => 'Tahun Terbit wajib di isi',
            'penulis_id.required' => 'Penulis wajib di isi'
        ];
    }
}
