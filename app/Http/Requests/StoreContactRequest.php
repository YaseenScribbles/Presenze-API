<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'shop_name' => 'required|unique:contacts,shop_name',
            'contact_name' => 'required|string',
            'city' => 'required|string',
            'zipcode' => 'string|min:6|max:6',
            'state' => 'string',
            'district' => 'string',
            'phone' => 'string',
            'email' => 'email|unique:contacts,email',
            'user_id' => 'integer|exists:users,id'
        ];
    }
}
