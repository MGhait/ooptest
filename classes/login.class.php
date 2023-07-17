<?php
//include "dbh.class.php";
class Login extends Dbh {

    protected function getUser($uid,$password) {
        $statment = $this->connect()->prepare('SELECT users_password FROM users WHERE users_uid = ? OR users_email = ?;');

//        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if (!$statment->execute(array($uid,$password ))) {
            $statment = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($statment->rowCount() == 0){
            $statment = null;
            header('location: ../index.php?error=usernotfound');
            exit();
        }

        $pwdHashed = $statment->fetchAll(PDO::FETCH_ASSOC);
        $checkpwd = password_verify($password, $pwdHashed[0]["users_password"]);

        if ($checkpwd == false){
            $statment = null;
            header('location: ../index.php?error=wrongpassword');
            exit();
        } elseif ($checkpwd == true) {
            $statment = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_password = ?;');

            if (!$statment->execute(array($uid,$uid,$password ))) {
                $statment = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
            if ($statment->rowCount() == 0){
                $statment = null;
                header('location: ../index.php?error=usernotfound');
                exit();
            }
            if ($statment->rowCount() == 0){
                $statment = null;
                header('location: ../index.php?error=usernotfound');
                exit();
            }

            $user = $statment->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['userid'] = $user[0]['users_id'];
            $_SESSION['useruid'] = $user[0]['users_uid'];
            $statment = null;
        }


        $statment = null;
    }
}