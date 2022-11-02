<?php 
require "db.php";

function handleIp($ip,$url){
    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    return $result ;
}

function printResult($i ,$myArray , $myArray2){
    $ip = $i;
    $arr1 = $myArray ;
    $arr2 = $myArray2 ;

    $cname = $arr1["countryname"] ;
    $ccode = $arr1["countrycode2"] ;
    $zname = $arr2["zonename"] ;
    $time = $arr2["time"] ;

    echo "Country name: ".$cname. "<br>";
    echo "Country Code: ".$ccode. "<br>";
    echo "IP Entered IS : " . $ip . "<br>" ;
    echo "Zone name:".$zname. "<br>";
    echo "Time:".$time . "<br>";

    $sql = "INSERT INTO ips ( IP, query_time, Country_name ,Country_code , Zone_name ) 
    VALUES ( :IP, :query_time, :Country_name, :Country_code , :Zone_name  )";

    $pdo_conn = $GLOBALS["pdo_conn"];
    $pdo_statement = $pdo_conn->prepare($sql);

    $result = $pdo_statement->execute( array( ':IP'=>$ip, ':query_time'=> date("Y-m-d h:m:s"), ':Country_name'=>$cname, 'Country_code'=>$ccode, 'Zone_name'=>$zname ));

    $pdo_statement1 = $pdo_conn->prepare("SELECT * FROM ips");
	$pdo_statement1->execute();
	$result1 = $pdo_statement1->fetchAll();
    ?>
    <table border: 1px>
	<tr>
	  <th>IP</th>
	  <th>query_time</th>
	  <th>Country_name</th>
	  <th>Country_code</th>
	  <th>Zone_name</th>
	</tr>
  <?php
	if(!empty($result1)) { 
		foreach($result1 as $row) {
	?>
    <tr>
		<td><?php echo $row["IP"]; ?></td>
		<td><?php echo $row["query_time"]; ?></td>
		<td><?php echo $row["Country_name"]; ?></td>
		<td><?php echo $row["Country_code"]; ?></td>
		<td><?php echo $row["Zone_name"]; ?></td>
	</tr>
    </table>
    <?php
}}

}
