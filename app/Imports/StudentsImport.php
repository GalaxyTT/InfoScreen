<?php

namespace App\Imports;

use App\Models\Klassen;
use App\Models\Schueler;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[0] == 'name')
        {
            return null;
        }

        $schueler = new Schueler([
            'nachname' => $row[1],
            'vorname' => $row[2],
            'klassen_id' => Klassen::where('klasse', '=', $row[5])->get()[0]->id,
            'gruppen_id' => null,
        ]);

        if(Schueler::where('nachname', $schueler->nachname)->where('vorname', $schueler->vorname)->where('klassen_id', $schueler->klassen_id)->first() == null)
        {
            return $schueler;
        }
        else
        {
            return null;
        }
    }
}
