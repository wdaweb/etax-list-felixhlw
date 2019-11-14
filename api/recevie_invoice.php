<?php
include "base.php";

if (!empty($_POST)) {

    $year=$_POST['year'];
    $period=$_POST['period'];
    $code=$_POST['code'];
    $number=$_POST['number'];
    $expend=$_POST['expend'];
    $sql="INSERT INTO `invoice`(`id`, `year`, `period`, `code`, `number`, `expend`) VALUES (NULL,'$year','$period','$code','$number','$expend')";
    
    
    if($pdo->exec($sql)){
        echo "發票輸入成功";
        echo "<br>";
        echo "<a href='../reg_invoice.php'>繼續輸入發票</a>";
    }else{
        echo "輸入有誤，請重新輸入";

        echo "<a href='re_invoice.php>回發票輸入頁</a>";

    }
    
}




?>