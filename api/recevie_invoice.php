<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="../css/style.css">
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
        echo "<h1>發票輸入成功</h1>";
        echo "<br>";
        echo "<a href='../reg_invoice.php'><div class='button'>繼續輸入發票</div></a>";
        echo "<h2>或</h2>";
        echo "<a href='../index.php'><div class='button'>回首頁</div></a>";
    }else{
        echo "<h1>輸入有誤，請重新輸入</h1>";
        echo "<br>";
        echo "<a href='reg_invoice.php><div class='button'>回發票輸入頁</div></a>";
        echo "<h2>或</h2>";
        echo "<a href='../index.php'><div class='button'>回首頁</div></a>";
    }
    
}
echo "<a href='../reg_invoice.php'><div class='button'>繼續輸入發票</div></a>";
echo "<h2>或</h2>";
echo "<a href='../index.php'><div class='button'>回首頁</div></a>";
echo "<a href='reg_invoice.php><h1>回發票輸入頁</h1></a>";


?>