<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveProductRequest extends FormRequest
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
        $requestRule = [
            // 'name' => 'required|unique:App\Models\Product,name',
            // 'name' => 'required|unique:products',
            'name' => [
                'required',
                Rule::unique('products')->ignore($this->id)
            ],
            'image' => 'image',
            // 'image' => 'mimes:jpg,jpeg,png,gif',
            'quantity' => 'nullable|integer|gt:0',
            'price' => 'required|numeric|min:0'
        ];

        if ($this->id == null){
            $requestRule['image'] = "required|" . $requestRule['image'];
        }

        return $requestRule;
    }

    public function messages()
    {
        return [
            'name.required' => 'Hãy nhập tên',
            'name.unique' => 'Tên không được trùng',
            'image.required' => 'Hãy nhập ảnh',
            'image.image' => 'Nhập sai định dạng, mời nhập ảnh',
            'quantity.integer' => 'Nhập sai định dạng số lượng, mời nhập số',
            'quantity.gt' => 'Mời nhập số dương',
            'price.required' => 'Hãy điền giá',
            'price.numeric' => 'Nhập sai định dạng giá, mời nhập số',
            'price.min' => 'Giá không được âm'
        ];
    }
}
