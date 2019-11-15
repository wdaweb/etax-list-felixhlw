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
/* print_r($award); */

$sql2="select year,period,months,code,number,expend from invoice, period where year = '$year' && invoice.period=period.id && period.id='$period'";
$invoice=$pdo->query($sql2)->fetchAll();
/* print_r($invoice); */
$sql3="select sum(`expend`) as cost from invoice where period = '$period'";
$cost=$pdo->query($sql3)->fetch();

/* echo "總花費:".$cost['cost'];
echo "<br>"; */

$total=count($invoice);
$money=[];
$tot=0;

function explodeawa3($a){
    global $award;
    $result=explode(",", $award[0]['awa3'])[$a];
    return $result;
}

function explodeawa4($b){
    global $award;
    $result=explode(",", $award[0]['awa4'])[$b];
    return $result;
}

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

<?php
foreach ($invoice as $key) {
    switch($key[4]){
        case $award[0]['awa1']:
            echo "<li>發票號碼: ".$key[4]." 中特別獎 -> 1千萬元</li>";
            array_push($money,10000000);    
        break;  
        case $award[0]['awa2']:
            echo "<li>發票號碼: ".$key[4]." 中特獎 -> 2百萬元</li>";
            array_push($money,2000000); 
        break;
    }

    for ($i=0; $i < (count(explode(",", $award[0]['awa3'])))-1 ; $i++) { 
        if ($key[4]==explodeawa3($i)) {
            echo "<li>發票號碼: ".$key[4]." 中頭獎 -> 20萬元</li>";
            array_push($money,200000); 
        }elseif( substr($key[4],-7) == substr(explodeawa3($i),-7)){
            echo "<li>發票號碼: ".$key[4]." 中二獎 -> 4萬元</li>";
            array_push($money,40000);  
        }elseif( substr($key[4],-6) == substr(explodeawa3($i),-6)){
            echo "<li>發票號碼: ".$key[4]." 中三獎 -> 1萬元</li>";
            array_push($money,10000);  
        }elseif( substr($key[4],-5) == substr(explodeawa3($i),-5)){
            echo "<li>發票號碼: ".$key[4]." 中四獎 -> 4千元</li>";
            array_push($money,4000);     
        }elseif( substr($key[4],-4) == substr(explodeawa3($i),-4)){
            echo "<li>發票號碼: ".$key[4]." 中五獎 -> 1千元</li>";
            array_push($money,1000);      
        }elseif( substr($key[4],-3) == substr(explodeawa3($i),-3)){
            echo "<li>發票號碼: ".$key[4]." 中六獎 -> 200元</li>";
            array_push($money,200);    
        }
    }

    //增開六獎的部分
    for ($i=0; $i < (count(explode(",", $award[0]['awa4'])))-1 ; $i++) { 
        if( substr($key[4],-3) == explodeawa4($i)){
            echo "<li>發票號碼: ".$key[4]." 中加開六獎 -> 200元<li>";
            array_push($money,200);    
        }else{
            echo "<li>目前沒有中獎記錄~</li>";
        }

    }

}
$tot=array_sum($money);
/* echo "<br>獲獎陣列紀錄: <br>";
print_r($money); */
echo "<br>";
echo "總共中了".count($money)."張發票";
echo "<br>";
echo "<br>總共獲得:".$tot."元<br>";

?>
    
<div class="button-s"><a href="index.php">回首頁</a> </div>  
</div>  
</body>
</html>
