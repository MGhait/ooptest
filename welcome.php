<?php
//  $user?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>
<h1>
    Welcome Page
</h1>
<?php  if (isset($_SESSION['userid'])) { ?>
<h2>
    Welcome <?= $_SESSION['userid']?>
</h2>
<?php }?>
<a href="includes/logout.inc.php"> Logout</a>
</body>
</html>
