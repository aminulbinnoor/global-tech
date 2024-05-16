<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;


class CategoriesFormRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $rules = [  
            'parent_id'=> 'nullable|numeric',          
            'name' => 'required',
        ];
        return $rules;
    }
    

    public function getData()
    {
        $data = $this->except(['_method', '_token']);
        return $data;
    }

}