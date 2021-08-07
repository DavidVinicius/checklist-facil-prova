<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CakeCreationRequest extends FormRequest
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
            "cake.name" => "required|max:255",
            "cake.weight" => "required|numeric",
            "cake.value" => "required|numeric",
            "cake.quantity" => "required|numeric",
        ];
    }
}
