<?php
include_once "../base.php";
$user=$User->all();
foreach($user as $user){
  ?>
  <tr>
    <td><?=$user['username'];?></td>
    <td><?=$user['password'];?></td>
    <td><?=$user['email'];?></td>
    <td><input type="checkbox" name="del[]" value="<?=$user['id'];?>"></td>
  </tr>
  <?php
}
?>