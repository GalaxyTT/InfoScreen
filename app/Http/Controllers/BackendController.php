<?php

namespace App\Http\Controllers;

use App\Models\Gruppen;
use App\Models\Klassen;
use App\Models\Lehrer;
use App\Models\Raeume;
use App\Models\Schueler;
use App\Models\Settings;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class BackendController extends Controller
{
    public function index()
    {
        return view('backend');
    }
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

    public function getStudents(){
        $students = Schueler::all();
        $groups = Gruppen::all();
        $classes = Klassen::all();
        return view('Components.schueler', ['students' => $students, 'groups' => $groups, 'classes' => $classes]);

    }
    public function createStudent(){
        $classes = Klassen::all();
        return view('createStudent', ['classes' => $classes]);
    }
    public function saveStudent(Request $rq)
    {
        if($rq->id == -1)
        {
            Schueler::create([
                'nachname' => $rq->nachname,
                'vorname' => $rq->vorname,
                'klassen_id' => $rq->klassen_id,
                'gruppen_id' => $rq->gruppen_id
            ]);
        }
        else{
            $studentToUpdate = Schueler::where('id', $rq->id)->get();
            $studentToUpdate->nachname = $rq->nachname;
            $studentToUpdate->vorname = $rq->vorname;
            $studentToUpdate->klassen_id = $rq->klassen_id;
            $studentToUpdate->gruppen_id = $rq->gruppen_id;
            $studentToUpdate->save();
        }
    }
    public function getGroups(){
        $teachers = Lehrer::all();
        $rooms = Raeume::all();
        $groups = Gruppen::all();
        return view('Components.groups', ['groups' => $groups, 'teachers' => $teachers, 'rooms' => $rooms]);
    }
    public function createGroup(){

    }
    public function saveGroup(Request $rq){
        if($rq->id == -1)
        {
            Gruppen::create([
                'name' => $rq->name,
                'lehrer_id' => $rq->lehrer_id,
                'raum_id' => $rq->raum_id
            ]);
        }
        else
        {
            $groupToUpdate = Gruppem::where('id', $rq->id)->get();
            $groupToUpdate->name = $rq->name;
            $groupToUpdate->lehrer_id = $rq->lehrer_id;
            $groupToUpdate->raum_id = $rq->raum_id;
            $groupToUpdate->save();
        }
        
    }
}
