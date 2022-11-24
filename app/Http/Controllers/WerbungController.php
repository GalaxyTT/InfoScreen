<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Xdebug2Driver;

class WerbungController extends Controller
{
    public function index(){    
        $dir = "/home/pi/InfoScreen/public/images/";
        //get the list of all files with .jpg extension in the directory and safe it in an array named $images
        
        $images = glob($dir . "*.jpg");
        $idx = 0;
        foreach($images as $image)
        {
            $images[$idx] = str_split($image, 26)[1];
            $idx++;
        }
        return view('werbung', ['images' => $images]);
    }

}
