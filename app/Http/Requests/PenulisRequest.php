<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenulisRequest extends FormRequest
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
            'nama' => ['required', 'min:5', 'max:120'],
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'username' => 'required',
            'password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (strlen($value) < 8 || !preg_match('/[a-zA-Z]/', $value) || !preg_match('/\d/', $value)) {
                        $fail('Password harus memiliki 8 karakter terdiri dari huruf dan angka.');
                    }
                },
            ],
        ];
    }
    public function messages(){
        return [
            'nama.required' => 'Nama harus diisi.',
            'nama.min' => 'Nama harus memiliki setidaknya 5 karakter.',
            'nama.max' => 'Nama tidak boleh lebih dari 120 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi.',
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Password harus memiliki 8 karakter terdiri dari huruf dan angka.',
        ];
    }
}
