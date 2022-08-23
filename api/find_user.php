<?php
include_once "../base.php";

$user=$User->find(['username'=>$_GET['username']]);

if(!empty($user)){
  ?>
      <td><?=$user['username'];?></td>
      <td><?=$user['password'];?></td>
      <td><?=$user['email'];?></td>
  <?php
}else{
  echo "查無此資料";
}

?>