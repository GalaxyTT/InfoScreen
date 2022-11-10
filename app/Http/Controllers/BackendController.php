<?php

namespace App\Http\Controllers;

use App\Models\Klassen;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function index(){
        $classes = Klassen::all();
    
        return view('backend', ['klassen' => $classes]);
    }
}
