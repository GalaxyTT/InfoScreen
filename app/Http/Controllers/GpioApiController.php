<?php

namespace App\Http\Controllers;

use App\Models\Flags;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class GpioApiController extends Controller
{
    public function setFlag($type)
    {
        $flag = Flags::all()->where('flagName', 'werbungFlag')->first();
        if($flag == null)
        {
            $newFlag = new Flags;
            $newFlag->flagName = 'werbungFlag';
            $newFlag->isFlagSet = $type;
            $newFlag->save();
            return;
        }
        else
        {
            $flag->isFlagSet = $type;
            $flag->save();
            return;
        }
    }
}
