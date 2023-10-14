<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PDO;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'unique:products', 'max:100'],
            'price' =>['required', 'numeric', 'integer', 'min:0'],
            'category' => ['required', 'exists:categories,id'],
            'description' => ['required'],
            'image' => ['required_unless:anotherfield,value']
        ];
    }

    // sửa câu thông báo
    public function messages(){
        return [
            'name.required' => "Product's Name doesn't exist!",
            'name.unique' => "Product's name is already exists!",
            'name.max' => "Product's name can not bemore than 100 characters!",

            'price.required' => "Product's price doesn't exist!",
            'description.required' => "Description's price doesn't exist!",
            'category.required' => "Category doesn't exist!",
            'image. required' => "Image doesn't exist!"
        ];
    }
}
