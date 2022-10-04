<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryEditRequest extends FormRequest
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
        // return ['name' => 'required|min:3|max:100|unique:categories,name,' .request()->id ];
        return [
            'name' => 'required|min:3|max:200|unique:categories,name,' .request()->id 

        ];
    }
    public function messages()
    {
       return [
            'name.required' => 'Không được để trống tên',
            'name.min' => 'Tối thiểu 3 ký tự',
            'name.max' => 'Tối đa 100 ký tự',
            'name.unique' => 'Đã tồn tại danh mục !!!',
               
            ];
    }
}
