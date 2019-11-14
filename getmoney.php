
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>各期奬號</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        include "./api/base.php";
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
            if (date('d')<25) {
                $period-=1;
            }
        }
        echo $year.",".$period;
        echo "<br><br>";

        $sql1="select * from award where year = '$year' && period='$period'";
        $awd=$pdo->query($sql1)->fetchAll();

        print_r($awd);
        echo "<br><br>";

        $sql2="select year,period,months,code,number,expend from invoice, period where year = '$year' && invoice.period=period.id && period.id='$period'";
        $invoice=$pdo->query($sql2)->fetchAll();

        print_r($invoice);
        echo "<br><br>";

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
    <h1>統一發票中獎號碼單</h1>
        <form action="getmoney.php" method="get">
            <input type="hidden" name="year" value="$year">
            <input type="hidden" name="period" value="4">
            <input type="submit" value="對獎">
        </form>
    
    <div class="award-form">
            <table>
                <tr>
                    <td colspan="3">
                        年度：2019                    </td>
                </tr>
                <tr>
                    <td>月份</td>
                    <td>
                        7,8月                    </td>
                    <td>獎金</td>
                </tr>
                <tr>
                    <td>特別獎</td>
                    <td>
                        <li>45698621</li>
                    </td>
                    <td>1000萬元</td>
                </tr>
                <tr>
                    <td>特獎</td>
                    <td>
                        <li>19614436</li>
                    </td>
                    <td>200萬元</td>
                </tr>
                <tr>
                    <td>頭獎</td>
                    <td>
                        <li>96182420</li>
                        <li>47464012</li>
                        <li>62781818</li>
                    </td>
                    <td>20萬元</td>
                </tr>
                <tr>
                    <td>二獎</td>
                    <td>末 7 位數號碼與頭獎中獎號碼末 7 位相同者</td>
                    <td>4萬元</td>
                </tr>
                <tr>
                    <td>三獎</td>
                    <td>末 6 位數號碼與頭獎中獎號碼末 6 位相同者</td>
                    <td>1萬元</td>
                </tr>
                <tr>
                    <td>四獎</td>
                    <td>末 5 位數號碼與頭獎中獎號碼末 5 位相同者</td>
                    <td>4千元</td>
                </tr>
                <tr>
                    <td>五獎</td>
                    <td>末 4 位數號碼與頭獎中獎號碼末 4 位相同者</td>
                    <td>1千元</td>
                </tr>
                <tr>
                    <td>六獎</td>
                    <td>末 3 位數號碼與頭獎中獎號碼末 3 位相同者</td>
                    <td>2百元</td>
                </tr>
                <tr>
                    <td>增開六獎</td>
                    <td>
                        <li>928</li>
                        <li>899</li>
                        <li></li>
                    </td>
                    <td>2百元</td>
                </tr>
                <tr>
                    <td colspan="3">

                    </td>
                </tr>
            </table>
    </div>
</body>
</html>