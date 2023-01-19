<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klassen extends Model
{

    protected $fillable = [
        "klasse"
    ];

    protected $table = "klassen";

    public function getStudents()
    {
        return $this->hasMany(Schueler::class); //Gibt alle Schüler als einzelne Models zurück, welche sich in dieser Klasse befinden.
    }

    public function getGroups()
    {
        return $this->belongsToMany(Gruppen::class, 'schueler')->distinct();
    }
}
