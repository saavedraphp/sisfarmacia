<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
            'nombre' =>'required|min:3',
            'email' =>'required|email',
            'direccion' =>'required|min:3|max:100',
            'cbo_pais' => 'required|integer|not_in:0',
            'cbo_estado' => 'required|integer|not_in:0',
            'cbo_ciudad' => 'required|integer|not_in:0',
            'zip' =>'required|min:3|max:5'];

    }

    public function messages()
    {
        return
        [
        "nombre" => "El Nombre tiene que tener almenos :min Caracteres.",
        "email.min" => "El Correo tiene que tener almenos :min Caracteres.",
        "direccion.required" => "Ingrese alguna direccion"
        ];
    }
 
}
 