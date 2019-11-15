<?php
$file=fopen('invoice.csv',"w"); //以寫入的方式開啟檔案

$num=rand(10000000,99999999);
$str="";
$eng1=chr(rand(65,90));
$eng2=chr(rand(65,90));
/* echo $eng1.$eng2; */
for ($i=0; $i < 10000; $i++) { 
/*     $str=$i."."; */
/*     $mk="AA"; */
    $eng1=chr(rand(65,90));
    $eng2=chr(rand(65,90));
    $id="";
    $year=date('Y');
    $period=rand(1,6);
    $code=$eng1.$eng2;
    $num=rand(10000000,99999999);
    $expend=rand(10,999);
    $type=2;
    $str=$str.$id.",".$year.",".$period.",".$code.",".$num.",".$expend.",".$type."\n";
}


fwrite($file,$str); //寫入

fclose($file);  //關閉
?>