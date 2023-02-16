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
        return $this->belongsTo(Klassen::class, 'klassen_id');
        //return Klassen::where('id', $this->klassen_id)->get()[0];
    }

    public function getGroup()
    {
        return $this->belongsTo(Gruppen::class, 'gruppen_id');
        //return Gruppen::where('id', $this->gruppen_id)->get()[0];
    }
}
