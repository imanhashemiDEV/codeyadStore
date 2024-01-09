<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductGuarantyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_id'=>[
                Rule::unique('product_guaranties', 'product_id')
                    ->where('guaranty_id', $this->input('guaranty_id'))
                    ->where('color_id', $this->input('color_id'))
                    ->where('user_id', auth()->user()->id),
            ]

        ];
    }


    public function messages()
    {
        return [
              'product_id.unique'=>'تنوع قیمت برای این محصول با این گارانتی و رنگ  و فروشنده ثبت شده است'
        ];
    }
}
