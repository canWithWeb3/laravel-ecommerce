<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if($this->isMethod('POST')){
            return [
                "image" => "bail|required|mimes:jpg,jpeg,png|max:255",
                "name" => "bail|required|min:5|max:55",
                "price" => "bail|required",
                "categories" => "bail|required|array|min:1|max:3"
            ];
        }else if($this->isMethod('PATCH')){
            return [
                //
            ];
        }
    }
}
