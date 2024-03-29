<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookFormRequest extends FormRequest
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
            'title' => 'required|max:255',
            'authors' => 'required|max:255',
            'released_at' => 'required|before:now',
            'pages' => 'required|gte:1',
            'isbn' => 'required',
            // 'isbn' => [
            //     'required',
            //     'unique:books',
            //     'regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i',
            //     Rule::unique('isbn')->ignore($this->title)
            //     ->ignore($this->authors)->ignore($this->released_at)
            //     ->ignore($this->pages)->ignore($this->description)
            //     ->ignore($this->genres)->ignore($this->in_stock)
            // ],
            'description' => 'nullable',
            'genres' => 'required',
            'in_stock' => 'required|gte:0'
        ];
    }
}
