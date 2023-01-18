<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Xdebug2Driver;
use App\Models\Flags;
use App\Models\Settings;


class WerbungController extends Controller
{
    public function index()
    {    
        $flag = Flags::all()->where('flagName', 'werbungFlag')->first();
        
        if(!$flag->isFlagSet) 
        {
            $slideShowDelay = Settings::where('settingName', 'duration')->first()->value;
            $animTime = strval($slideShowDelay/1000) . "s";

            $dir = "/home/pi/InfoScreen/public/images/";
            $supportedFormats = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "webp", "WEBP");
            $images = array();
            foreach($supportedFormats as $format)
            {
                $images = array_merge($images, glob($dir . "*.$format"));
            }

            $idx = 0;
            foreach($images as $image)
            {
                $images[$idx] = explode("public", $image)[1];
                $idx++;
            }


            return view('werbung', ['images' => $images, 'slideShowDelay' => $slideShowDelay, 'animTime' => $animTime]);
        }
        else 
        {
            return redirect(route('info'));
        }

    }
}