<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flags extends Model
{
    protected $fillable = [
        'flagName',
        'isFlagSet'
    ];

    protected $table = "flags";
}
