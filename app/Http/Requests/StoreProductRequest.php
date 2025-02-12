<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'price'=>'required',
            'image'=>'required',
            'detail'=>'required',
            'qty'=>'required'
        ];
    }
    public function messages():array{
        return [
            'name.required'=>'Tên sản phẩm không được để trống',
            'price.required'=>'Nhập giá',
            'image.required'=>'Sản phẩm phải có hình ảnh',
            'detail.required'=>'Vui lòng nhập chi tiết sản phẩm',
            'qty.required'=>'Vui lòng nhập số lượng'
        ];
    }
}
