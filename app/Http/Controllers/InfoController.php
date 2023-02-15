<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gruppen;
use App\Models\Klassen;
use App\Models\Lehrer;
use App\Models\Raeume;
use App\Models\Schueler;

use App\Models\Flags;
use App\Models\Settings;

class InfoController extends Controller
{
    public function index($slideIdx = 0)
    {    
        $flag = Flags::all()->where('flagName', 'werbungFlag')->first();
        $flag->isFlagSet = false;
        $flag->save();

        $backToAdDelay = 5000;
        $klassen = Klassen::all()->sortByDesc('klasse');

        if($slideIdx > $klassen->count() - 1)
        {
            $slideIdx = 0;
        }

        return view('info', ['klassen' => $klassen, 'slideIdx' => $slideIdx, 'backToAdDelay' => $backToAdDelay]);
    }
}