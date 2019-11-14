
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
/* $per="select year,period,months,code,number,expend from invoice, period where invoice.period=period.id";
print_r($per); */

echo "<br><br>";
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
echo $year.",".$period;
echo "<br>";
/* select year,period,months,code,number,expend from invoice, period where year = '$year' && invoice.period=period.id &&period.id='$period'; */

$sql="select year,period,months,code,number,expend from invoice, period where year = '$year' && invoice.period=period.id && period.id='$period'";
$invoice=$pdo->query($sql)->fetchAll();
/* print_r($invoice); */
echo "<br>";

if (!empty($invoice)) {
    foreach ($invoice as $key ) {
        echo "第".$period."期 ".$key['2']."月份 發票號碼: ".$key[3]."-".$key[4]." 發票金額: ".$key[5]."元"; 
        echo "<br>" ;
    }  
}else{
    echo "no data";
}

    
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

    <h1>11,12月份發票清單</h1>
    <div class="invoice-list">
    <table>

    <tr>
            <td>發票號碼</td>
            <td>發票金額</td>
        </tr>

<?php


?>
            <tr>
        <td>CA-33587272</td>
        <td>658元</td>
        </tr>

            <tr>
        <td>CA-32033723</td>
        <td>125元</td>
        </tr>

            <tr>
        <td>AZ-77196369</td>
        <td>965元</td>
        </tr>

            <tr>
        <td>FH-44709788</td>
        <td>166元</td>
        </tr>

            <tr>
        <td>CA-55196168</td>
        <td>897元</td>
        </tr>

            <tr>
        <td>UV-35452486</td>
        <td>316元</td>
        </tr>

            <tr>
        <td>CA-76282561</td>
        <td>742元</td>
        </tr>

            <tr>
        <td>UV-58561327</td>
        <td>917元</td>
        </tr>

            <tr>
        <td>UV-75433453</td>
        <td>942元</td>
        </tr>

            <tr>
        <td>UG-48824397</td>
        <td>168元</td>
        </tr>

            <tr>
        <td>BR-64385298</td>
        <td>873元</td>
        </tr>

            <tr>
        <td>BR-73330609</td>
        <td>291元</td>
        </tr>

            <tr>
        <td>AZ-37103865</td>
        <td>626元</td>
        </tr>

            <tr>
        <td>UV-56670361</td>
        <td>887元</td>
        </tr>

            <tr>
        <td>AZ-56588131</td>
        <td>194元</td>
        </tr>

            <tr>
        <td>AZ-42587366</td>
        <td>138元</td>
        </tr>

            <tr>
        <td>BR-79524119</td>
        <td>589元</td>
        </tr>

            <tr>
        <td>AZ-60486306</td>
        <td>259元</td>
        </tr>

  
  

            

        <tr>
        <td>合計6676張發票</td>
        <td>3517004元</td>
    </tr>
    </table>
    </div>
</body>
</html>