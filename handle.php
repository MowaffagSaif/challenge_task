<?php
require 'source.php'; 

if(isset($_POST['check'])){
    $ip = $_POST['ip'] ;
    $url = "http://services.codesoft.sd/iplocation?ip=".$ip ;
    $dataOfIp = handleIp($ip, $url);
    $myArray = json_decode(($dataOfIp), true);

    echo "Country name: ".$myArray["countryname"]. "<br>";
    echo "Country Code: ".$myArray["countrycode2"]. "<br>";
    echo "IP Entered IS : " . $ip . "<br>" ;

    $code = $myArray["countrycode2"];
    $url2 = "http://services.codesoft.sd/time?q=".$code ;
    $dataOfCode = handleIp($code, $url2);

    $myArray2 = json_decode(($dataOfCode), true);

    echo "Zone name:".$myArray2["zonename"]. "<br>";
    echo "Time:".$myArray2["time"];
}
