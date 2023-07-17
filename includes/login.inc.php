<?php
//dd($_SERVER);
//dd($_POST);
if (isset($_POST['submit'])) {
    // grabbing the data
    $uid = $_POST['uid'];
    $password = $_POST['password'];

    // instantiate signupContr class
    include  "../function.php";
    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-contr.class.php";

    $login = new LoginContr($uid,$password);



    // Runnign error handlers and user signup
    $login->loginUser();

    // going to back to front page
    header("location: ../welcome.php");
}