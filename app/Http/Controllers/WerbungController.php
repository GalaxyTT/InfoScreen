<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Xdebug2Driver;
use App\Models\Flags;
use App\Models\Klassen;

class WerbungController extends Controller
{
    public function index($slideIndex = 0)
    {    
        $flag = Flags::all()->where('flagName', 'werbungFlag')->first();
        $dir = "/home/pi/InfoScreen/public/images/";
        $supportedFormats = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "webp", "WEBP");
        //get the list of all files with .jpg extension in the directory and safe it in an array named $images
        $images = array();
        foreach($supportedFormats as $format)
        {
            $images = array_merge($images, glob($dir . "*.$format"));
        }

        $idx = 0;
        foreach($images as $image)
        {
            $images[$idx] = str_split($image, 26)[1];
            $idx++;
        }

        $klassen = Klassen::all();

        return view('werbung', ['flag' => $flag->isFlagSet,
                                'image' => $images[$slideIndex], 
                                'slideIndex' => $slideIndex, 
                                'len' => count($images),
                                'klassen' => $klassen]);
    }
}