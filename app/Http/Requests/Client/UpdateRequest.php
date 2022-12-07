<?php

namespace App\Http\Requests\Client;

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
            'name' =>'string|required|max:255',
            'document' =>'required|string|unique:clients,document,'.$this->route('client')->id.'|max:20',
            'address' =>'nullable|string|max:255',
            'phone' =>'string|unique:clients,phone,'.$this->route('client')->id.'|max:10',
            'email' =>'email|string|required|unique:clients,email,'.$this->route('client')->id.'|max:255',   
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.max'=>'Solo se permiten 255 caracteres.',

            'document.required'=>'Este campo es requerido.',
            'document.string'=>'El valor no es correcto.',
            'document.max'=>'Solo se permiten 20 caracteres.',
            'document.unique'=>'Ya se encuentra registrado.',

            'address.string'=>'El valor no es correcto.',
            'address.max'=>'Solo se permiten máximo 255 caracteres.',

            'email.required'=>'Este campo es requerido.',
            'email.email'=>'No es un correo electrónico.',
            'email.string'=>'El valor no es correcto.',
            'email.max'=>'Solo se permiten máximo 255 caracteres.',
            'email.unique'=>'Ya se encuentra registrado.',

            'phone.string'=>'El valor no es correcto.',
            'phone.max'=>'Solo se permiten 10 caracteres.',
            'phone.min'=>'Se requieren 10 caracteres.',
            'phone.unique'=>'Ya se encuentra registrado.',
        ];
    }
}
