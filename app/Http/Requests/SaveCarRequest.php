<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveCarRequest extends FormRequest
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
            'plate_number' => [
                'required',
                Rule::unique('cars')->ignore($this->id)
            ],
            'plate_image' => 'image',
            'owner' => 'required|min:3',
            'travel_fee' => 'required|numeric|gt:0'
        ];

        if ($this->id == null){
            $requestRule['plate_image'] = "required|" . $requestRule['plate_image'];
        }

        return $requestRule;
    }

    public function messages()
    {
        return [
            'plate_number.required' => 'Hãy nhập biển số xe',
            'plate_number.unique' => 'Biển số xe không được trùng',
            'plate_image.required' => 'Hãy nhập ảnh',
            'plate_image.image' => 'Nhập sai định dạng, mời nhập ảnh',
            'owner.required' => 'Nhập chủ sở hữu',
            'owner.min' => 'Nhập tối thiểu 3 ký tự',
            'travel_fee.required' => 'Hãy điền giá',
            'travel_fee.numeric' => 'Nhập sai định dạng giá, mời nhập số',
            'travel_fee.gt' => 'Mời nhập phí lớn hơn 0'
        ];
    }
}
