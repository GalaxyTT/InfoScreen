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

use Carbon\Carbon;

class InfoController extends Controller
{
    public function index($slideIdx = 0)
    {    
        $flag = Flags::all()->where('flagName', 'werbungFlag')->first();
        $flag->isFlagSet = false;
        $flag->save();

        $backToAdDelay = 5000;

        $groups = Gruppen::all();
        $klassen = Klassen::all()->sortByDesc('klasse');
        
        $today = Carbon::now()->toDateString();
        $frontendGroups = array();
        foreach($groups as $group)
        {
            $json = json_decode($group->json);
            foreach($json->dates as $date)
            {
                if($date->date == $today)
                {
                    $name = $group->name;
                    $class = $group->getClass();
                    
                    $teacher = Lehrer::where('id',$date->dayInfo->teacher)->first();
                    $room = Raeume::where('id', $date->dayInfo->room)->first();
                    
                    array_push($frontendGroups, array("name" => $name, 
                                                    "class" => $class, 
                                                    "students" => $group->getStudents(), 
                                                    "teacher" => $teacher,
                                                    "room" => $room,
                                                    "exercise" => $date->dayInfo->exercise));
                }
            }   
        }

        if($slideIdx > $klassen->count() - 1)
        {
            $slideIdx = 0;
        }

        return view('info', ['klassen' => $klassen, 'frontendGroups' => $frontendGroups, 'date' => $today,'slideIdx' => $slideIdx, 'backToAdDelay' => $backToAdDelay]);
    }


}