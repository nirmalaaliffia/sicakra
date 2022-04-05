<?php

namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreFormulirStepThreeRequest extends FormRequest
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
      
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kepemilikanRumah' => 'required',
            'tanggunganAnak' => 'required',
            'platNomorMotor' => '',
            'tahunPembuatanMotor' => '',
            'merkMotor' => '',
            'platNomorMobil' => '',
            'tahunPembuatanMobil' => '',
            'merkMobil' => '',
        ];

        
        
    }

    public function messages()
    {
    return [
        'kepemilikanRumah.required' => 'Kepemilikan rumah harus diisi salah satu',
        'tanggunganAnak.required' => 'Tanggungan anak harus diisi salah satu',
    ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     flash("<strong>Gagal!</strong> Data gagal disimpan. Silakan periksa kembali data anda")->error();

    //     return parent::failedValidation($validator);
    // }
}
