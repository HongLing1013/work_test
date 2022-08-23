<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="../js/jquery-3.6.0.js"></script>
</head>
<body>

<fieldset>
  <legend>會員註冊</legend>
    <div id="result"></div>
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
        <td>email</td>
        <td><input type="email" name="email" id="email"></td>
      </tr>
      <tr>
        <td>
          <button onclick="reg()">送出</button>
        </td>
        <td>
          <button onclick="$('#username,#password,#email').val('')">清除</button>
        </td>
      </tr>
    </table>
</fieldset>


<script>

  function reg(){
    let user={
      username:$("#username").val(),
      password:$("#password").val(),
      email:$("#email").val(),
    }
    if(user.acc==''||user.pw==''||user.email==''){
      alert("不可空白")
    }else{
      $.post("../api/reg.php",user,(result)=>{
        $("#result").text(result)
      })
    }
  }
</script>
  
</body>
</html>


