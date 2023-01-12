<?php

namespace App\Http\Controllers;

use App\Models\Gruppen;
use App\Models\Klassen;
use App\Models\Settings;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class BackendController extends Controller
{
    public function createClass(Request $request)
    {
        Klassen::create([
            'klasse' => $request->name
        ]);
        return redirect(route('classes'));
    }
    public function getClasses(){
        $classes = Klassen::all();
        return view('Components.classes', ['classes' => $classes]);
    }
    public function updateClass(Request $request){
        Klassen::latest()->where('id', $request->id)->update(['klasse', $request->name]);
        return redirect(route('classes'));
    }

    public function getSettings(){
        $settings = Settings::latest()->take(1)->get();
        $value = $settings[0]->value;

        return view('Components.settings', ['value' => $value]);
    }

    public function updateSettings(Request $request){
        Settings::latest()->where('settingName', '=', $request->sName)->update(['value'=> $request->value]);
        return redirect(route('settings'));
    }
}
