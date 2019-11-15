<?php
include "base.php";

$rows= fopen("invoice.csv","r");

$data = fgetcsv($rows);

$sql="insert into invoice(year,period,code,number,expend,type) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";

while (($data = fgetcsv($rows, 1000, ",")) !== FALSE) {
    $pdo->exec($sql);
}


?>