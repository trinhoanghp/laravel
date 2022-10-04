<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryAddRequest extends FormRequest
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
     * [
    
     * @return array
     */
    public function rules()
    {
        return ['name' => 'required|min:3|max:100|unique:categories,name' ];
    }
    public function messages()
    {
       return [
            'name.required' => 'Không được để trống tên',
            'name.min' => 'Tối thiểu 3 ký tự',
            'name.max' => 'Tối đa 100 ký tự',
            'name.unique' => 'Tên đã được sử dụng',
               
            ];
    }
}
