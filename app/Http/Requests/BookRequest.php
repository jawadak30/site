<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'kategori_id'   => 'required',
            'judul'         => 'required',
            'jumlah'        => 'required',
            'status'        => 'required',
            'cover'         => 'required|image|file|mimes:png,jpg,jpeg,webp|max:2024',
            'deskripsi'     => 'required',
            'publish_date'  => 'required'
        ];
    }
}
