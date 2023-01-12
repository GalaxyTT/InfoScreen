<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Xdebug2Driver;
use App\Models\Flags;
use App\Models\Settings;

use App\Models\Gruppen;
use App\Models\Klassen;
use App\Models\Lehrer;
use App\Models\Raeume;
use App\Models\Schueler;


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
            $schueler = new Schueler;
            $schueler->nachname = "";
            $schueler->vorname = "";
            $schueler->nachname = "";
            $schueler->nachname = "";
            
            




            $klassen = Klassen::all();
            $lehrer = Lehrer::all();
            $raeume = Raeume::all();
            
            $gruppen = Gruppen::all();
            $schueler = Schueler::all();

            dump($gruppen);
            dump($klassen);
            dump($lehrer);
            dump($raeume);
            dump($schueler);

            return view('info');
        }

    }
}