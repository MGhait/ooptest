<?php
//include "dbh.class.php";
class Signup extends Dbh {

    protected function setUser($uid,$password,$email) {
        $statment = $this->connect()->prepare(
            'INSERT INTO users (users_uid, users_password, users_email) VALUES (?, ?, ?);
        ');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if (!$statment->execute(array($uid,$hashedPwd,$email))) {
            $statment = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
            $statment = null;
    }
    protected function checkUser($uid,$email) {
        $statment = $this->connect()->prepare(
            'SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

        if (!$statment->execute(array($uid,$email))) {
            $statment = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($statment->rowCount() > 0) {
            $resultCheck =  false;
        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

}