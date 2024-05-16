<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class RolesFormRequest extends FormRequest
{

    public function authorize(){
        return auth()->check();
    }

    public function rules(){
        $rules = [
            'title' => ['required'],
            'description' => 'required',
        ];
        $action = $this->route()->getAction()['as'];
        if ($action == 'users.store') {
            $rules["title"][] = "unique:roles,title";
        }else if($action == "users.update"){
            $role = $this->route("role");
            $rules["title"][] = "unique:roles,title,{$role->id}";
        }
        return $rules;
    }
    
    public function getData()
    {
        $data = $this->except(['_method', '_token']);
        return $data;
    }

}