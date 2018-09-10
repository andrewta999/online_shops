<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name'=>'unique:vp_product,name,'.$this->segment(4).',pro_id',
            'price'=>'max:10',
            'img'=>'image',
        ];
    }

    public function messages()
    {
        return [
            'name.unique'=>'Duplicate name',
            'price.max'=>'Price is too high',
            'img.image'=>'Not applicable file extension',
        ];
    }
}
