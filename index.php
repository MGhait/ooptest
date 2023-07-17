<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task</title>
</head>
<body>
<h2>
    Login
</h2>
<form action="includes/login.inc.php" method="post">
    <input type="text" name="uid" id="uid" placeholder="Username">
    <input type="text" name="email" id="email" placeholder="Email">
    <input type="password" name="password" id="password" placeholder="Password">
    <button type="submit" name="submit">Login</button>
</form>
<br>
<h2>Signup</h2>

<form action="includes/signup.inc.php" method="post">
    <input type="text" name="uid" id="uid" placeholder="Username">
    <input type="text" name="email" id="email" placeholder="Email">
    <input type="password" name="password" id="password" placeholder="Password">
    <input type="password" name="pwdRepeat" id="pwdRepeat" placeholder="Repeat Password">
    <button type="submit" name="submit" >Signup</button>
</form>
</body>
</html>

