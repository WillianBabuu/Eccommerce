<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'payment_method' => 'required',
            'user_id' => 'required',
            'product_id' => 'required',
            'billing_address' => 'required',
            'card_number' => 'required',
        ];
    }

        public function messages()
    {
        return [
            'user_id.required' => 'You Must be logged in',
            'Product_id' => 'Please Choose a product',
        ];
    }
}
