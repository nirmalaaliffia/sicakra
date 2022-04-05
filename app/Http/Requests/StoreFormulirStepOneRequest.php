<?php

namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreFormulirStepOneRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $no_telp = preg_replace('/\-*|\++|\\(*|\\)*|\s/', '', $this->no_telp);

        $this->merge([
            'no_telp' => preg_replace('/^0+/', '62', $no_telp),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            'kecamatan' => 'required',
            'jalan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kelurahan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'ktp' => 'required',
            'kk' => 'required',
            'no_telp' => 'required',
            'asal_sekolah' => 'required',
            'nilai_ujian_sekolah' => '',
            'nilai_ipk' => '',
            'nama_universitas' => 'required',
            'no_induk_mahasiswa' => '',
            'tahun_masuk_universitas' => 'required',
            'jenjang' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'semester' => 'required',
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     flash("<strong>Gagal!</strong> Data gagal disimpan. Silakan periksa kembali data anda")->error();

    //     return parent::failedValidation($validator);
    // }
}
