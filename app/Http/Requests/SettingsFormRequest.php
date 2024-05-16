<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class SettingsFormRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check();
    }


    public function rules(): array
    {
        return [];
    }

    public function getData(){
        $data = $this->except(["_method", "_token"]);
        if ($this->hasFile('logo')) {
            $logo = basename($this->file('logo')->store(config('system.upload_path')));
            $oldLogo = basename(setting("logo", "logo.png"));
            if($oldLogo !== "logo.png"){
                Storage::delete(config('system.upload_path') . "/" . $oldLogo);
            }
            $data["logo"] = asset("storage/uploads/$logo");;
        }
        if ($this->hasFile('favicon')) {
            $favicon = basename($this->file('favicon')->store(config('system.upload_path')));
            $oldFavicon = basename(setting("favicon", "logo.png"));
            if($oldFavicon !== "logo.png"){
                Storage::delete(config('system.upload_path') . "/" . $oldFavicon);
            }
            $data["favicon"] = asset("storage/uploads/$favicon");
        }
        return $data;
    }

}
