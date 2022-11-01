<?php 

function handleIp($ip,$url){
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection , CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $ip","HTTP_X_FORWARDED_FOR: $ip"));
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    return $result ;
}


// function handleCode($code,$url){
//     $cURLConnection = curl_init($url);
//     curl_setopt($cURLConnection , CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $code","HTTP_X_FORWARDED_FOR: $code"));
//     $result = curl_exec($cURLConnection);
//     curl_close($cURLConnection);
// }