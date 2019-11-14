
<?php
include "./api/base.php";
$month=date('m');
        
if (!empty($_GET)) {

    $period=$_GET['period'];

    if (($period > 1 & $month < 3 )) {
        $year=date('Y')-1;
    }else{
        $year=date('Y');
    }
       
}else{
    $year=date('Y'); 
    $month=date('m');

    if($month==1 || $month==2){
        $period=1;
    }elseif($month==3 || $month==4){
        $period=2;
    }elseif($month==5 || $month==6){
        $period=3;
    }elseif($month==7 || $month==8){
        $period=4;
    }elseif($month==9 || $month==10){
        $period=5;
    }elseif($month==11 || $month==12){
    $period=6;
    }
    if (date('d')<25) {
        $period-=2;
    }
}
$sql1="select year,period,months,awa1,awa2,awa3,awa4 from award, period where year = '$year' && period='$period' && award.period=period.id && period.id='$period'";
$award=$pdo->query($sql1)->fetchAll();
print_r($award);

$sql2="select year,period,months,code,number,expend from invoice, period where year = '$year' && invoice.period=period.id && period.id='$period'";
$invoice=$pdo->query($sql2)->fetchAll();
/* print_r($invoice); */
$sql3="select sum(`expend`) as cost from invoice where period = '$period'";
$cost=$pdo->query($sql3)->fetch();

echo "總花費:".$cost['cost'];
echo "<br>";

$total=count($invoice);

/* if (!empty($invoice)) {
    foreach ($invoice as $key ) {
        echo "第".$period."期 ".$key['2']."月份 發票號碼: ".$key[3]."-".$key[4]." 發票金額: ".$key[5]."元"; 
        echo "<br>" ;
    }  
}else{
    echo "no data";
} */
/* $prize=[
        "1千萬元"=>10000000,
        "2百萬元"=>2000000,
        "20萬元"=>200000,
        "4萬元"=>40000,
        "1萬元"=>10000,
        "4千元"=>4000,
        "1千元"=>1000,
        "200元"=>200
    ]; */


echo "<br>";       
/* echo $prize['1千萬元']; */
echo "<br>";
$money=[];
$tot=0;
foreach ($invoice as $key) {
    echo $key[4];
    if ($key[4]==$award[0]['awa1']) {
        echo "發票號碼: ".$key[4]." 中特獎 -> 1千萬元";
        echo "<br>";  
        array_push($money,10000000);  

    }elseif($key[4]==$award[0]['awa2']) {
            echo "發票號碼: ".$key[4]." 中特獎 -> 2百萬元";
            echo "<br>";  
            array_push($money,2000000); 

    }elseif(substr($key[4], -7,7)==$award[0]['awa3']){
        echo "發票號碼: ".$key[4]."中頭獎 -> 200萬元";
        echo "<br>";
        array_push($money,2000000);  

    }elseif(substr($key[4], -7,7)==$award[0]['awa4']){
        echo "發票號碼: ".$key[4]."中頭獎 -> 200元";
        echo "<br>";
        array_push($money,200);  
    }


}
$tot=array_sum($money);
echo "<br>獲獎陣列紀錄: ";
print_r($money);
echo "<br>總共獲得:".$tot."元<br>";





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>發票對獎</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<h1>開始對獎</h1>
<div class="award-info">
年度：<?=$year;?><br>
期別：<?=$period?><br>
合計有發票：
<?=$total;?>張<br>
消費金額共計: <?=$cost['cost'];?> 元
</div>
<div class="award-result">


<h2>對獎結果</h2>
<ul>
    <li>發票號碼 38938818=>2百元</li><li>發票號碼 63541899=>2百元</li><li>發票號碼 46780818=>2百元</li><li>發票號碼 39176012=>2百元</li><li>發票號碼 71631899=>2百元</li><li>發票號碼 41995012=>2百元</li><li>發票號碼 58673899=>2百元</li><li>發票號碼 39078928=>2百元</li><li>發票號碼 42970012=>2百元</li><li>發票號碼 64757899=>2百元</li><li>發票號碼 48107012=>2百元</li><li>發票號碼 35614420=>2百元</li><li>發票號碼 59622899=>2百元</li><li>發票號碼 47210899=>2百元</li><li>發票號碼 56667899=>2百元</li><li>發票號碼 40905818=>2百元</li><li>發票號碼 37735420=>2百元</li><li>發票號碼 47589818=>2百元</li><li>發票號碼 72783818=>2百元</li><li>發票號碼 68368818=>2百元</li><li>發票號碼 60089420=>2百元</li><li>發票號碼 47805928=>2百元</li><li>發票號碼 32456012=>2百元</li><li>發票號碼 71333928=>2百元</li><li>發票號碼 57472012=>2百元</li><li>發票號碼 33010420=>2百元</li><li>發票號碼 69578420=>2百元</li><h3>恭喜你合計中了5400元</h3></ul>
<a href="index.php" style="display:block;width:300px;text-align:center;margin:auto;">回首頁</a>  
</div>  
</body>
</html>
