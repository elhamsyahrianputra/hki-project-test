<?php

namespace App\Http\Requests\Applicant\Brand;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasRole('applicant');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'address' => 'required',
            'owner' => 'required',
            'logo_url' => 'required|image|file',
            'certificate_url' => "file|mimetypes:application/pdf",
            'signature_url' => 'required|image|file',
        ];
    }

    public function attributes()
    {
        return [
            'user_id' => 'ID Pemohon',
            'name' => 'Nama Merk',
            'address' => 'Alamat Usaha',
            'owner' => 'Nama Pemilik',
            'logo_url' => 'Logo',
            'certificate_url' => 'Surat Keterangan UMK',
            'signature_url' => 'Tanda Tangan Pemohon',
        ];
    }
}
