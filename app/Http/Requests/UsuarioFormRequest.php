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
            'nombre' =>'required',
            'email' =>'required|email',
            'direccion' =>'required|min:3|max:100',
            'cbo_pais' => 'required|integer|not_in:0',
            'cbo_estado' => 'required|integer|not_in:0',
            'cbo_ciudad' => 'required|integer|not_in:0',
            'zip' =>'required|min:3|max:5'];

    }
 
}

//,'fechaNacimiento' => 'required|date|date_format:m/d/Y'
//    'usua_email' =>'required|email:255|unique:usuarios'
            //