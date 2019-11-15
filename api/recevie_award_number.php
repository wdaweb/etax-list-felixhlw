<?php
include "base.php";
$year=$_POST['year'];
$period=$_POST['period'];
$awa1=$_POST['awa1'];
$awa2=$_POST['awa2'];
$awa3=implode(",",$_POST['awa3']);
$awa4=implode(",", $_POST['awa4']);



$sql="INSERT INTO `award`(`id`, `year`, `period`, `awa1`, `awa2`, `awa3`, `awa4`) VALUES (NULL,'$year','$period','$awa1','$awa2','$awa3','$awa4')";

print_r($sql);

if($pdo->exec($sql)){
    echo "<br>";
    echo "<h1>登錄獎號成功</h1>";
    echo "<br>";
    echo "<a href='../reg_award.php'><div class='button'>繼續錄獎號</div></a>";
}else{
    echo "<h1>輸入有誤，請重新輸入!</h1>";
    echo "<a href='../reg_award.php'><div class='button'>重新登錄獎號</div></a>";

}


?>