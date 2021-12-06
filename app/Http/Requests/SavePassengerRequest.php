<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SavePassengerRequest extends FormRequest
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
            'name' => 'required|min:3',
            'travel_time' => 'required',
            'avatar' => 'image'
        ];

        if ($this->id == null){
            $requestRule['avatar'] = "required|" . $requestRule['avatar'];
        }

        return $requestRule;
    }

    public function messages()
    {
        return [
            'name.required' => 'Hãy nhập tên',
            'name.min' => 'Hãy nhập tên ít nhất 3 ký tự',
            'travel_time.required' => 'Hãy chọn thời gian',
            'avatar.required' => 'Hãy nhập ảnh',
            'avatar.image' => 'Nhập sai định dạng, mời nhập ảnh'
        ];
    }
}
