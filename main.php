<?php
// nacteni souboru s externimi tridami, byl by lepsi autoloader, ale pro nastineni smeru jakym bych to resil asi staci
require_once('Data.php');
require_once('Api.php');
$dataController = new DataController();
$apiController = new ApiController();


$whichData = co chceme exportovat; // jmeno tabulky

$dataCount = $dataController->getCount($whichData); // zjistim pocet zaznamu [1000000]

$dataDone = 0; // jiz poslana data
$chunk = 5000; // jak velky ma byt balik dat na jedno poslani

if ($dataDone < $dataCount) { // projedu kompletni data a postupne posilam

    $to = $dataDone + $chunk; // vypocet vrchniho limitu cteni
    $data = $dataController->read($whichData, $dataDone, $to); // prectu kus dat s limitaci OD jiz prectenych PO jiz prectene + chunk

    if (count($data)) { // pokud jsem vycetl data
        $encodedData = $dataController->encode($data); // enkoduji data podle specifikace API
        $apiController->send($encodedData); // a odeslu data na API
        $dataDone = $dataDone + count($data); // prictu k poctu jiz zpracovanych zaznamu
    } else {
        echo "Nevycetly se data"; 
    }
} 
?>