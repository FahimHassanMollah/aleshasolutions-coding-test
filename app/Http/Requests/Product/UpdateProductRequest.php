<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'          => 'required|max:50',
            'description'   => 'required',
            'price'         => 'required|min:0.01',
            'image'         => 'nullable|array',
            'image.*'       => 'image',
            'status'        => 'nullable|in:0,1',
            'category_id'   => 'nullable|array',
        ];
    }
}
