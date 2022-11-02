<?php 

function handleIp($ip,$url){
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    return $result ;
}
