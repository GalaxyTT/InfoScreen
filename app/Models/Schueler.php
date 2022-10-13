<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schueler extends Model
{
    protected $fillable = [
        'nachname',
        'vorname',
        'klassen_id',
        'gruppen_id'
    ];

    protected $table = "schueler";

    public function getClass()
    {
        return $this->hasOne(Klassen::class); //Gibt die Klasse als Model zurück
    }

    public function getGroup()
    {
        return $this->hasOne(Gruppen::class); //Gibt die Gruppe als Model zurück
    }
}
