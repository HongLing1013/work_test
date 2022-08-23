<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <script src="./js/jquery-3.6.0.js"></script>
</head>
<body>
  <fieldset>
    <legend>登入</legend>
    <table>
      <tr>
        <td>帳號</td>
        <td><input type="text" name="username" id="username"></td>
      </tr>
      <tr>
        <td>密碼</td>
        <td><input type="password" name="password" id="password"></td>
      </tr>
      <tr>
        <td>
          <button onclick="login()">送出</button>
          <button onclick="$('#username,#password').val('')">清除</button>
        </td>
        <td>
          <a href="./front/reg.php">註冊帳號</a>
        </td>
      </tr>
    </table>
  </fieldset>
</body>
</html>

<script>
  function login(){
    let username=$("#username").val();
    let password=$("#password").val();
    $.post("./api/chk_acc.php",{username},(res)=>{
      if(parseInt(res)===1){
        $.post("./api/chk_pw.php",{password},(res)=>{
          if(parseInt(res)===1){
            location.href="./back/main.php";
          }else{
            alert("密碼錯誤");
          }
        })
      }else{
        alert("帳號錯誤");
      }
    })
  }
</script>