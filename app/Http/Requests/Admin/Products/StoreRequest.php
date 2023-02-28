<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|min:3|max:128',
            'category_id'=>'required|exists:categories,id',
            'price'=>'required|numeric',
            'thumbnail_url'=>'required|image|',
            'demo_url'=>'required|image|',
            'source_url'=>'required|image|',
            'description'=>'required|min:10|'
        ];
    }
}
