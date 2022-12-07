<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' =>'required|string|max:255',
            'email' =>'required|email|string|unique:providers,email,'.$this->route('provider')->id.'|max:255',
            'document' =>'required|string|unique:providers,document,'.$this->route('provider')->id.'|max:20',
            'address' =>'nullable|string|max:255',
            'phone' =>'required|string|min:10|unique:providers,phone,'.$this->route('provider')->id.'|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.max'=>'Solo se permiten 255 caracteres.',

            'email.required'=>'Este campo es requerido.',
            'email.email'=>'No es un correo electrónico.',
            'email.string'=>'El valor no es correcto.',
            'email.max'=>'Solo se permiten máximo 200 caracteres.',
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
            'phone.min'=>'Se requiere de 10 caracteres.',
            'phone.unique'=>'Ya se encuentra registrado.',
        ];
    }
}
