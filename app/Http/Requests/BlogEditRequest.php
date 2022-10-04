<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogEditRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:200|',
            'content' => 'required',

        ];
        
    }
    public function messages()
    {
       return [
                'name.required' => 'Không được để trống tên',
                'name.min' => 'Tối thiểu 6 ký tự',
                'name.max' => 'Tối đa 200 ký tự',
                'content.required' => 'Không được để trống mô tả',
    
            ];
    }
}
