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
    public function index()
    {    
        $flag = Flags::all()->where('flagName', 'werbungFlag')->first();
        
        if(!$flag->isFlagSet) 
        {
            return redirect(route('werbung'));
        }
        else 
        {
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
