<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CakeUpdateRequest extends FormRequest
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
            "cake.name" => "max:255",
            "cake.weight" => "numeric",
            "cake.value" => "numeric",
            "cake.quantity" => "numeric",
        ];
    }
}
