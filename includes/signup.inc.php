<?php
//dd($_SERVER);
//dd($_POST);
if (isset($_POST['submit'])) {
    // grabbing the data
    $uid = $_POST['uid'];
    $password = $_POST['password'];
    $pwdRepeat = $_POST['pwdRepeat'];
    $email = $_POST['email'];

    // instantiate signupContr class
    include  "../function.php";
    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signup-controller.class.php";

    $signup = new Signupcontr($uid,$password,$pwdRepeat,$email);



    // Runnign error handlers and user signup
    $signup->signupUser();

    // going to back to front page
    header("location: ../welcome.php");
}