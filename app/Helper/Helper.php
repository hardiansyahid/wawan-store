<?php

namespace App\Helper;
use Illuminate\Support\Carbon;

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

    public static function getCurrentYear(){
        $date = Carbon::now();
        $date = \Carbon\Carbon::parse($date);
        return $date->format('Y');
    }

    public static function thausandSeparator($number){
        return number_format($number, 0, ',', '.');
    }

    public static function currency($number){
        return "Rp. " . Helper::thausandSeparator($number);
    }

    public static function expiredDay($tanggal){
        $tanggalKedaluwarsa = Carbon::parse($tanggal);
        $tanggalSaatIni = Carbon::now();
        return $tanggalSaatIni->diffInDays($tanggalKedaluwarsa, false);
    }

    public static function getBulanNama($bulan){
        $bulanNama = "";
        if ($bulan == 1) $bulanNama = "JANUARI";
        if ($bulan == 2) $bulanNama = "FEBRUARI";
        if ($bulan == 3) $bulanNama = "MARET";
        if ($bulan == 4) $bulanNama = "APRIL";
        if ($bulan == 5) $bulanNama = "MEI";
        if ($bulan == 6) $bulanNama = "JUNI";
        if ($bulan == 7) $bulanNama = "JULI";
        if ($bulan == 8) $bulanNama = "AGUSTUS";
        if ($bulan == 9) $bulanNama = "SEPTEMBER";
        if ($bulan == 10) $bulanNama = "OKTOBER";
        if ($bulan == 11) $bulanNama = "NOVEMBER";
        if ($bulan == 12) $bulanNama = "DESEMBER";

        return $bulanNama;
    }
}
