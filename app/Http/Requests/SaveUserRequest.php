<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveUserRequest extends FormRequest
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
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->id)
            ],
            'name' => 'required, min:3',
            'avatar' => 'image',
            'password' => 'required|min:6|max:20',
            'password2' => 'required|min:6|max:20',
            'newpassword' => 'required|min:6|max:20',
            'newpassword2' => 'required|min:6|max:20',
        ];

        if ($this->id == null){
            $requestRule['avatar'] = "required|" . $requestRule['avatar'];
        }

        return $requestRule;
    }

    public function messages()
    {
        return [
            'email.required' => 'Hãy nhập Email',
            'email.unique' => 'Email không được trùng',
            'name.required' => 'Hãy nhập tên',
            'name.min' => 'Nhập tối thiểu 3 ký tự',
            'avatar.required' => 'Hãy nhập ảnh',
            'avatar.image' => 'Nhập sai định dạng, mời nhập ảnh',
            'password.required' => 'Hãy nhập Password',
            'password.min' => 'Nhập tối thiểu 6 ký tự',
            'password.max' => 'Nhập tối đa 20 ký tự',
            'password2.required' => 'Hãy nhập Password',
            'password2.min' => 'Nhập tối thiểu 6 ký tự',
            'password2.max' => 'Nhập tối đa 20 ký tự',
            'newpassword.required' => 'Hãy nhập Password',
            'newpassword.min' => 'Nhập tối thiểu 6 ký tự',
            'newpassword.max' => 'Nhập tối đa 20 ký tự',
            'newpassword2.required' => 'Hãy nhập Password',
            'newpassword2.min' => 'Nhập tối thiểu 6 ký tự',
            'newpassword2.max' => 'Nhập tối đa 20 ký tự'
        ];
    }
}
