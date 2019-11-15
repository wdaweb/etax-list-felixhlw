
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
/*         echo "<br><br>"; */
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

        $m=["0,0","1,2","3,4","5,6","7,8","9,10","11,12"];
        $start=""; //判斷發票開獎日
        if ($period==6) {
            $start="1";
        }else{
            $start=intval($m[$period])+2;
        }
/*         echo $start."<br>"; */
/*         echo $year."年度,第".$period."期";
        echo "<br>"; */

        $sql1="select year,period,months,awa1,awa2,awa3,awa4 from award, period where year = '$year' && period='$period' && award.period=period.id && period.id='$period'";
        $award=$pdo->query($sql1)->fetch();
        
        $sql2="select year,period,months,code,number,expend from invoice, period where year = '$year' && invoice.period=period.id && period.id='$period'";
        $invoice=$pdo->query($sql2)->fetchAll();
        
/*         echo "獎號<br>";
        print_r($award);
        echo "<br>"; */
        $months=$invoice[0][2];
        $awa1=$award['awa1'];
        $awa2=$award['awa2'];
        $awa3=explode("," ,$award['awa3']);
        $awa4=explode("," ,$award['awa4']);
/*         echo "<br>";
        echo "這是頭獎的獎號內容: <br>";
        print_r($awa3);
        echo "<br>"; */

/*         echo "<br>發票號碼<br>";
        print_r($invoice);
        echo "<br><br>"; */
        $awa=[$awa1,$awa2,$awa3,$awa4];
        $num="";
        function nonum($num){
            global $award;
            global $awa;
            global $period;
            global $m;
            global $start;
            
            if (empty($award) ) {
                echo $start."月25日13:30開獎";
            }else{   
                echo $awa[$num];
            }
          }
          /* && date('d')<25 && date('h')< 13 && date('m')<30  */
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
    <h1><?=$year;?>年度,第<?=$period;?>期</h1>
    <h1>統一發票中獎號碼單</h1>
        <form action="award.php" method="get">
            <input type="hidden" name="year" value="<?=$year;?>">
            <input type="hidden" name="period" value="<?=$period;?>">
<?php            
    if (!empty($award))  {
        echo "<input type='submit' class='send' value='對獎'>";
    }else{
        echo "<h2>無該其獎號</h2>";
    }

?>            
        </form>
    

    <div class="award-form">
            <table>
            
                <tr>
                    <td colspan="3">
                        年度：<?=$year;?> </td>
                </tr>
                <tr>
                    <td>月份</td>
                    <td>
                        <?=$m[$period];?>月  </td>
                    <td>獎金</td>
                </tr>
                <tr>
                    <td>特別獎</td>
                    <td>
   
                     <li><?=nonum(0);?></li>
        
                    </td>
                    <td>1000萬元</td>
                </tr>
                <tr>
                    <td>特獎</td>
                    <td>
        
                      <li><?=nonum(1);?></li>
                            </td>
                    <td>200萬元</td>
                </tr>
                <tr>
                    <td>頭獎</td>
                    <td>
                     <?php
                        if (empty($award) || $awa3==0) {
                            echo "<li>". $start."月25日13:30開獎"."</li>";
                              
                        }else{ 
                            for ($i=0; $i < count($awa3); $i++) { 
                                echo "<li>".$awa3[$i]."</li>";
                            }
                        }
                     ?> 
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
                    <?php
                        if (empty($award) || $awa3==0) {
                            echo "<li>". $start."月25日13:30開獎"."</li>";
                        }else{ 
                            for ($i=0; $i < count($awa4); $i++) { 
                                echo "<li>".$awa4[$i]."</li>";
                            }
                        }
                     ?>                         
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