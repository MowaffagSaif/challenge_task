<?php
require 'source.php';
require_once 'db.php' ;

if(isset($_POST['check'])){
    $ip = $_POST['ip'] ;
    $url = "http://services.codesoft.sd/iplocation?ip=".$ip ;
    
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        $dataOfIp = handleIp($ip, $url); 
        $myArray = json_decode(($dataOfIp), true);

        $code = $myArray["countrycode2"];
        $url2 = "http://services.codesoft.sd/time?q=".$code ;
        $dataOfCode = handleIp($code, $url2);
        $myArray2 = json_decode(($dataOfCode), true);

        printResult($ip,$myArray , $myArray2);
    } else {
        echo("$ip is not a valid IPv4 address");
}

}
