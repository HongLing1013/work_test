<?php
include_once "../base.php";
$pw=$_GET['password']??$_POST['password'];
echo $User->math('count','id',['password'=>$pw]);
?>