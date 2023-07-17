<?php
//include "signup.class.php";
class Signupcontr extends Signup {

    private $uid;
    private $password;
    private $pwdRepeat;
    private $email;

    public function __construct($uid,$password,$pwdRepeat,$email) {
        $this->uid = $uid;
        $this->password = $password;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser() {
        if ($this->emptyInput() == false) {
            echo "<script> alert('Empty Input'); </script>";
//            dd($_POST);
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            echo "<script> alert('Invalid Username'); </script>";
            header("location: ../index.php?error=username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            echo "<script> alert('Invalid Email'); </script>";
            header("location: ../index.php?error=email");
            exit();
        }
        if ($this->pwdMatch() == false) {
            echo "<script> alert('Password Dosen\'t Match'); </script>";
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            echo "<script> alert('This Username Already Exists'); </script>";
            header("location: ../index.php?error=usernameoremailtaken");
            exit();
        }


        $this->setUser($this->uid,$this->password,$this->email);

    }

    private function emptyInput() {
        if (empty($this->uid) || empty($this-> password) || empty($this->pwdRepeat) ||empty($this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private  function  invalidUid() {
        if (!preg_match("/^[a-zA-Z0-9]*$/",$this->uid)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch() {
        if($this->password !== $this->pwdRepeat) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck() {
        if(!$this->checkUser($this->uid,$this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}