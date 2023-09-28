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

    public static function dateFormatDB($date){
        if ($date == null) return "";
        $date = \Carbon\Carbon::parse($date);
        return $date->format('Y-m-d');
    }

    public static function thausandSeparator($number){
        return number_format($number, 0, ',', '.');
    }

    public static function currency($number){
        return "Rp. " . Helper::thausandSeparator($number);
    }
}
