<?php

namespace App\Http\Requests\Product;

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
            'name' =>'string|required|unique:products,name,'.$this->route('product')->id.'|max:255',
            'image' =>'required|dimensions:min_width=100,min_height=200',
            'sell_price' =>'required',
            'category_id' =>'integer|required|exists:App\Category,id',
            'provider_id' =>'integer|required|exists:App\Provider,id',
        ];
    }

    public function messages()
    {
        return [
            'name.string'=>'El valor no es correcto.',
            'name.required'=>'Este campo es requerido.',
            'name.unique'=>'Este campo es requerido.',
            'name.max'=>'Solo se permiten 50 caracteres.',

            'image.required'=>'Este campo es requerido.',
            'image.dimensions'=>'Solo se permiten imagenes de 100x200 px.',

            'sell_price.required'=>'Este campo es requerido.',

            'category_id.integer'=>'El valor debe ser entero.',
            'category_id.required'=>'Este campo es requerido.',
            'category_id.exists'=>'La categoría no existe.',

            'provider_id.integer'=>'El valor debe ser entero.',
            'provider_id.required'=>'Este campo es requerido.',
            'provider_id.exists'=>'El proveedor no existe.',          
        ];
    }
}
