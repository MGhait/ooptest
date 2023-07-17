<?php
//include "signup.class.php";
class LoginContr extends Login
{

    private $uid;
    private $password;


    public function __construct($uid, $password, $pwdRepeat, $email)
    {
        $this->uid = $uid;
        $this->password = $password;

    }

    public function loginUser()
    {
        if ($this->emptyInput() == false) {
            echo "<script> alert('Empty Input'); </script>";
//            dd($_POST);
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->password);

    }

    private function emptyInput()
    {
        if (empty($this->uid) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
