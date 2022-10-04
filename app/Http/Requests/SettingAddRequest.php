<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'key' => 'required|min:3|max:200|unique:settings',
            'value' => 'required',
           
        ];
    }
    public function messages()
    {
       return [
                'key.required' => 'Không được để trống Key',
                'key.unique' => 'Đã tồn tại key này',
                'key.min' => 'Tối thiểu 3 ký tự',
                'key.max' => 'Tối đa 200 ký tự',
                'value.required' => 'Không được để trống value',
            ];
    }
}
