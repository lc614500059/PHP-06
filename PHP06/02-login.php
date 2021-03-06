<?php

function postback() {
    //检验参数的完整性
    if (empty($_POST['username'])) {
        $GLOBALS['message'] = '请输入用户名';
        return;
    }

    if (empty($_POST['password'])) {
        $GLOBALS['message'] = '请输入密码';
        return;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $text = $username . ' | ' . $password;
    echo $text;
    $GLOBALS['message'] = '登录OK';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    postback();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <table border="1">
          <tr>
              <td><label for="username">用户名</label></td>
              <td><input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"></td>
          </tr>
          <tr>
              <td><label for="password">密码</label></td>
              <td><input type="password" name="password"></td>
          </tr>
          <tr>
              <td></td>
              <td><label><input type="checkbox" name="agree" value="on"> 记住密码</label></td>
          </tr>
          <?php if (isset($message)): ?>
          <tr>
              <td></td>
              <td><?php echo $message; ?></td>
          </tr>
          <?php endif ?>
          <tr>
              <td></td>
              <td><button>登录</button></td>
          </tr>
      </table>
</form>
</body>
</html>