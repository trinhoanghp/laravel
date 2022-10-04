<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SliderEditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
        
            'name' => 'required|min:6|max:200|unique:sliders,name,'.request()->id ,
            'description' => 'required',
          

        ];
    }
    public function messages()
    {
       return [
                'name.required' => 'Không được để trống tên' ,
                'name.unique' => 'Đã tồn tại ',
                'name.min' => 'Tối thiểu 6 ký tự',
                'name.max' => 'Tối đã 200 ký tự',
                'description.required' => 'Không được để trống mô tả',
               
            ];
    }
}
