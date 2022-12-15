<?php

namespace App\Http\Controllers;

use App\Models\Gruppen;
use App\Models\Klassen;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    private $classes;
    private $groups;
    private $settings;

    public function index(){
        return $this->render(0);
    }

    public function getClasses(){
        $this->classes = Klassen::all();
        return $this->render(1);
    }

    public function getGroups(){
        $this->classes = Gruppen::all();
        return $this->render(2);
    }

    public function getSettings(){
        return $this->render(3);
    }

    public function render($flag){
        if($flag == 0){
            return view('backend', ['flag' => $flag]); 
        }
        elseif ($flag == 1) {
            return view('backend', ['flag' => $flag, 'classes' => $this->classes]); 
        }
        elseif ($flag == 2){
            return view('backend', ['flag' => $flag, 'groups' => $this->groups]);
        }
        else{
            return view('backend', ['flag' => $flag, 'settings' => $this->settings]);
        }
    }

    public function createClass(Request $request)
    {
        $data = $request->all();
        $className = $data['name'];
        $students = $data['students'];

        die(dump($students));
    }
}
