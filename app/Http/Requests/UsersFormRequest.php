<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;


class UsersFormRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $rules = [
            'first_name' => 'required|string',
            'image' => [],
            'last_name' => 'required|string',
            'email' => ['required', 'string'],
            'password' => 'required',
            'role_id' => 'required',
            'status' => 'required',
        ];

        $user = $this->route("user", false);
        if ($user) {
            $rules["email"][] = "unique:users,email,{$user->id}";
            //validation rules for image if it exists
            if ($this->hasFile("image")) {
                $rules['image'] = [ "required" , File::image()->max(1024) ];
            }
        }else{
            $rules['image'] = [ "required" , File::image()->max(1024) ];
            $rules["email"][] = "unique:users,email";
        }
        return $rules;
    }
    

    public function getData(): array
    {
        $data = $this->except(["_token", "_method", "image"]);
        if ($this->hasFile('image')) {
            $data['image'] = basename($this->file('image')->store(config('system.upload_path')));
        }
        $data["password"] = encrypt($data["password"]);
        return $data;
    }

}