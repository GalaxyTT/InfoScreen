<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gruppen extends Model
{
    protected $fillable = [
        'name',
        'lehrer_id',
        'raum_id'
    ];

    protected $table = "gruppen";

    public function getStudents()
    {
        return $this->hasMany(Schueler::class); //Gibt alle Schüler als einzelne Models zurück, welche sich in dieser Klasse befinden.
    }
}
