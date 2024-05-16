<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsFormRequest;
use App\Models\Setting;
use App\Repository\LogRepository;

class SettingsController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
        view()->share("setting_menu", "active");
    }

    public function show(){
        $this->authorize("update", Setting::class);
        return view("settings");
    }

    public function save(SettingsFormRequest $request){
        $this->authorize("update", Setting::class);
        $data = $request->getData();
        setting($data)->save();
        LogRepository::instance()->create("settings-update", "Settings Updated Successfully!");
        return redirect()->route("settings.show")->with("success","All the Settings Saved");
    }

}
