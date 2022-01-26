<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
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
            'nombre'          => 'required|max:100|regex:/[a-zA-ZñÑáéíóúÁÉÍÓÚ]/',
            'fecha_nacimiento'        => 'required',
            'sexo_id'          => 'required',
            'grado_id'     => 'required',
            'observacion' => 'required|max:100|regex:/[a-zA-ZñÑáéíóúÁÉÍÓÚ]/',
        ];
    }


  public function messages(){
    return [
            'nombre'          => 'required|max:100|regex:/[a-zA-ZñÑáéíóúÁÉÍÓÚ]/',
            'fecha_nacimiento' => 'required|before:-18years',
            'sexo_id'          => 'required',
            'grado_id'     => 'required',
            'observacion'         => 'required|max:100|regex:/[a-zA-ZñÑáéíóúÁÉÍÓÚ]/',
        ];
    }
}
