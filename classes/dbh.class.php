<?php


class Dbh {
    protected function connect() {
        try {
            $username = "root";
            $password = "Password";
            $dbh = new PDO('mysql:host=localhost;dbname=loginoop',$username,$password);
            return $dbh;
        }
        catch (PDOException $e) {
            echo "Error! :" . $e->getMessage() . "<br/>";
            die();
        }
    }

}