<?php
include_once "../base.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<fieldset>
  <legend>帳號管理</legend>
  <table>
    <tr>
      <td>帳號</td>
      <td>密碼</td>
      <td>email</td>
      <td>刪除</td>
    </tr>
    <tbody id="user">
    <?php
      $all=$User->math('count','id');
      $div=10;
      $pages=ceil($all/$div);
      $now=$_GET['p']??1;
      $start=($now-1)*$div;
      $user=$User->all(" limit $start,$div");
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
    </tbody>
  </table>
  <div>
    <?php
    if(($now-1>0)){
      $p=$now-1;
      ?>
      <a href="?p=<?=$p;?>"> < </a>
      <?php
    }

    for($i=1;$i<=$pages;$i++){
      ?>
      <a href="?p=<?=$i;?>"> <?=$i;?></a>
      <?php
    }

    if(($now+1)<=$pages){
      $p=$now+1;
      ?>
      <a href="?p=<?=$p;?>"> > </a>
      <?php
    }
    ?>
  </div>
  <div>
    <button onclick="del()">確定刪除</button>
  </div>
</fieldset>


<fieldset>
  <legend>搜尋會員</legend>
  <div>輸入要搜尋的帳號</div>
  <div><input type="text" name="username" id="username"></div>
  <table>
    <tr>
      <td>帳號</td>
      <td>密碼</td>
      <td>email</td>
    </tr>
    <tbody id="result">
    </tbody>
  </table>
  <div><button onclick="findUser()">尋找</button></div>
</fieldset>

<script>

function findUser(){
    $.get("../api/find_user.php",{username:$("#username").val()},(result)=>{
      $("#result").html(result);
    })
  }

  function del(){
    let ids=new Array();
    // 
    $("table input[type='checkbox']:checked").each((idx,box)=>{
      ids.push($(box).val());
    });
      $.post("../api/del_user.php",{del:ids},(res)=>{
        location.reload();
    })
}
</script>
</body>
</html>


