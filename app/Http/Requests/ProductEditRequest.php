<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
     
            'name' => 'required|min:6|max:200|',
            'content' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'required|numeric|lt:price',
            'category_id' => 'required',
            'attr' => 'required'

        ];
        
    }
    public function messages()
    {
       return [
                'name.required' => 'Không được để trống tên',
                'name.min' => 'Tối thiểu 6 ký tự',
                'name.max' => 'Tối đã 200 ký tự',
                'name.unique' => 'Tên đã được sử dụng',
                'content.required' => 'Không được để trống mô tả',
                'price.required' => 'Không được để trống giá',
                'price.numeric' => 'Chỉ được nhập số',
                'sale_price.required' => 'Không được để trống giá',
                'sale_price.numeric' => 'Chỉ được nhập số',
                'sale_price.lt:price' => 'giá khuyến mại phải nhỏ hơn giá',
                'image_detail.required' => 'Không được để trống ảnh',
                'image_detail.mimes' => 'Hãy chọn ảnh đuôi jpg, png',
                'category_id.required' => 'Chọn danh mục',
                'attr.required' => 'Chọn thuộc tính sản phẩm',
    
            ];
    }
}
