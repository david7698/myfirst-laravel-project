<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'page_number' => 'required',
        ];
    }


    public function messages(){

        return [
            'title.required' => 'devi mettere un titolo !!',
            'description.required' => 'devi mettere una descrizione !!',
            'page_number.required' => 'devi mettere un numero !!',
        ];


    }
    
}
