<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
     
            'name' => 'required|min:6|max:200|unique:sliders',
            'description' => 'required',
            'upload' => 'required',

        ];
    }
    public function messages()
    {
       return [
                'name.required' => 'Không được để trống tên',
                'name.min' => 'Tối thiểu 6 ký tự',
                'name.max' => 'Tối đã 200 ký tự',
                'name.unique' => 'Tên đã được sử dụng',
                'description.required' => 'Không được để trống mô tả',
                'upload.required' => 'Không được để trống ảnh',
             
            ];
    }
}
