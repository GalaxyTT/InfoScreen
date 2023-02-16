<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gruppen extends Model
{
    protected $fillable = [
        'name',
        'json'
    ];

    protected $table = "gruppen";

    public function getClass()
    {
        $classId = json_decode($this->json)->classId;
        return Klassen::where('id', $classId)->first();
    }

    public function getStudents()
    {
        $studentsJson = json_decode(json_decode($this->json)->students);
        
        $students = array();
        foreach ($studentsJson as $student) 
        {
            $querry = Schueler::where('id', $student)->first();
            array_push($students, $querry);
        }
        return $students;
    }
}
