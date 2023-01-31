<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
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
            "title" => "required|min:1|max:255",
            "price" => "required|numeric",
            "sale_date" => "required|date_format:DateTime",
            "description" => "required|string",
            "series" => "boolean"
        ];
    }

    public function messages() {
        return [
            "title.required" => "Il titolo è obbligatorio",
            "title.min" =>  "Il titolo deve avere almeno :min caratteri",
            "title.max" =>  "Il titolo deve avere massimo :max caratteri",
            "price.required" => "Il prezzo è obbligatorio",
            "description.required" => "La descrizione è obbligatorio",
            "sale_date.date_format" => "il format inserito è sbagliato"
        ];
    }
}
