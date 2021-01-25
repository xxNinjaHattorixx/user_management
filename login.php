<?php 
    /*
    ******************************************************************************
    ログイン画面
    2021/01/25　服部
    ******************************************************************************
    */
 ?>

<!DOCTYPE html>
<html lang="ja">
 <head>
   <meta charset="utf-8">
   <title>Login</title>
 </head>
 <body>
   <form  action="method.php" method="post">
     <p>email</p>
     <input type="text" name="email">
     <p>password</p>
     <input type="password" name="password">
     <input type="submit" value="Login">
   </form>
 </body>
</html>