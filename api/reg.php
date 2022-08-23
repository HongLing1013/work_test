<?php
include_once "../base.php";

// if_else>>>>可是好像是錯的
// $uppercase = preg_match('#[A-Z]#', $_POST['username']);
// $lowercase = preg_match('#[a-z]#', $_POST['username']);
// $number    = preg_match('#[0-9]#', $_POST['username']);
// $length    = strlen($_POST['username']) <= 10;
// $length1    = strlen($_POST['username']) >=5;
// $uppercase1 = preg_match('#[A-Z]#', $_POST['password']);
// $lowercase1 = preg_match('#[a-z]#', $_POST['password']);
// $number1    = preg_match('#[0-9]#', $_POST['password']);
// $special   = preg_match('#[\W]{1,}#', $_POST['password']); 
// $length2    = strlen($_POST['password']) <= 30;
// $length3    = strlen($_POST['password']) >= 8;

// if(!$uppercase || !$lowercase || !$number || !$length || !$length1){
//   echo "帳號不符規定";
// }else if(!$uppercase1 || !$lowercase1 || !$number1 || !$special || !$length2 || !$length3){
//   echo "密碼不符規定";
// }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
//   echo "信箱格式錯誤";
// }else{
//   $User->save($_POST);
// }

// 老師教的--邏輯
// $str="123456";
// $preg="/^[A-Za-z]/";//開頭英文字
// if(preg_match($preg,$str)){
//   echo "pass";
// }else{
//   echo "no match";
// }

$acc=$_POST['username'];
$pw=$_POST['password'];
$email=$_POST['email'];

// 以字母開頭,5-10個字元
$chkacc="/^[a-zA-Z][a-zA-Z0-9]{4,9}$/";
// 8-30字元 包含英文大小寫及數字 至少一個特殊符號
$chkpw="/^[a-zA-Z0-9]{7,29}[^%&',;=?$\x22]+$/";
// email(網路拉下來的= =)
$chkemail="/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";

if(preg_match($chkacc,$acc)){
  if(preg_match($chkpw,$pw)){
    if(preg_match($chkemail,$email)){
      $User->save($_POST);
    }else{
      echo "信箱不符規定";
    }
  }else{
    echo "密碼不符規定";
  }
}else{
  echo "帳號不符規定";
}

?>