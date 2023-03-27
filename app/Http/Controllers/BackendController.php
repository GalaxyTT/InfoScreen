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

use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

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
        $classes = Klassen::all()->sortByDesc('klasse');
        return view('Components.classes', ['classes' => $classes]);
    }
    public function updateClass(Request $request){
        Klassen::latest()->where('id', $request->id)->update(['klasse', $request->name]);
        return redirect(route('classes'));
    }
    public function deleteClass(Request $request)
    {
        $class = Klassen::find($request->id);
        $class->delete();
        return redirect(route('classes'));
    }

    public function createRoom(Request $request)
    {
        Raeume::create([
            'raum' => $request->raum
        ]);
        return redirect(route('rooms'));
    }
    public function getRooms(){
        $rooms = Raeume::all()->sortByDesc('raum');
        return view('Components.rooms', ['rooms' => $rooms]);
    }
    public function deleteRoom(Request $request){
        $room = Raeume::find($request->id);
        $room->delete();
        return redirect(route('rooms'));
    }

    public function getSettings(){
        $settings = Settings::all();
        return view('Components.settings', ['settings' => $settings]);
    }

    public function updateSettings(Request $request){
        Settings::latest()->where('settingName', '=', $request->sName)->update(['value'=> $request->value]);
        return redirect(route('settings'));
    }

    public function getStudents(){
        
        //$students = Schueler::all()->sortBy('nachname', SORT_NATURAL|SORT_FLAG_CASE);
        
        $students = Schueler::all()->sortBy([
            ['gruppen_id', 'asc'],
            ['klassen_id', 'asc'],
            function($student) {
                return strtolower($student->nachname);
            }
        ]);
        
        $groups = Gruppen::all();
        $classes = Klassen::all();
        return view('Components.schueler', ['students' => $students, 'groups' => $groups, 'classes' => $classes]);

    }
    public function createStudent(){
        $classes = Klassen::all();
        return view('Forms.createStudent', ['classes' => $classes]);
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
        return redirect(route('students'));
    }
    public function deleteStudent(Request $rq){
        $student = Schueler::find($rq->id);
        $student->delete();
        return redirect(route('students'));
    }

    public function importStudents(Request $rq)
    {
        Excel::import(new StudentsImport, $rq->file()["file"]);
        return redirect(route('students'));
    }

    public function getGroups(){
        $teachers = Lehrer::all();
        $rooms = Raeume::all();
        $groups = Gruppen::all();
        return view('Components.groups', ['groups' => $groups, 'teachers' => $teachers, 'rooms' => $rooms]);
    }

    public function prepareFormOne(){
        $classes = Klassen::all();
        return view('Forms.groupsFormFirst', ['classes' => $classes]);
    }

    public function prepareFormTwo(Request $rq){
        $groupName = $rq->groupName;
        $classId = $rq->classId;
        $studentCount = $rq->studentCount;
        $students = Schueler::where('klassen_id', $classId)->get();
        return view('Forms.groupsFormSecond', ['groupName' => $groupName, 'classId' => $classId, 'studentCount' => $studentCount, 'students' => $students]);
    }

    public function prepareFormThird(Request $rq){
        $groupName = $rq->groupName;
        $classId = $rq->classId;
        $students = json_encode($rq->student);
        $teachers = Lehrer::all();
        $rooms = Raeume::all();
        return view('Forms.groupsFormThird', ['groupName' => $groupName, 'classId' => $classId, 'teachers' => $teachers, 'rooms' => $rooms, 'students' => $students]);
    }

    public function processForm(Request $rq){
        $groupName = $rq->groupName;
        $classId = $rq->classId;
        $students = $rq->students;
        $dates = $rq->dates;
        $teachers = $rq->teachers;
        $rooms = $rq->rooms;
        $exercises = $rq->exercises;
        $tempArr = array();
        foreach ($dates as $i => $value) {
            array_push($tempArr, array('date' => $value, 'dayInfo' => array('teacher' => $teachers[$i], 'room' => $rooms[$i], 'exercise' => $exercises[$i])));
        }
        $jsonArr = array('classId' => $classId, 'students' => $students, 'dates' => $tempArr);
        $json = json_encode($jsonArr);
        Gruppen::create([
            'name' => $groupName,
            'json' => $json
        ]);
        return redirect(route('groups'));
    }
    public function saveGroup(Request $rq){
       
        Gruppen::create([
            'name' => $rq->name,
            'lehrer_id' => $rq->lehrer_id,
            'raum_id' => $rq->raum_id
        ]);
        
        return redirect(route('groups'));
    }

    public function deleteGroup(Request $request){
        $room = Gruppen::find($request->id);
        $room->delete();
        return redirect(route('groups'));
    }

    public function createTeacher(Request $request){
        Lehrer::create([
            'lehrer' => $request->lehrer
        ]);
        return redirect(route('teachers'));
    }

    public function getTeachers(){
        $teachers = Lehrer::all();
        return view('Components.teachers', ['teachers' => $teachers]);
    }

    public function updateTeacher(Request $request){
        Lehrer::latest()->where('id', $request->id)->update(['lehrer', $request->lehrer]);
        return redirect(route('teachers'));
    }

    public function deleteTeachers(Request $request){
        $class = Lehrer::find($request->id);
        $class->delete();
        return redirect(route('teachers'));
    }
}
