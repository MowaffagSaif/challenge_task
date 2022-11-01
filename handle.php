<?php
require 'source.php'; 


if(isset($_POST['check'])){
    $ip = $_POST['ip'] ;
    $url = "http://services.codesoft.sd/iplocation?ip=".$ip ;
    $data = handleIp($ip, $url);
    $myArray = json_decode(($data), true);

    echo "Country name:".$myArray["countryname"]. "<br>";
    echo "Country Code:".$myArray["countrycode2"];
}


if(isset($_POST['checkCode'])){
    $code = $_POST['code'] ;
    $url = "http://services.codesoft.sd/time?q=".$code ;
    $data = handleIp($code, $url);

    $myArray = json_decode(($data), true);

    echo "Zone name:".$myArray["zonename"]. "<br>";
    echo "Time:".$myArray["time"];

}

?>

<form action="handle.php" method="post">
    <h3>Write an Code of country</h3>
    <input type="text" placeholder="Write IP" name="code" required />             
    <input type="submit" value="Check" name="checkCode">            
</form>