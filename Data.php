<?php
class Data
{
    public static function read($whichData, $from, $to){
        $data = sql dotaz dle parametru //nacte potrebna data z databaze dle zadanych parametru (tabulka, od, do)
        return $data;
    }

    public static function encode($data){
        // provede prevod dat na format pro poslani na API
        return $encodedData;
    }

    public static function getCount($whichData){
        $count = sql COUNT dotaz na danou tabulku; 
        return $count;
    }
}
?>