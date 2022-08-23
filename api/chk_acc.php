<?php
include_once "../base.php";
$acc=$_GET['username']??$_POST['username'];
echo $User->math('count','id',['username'=>$acc]);

?>