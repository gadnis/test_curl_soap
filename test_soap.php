<?php

$url = "https://bms.gf.lt:443/ClientZoneWS/EshopService?wsdl";

try {
    $soap = new SoapClient($url);
}
catch (Exception $e) {
    echo $e->getMessage();
}

var_dump($soap);