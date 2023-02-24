<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequset extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|unique|min:3|max:128',
            'category_id'=>'required|exist:categories,id',
            'price'=>'required|numeric|min:3|max:128',
            'thumbnail_url'=>'required|image',
            'demo_url'=>'required|image',
            'source_url'=>'required|image',
            'description'=>'required|min:10'
        ];
    }
}
