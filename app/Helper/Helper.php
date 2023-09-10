<?php

namespace App\Helper;
class Helper
{
    public static function dateFormat($date)
    {
        if ($date == null) return "";
        $date = \Carbon\Carbon::parse($date);
        return $date->format('d-m-Y');
    }
}
