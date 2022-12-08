<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' =>'required|string|max:255|unique:providers',
            'email' =>'required|email|string|max:255|unique:providers',
            'document' =>'required|string|max:20|unique:providers',
            'address' =>'nullable|string|max:255',
            'phone' =>'required|string|max:10|min:10|unique:providers',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.max'=>'Solo se permiten 255 caracteres.',
            'name.unique'=>'Este campo es requerido.',

            'email.required'=>'Este campo es requerido.',
            'email.email'=>'No es un correo electrónico.',
            'email.string'=>'El valor no es correcto.',
            'email.max'=>'Solo se permiten máximo 255 caracteres.',
            'email.unique'=>'Ya se encuentra registrado.',

            'document.required'=>'Este campo es requerido.',
            'document.string'=>'El valor no es correcto.',
            'document.max'=>'Solo se permiten 20 caracteres.',
            'document.unique'=>'Ya se encuentra registrado.',

            'address.string'=>'El valor no es correcto.',
            'address.max'=>'Solo se permiten máximo 255 caracteres.',

            'phone.required'=>'Este campo es requerido.',
            'phone.string'=>'El valor no es correcto.',
            'phone.max'=>'Solo se permiten 10 caracteres.',
            'phone.min'=>'Se requieren 10 caracteres.',
            'phone.unique'=>'Ya se encuentra registrado.',

        ];
    }
}
