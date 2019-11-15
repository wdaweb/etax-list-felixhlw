
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>發票清單</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
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
}
$sql2="select year,period,months,code,number,expend from invoice, period where year = '$year' && invoice.period=period.id && period.id='$period'";
$invoice=$pdo->query($sql2)->fetchAll();

$months=$invoice[0][2];
/* echo $year.",".$period;
echo "<br>"; */
/* select year,period,months,code,number,expend from invoice, period where year = '$year' && invoice.period=period.id &&period.id='$period'; */

$sql="select year,period,months,code,number,expend from invoice, period where year = '$year' && invoice.period=period.id && period.id='$period'";
$invoice=$pdo->query($sql)->fetchAll();
$sql3="select sum(`expend`) as cost from invoice where period = '$period'";
$cost=$pdo->query($sql3)->fetch();

/* echo "總花費:".$cost['cost'];
echo "<br>"; */
/* print_r($invoice); */
?>

<div class="navbar">
        <li>
            <a href="?year=<?=$year;?>&period=1">1,2月</a>
        </li>
        <li>
            <a href="?year=<?=$year;?>&period=2">3,4月</a>
        </li>
        <li>
            <a href="?year=<?=$year;?>&period=3">5,6月</a>
        </li>
        <li>
            <a href="?year=<?=$year;?>&period=4">7,8月</a>
        </li>
        <li>
            <a href="?year=<?=$year;?>&period=5">9,10月</a>
        </li>
        <li>
            <a href="?year=<?=$year;?>&period=6">11,12月</a>
        </li>
        <li>
            <a href="index.php">回首頁</a>
        </li>
    </div>

    <h1><?=$months;?>月份發票清單</h1>
    <div class="invoice-list">
    <table>

    <tr>
            <td>發票號碼</td>
            <td>發票金額</td>
        </tr>

<?php
if (!empty($invoice)) {
    foreach ($invoice as $key ) {
        echo "<tr>";
        /* echo "<td>第".$period."期 ".$key['2']."月份 發票號碼: ".$key[3]."-".$key[4]." 發票金額: ".$key[5]."元</td>";  */
        echo "<td>".$key[3]."-".$key[4]."</td> <td> ".$key[5]."元</td>"; 
        echo "</tr>" ;
    }  
}else{
    echo "no data";
}





?>



  
        <td>合計<?=count($invoice);?>張發票</td>
        <td><?=$cost['cost'];?>元</td>
    </tr>
    </table>
    </div>
</body>
</html>