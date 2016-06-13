<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    /**
     *
     */
    public static function systemInfo()
    {
        return System::findOrFail(1);
    }

    /**
     *
     */
    public static function domain()
    {
        return 'http://' . $_SERVER['HTTP_HOST'];
    }
}
