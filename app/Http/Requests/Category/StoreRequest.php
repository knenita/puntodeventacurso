<?php

namespace App\Http\Requests\Category;

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
            'name' =>'required|string|max:50|unique:categories',
            'description' =>'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.max'=>'Solo se permiten 50 caracteres.',
            'name.unique'=>'Este campo es requerido.',
            'description.string'=>'El valor no es correcto.',
            'description.max'=>'Solo se permiten 255 caracteres.',
        ];
    }
}
