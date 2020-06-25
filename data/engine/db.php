<?php

include __DIR__ . "/../config/db.inc"; // для паролей и солей

class DbEngine
{
    public function setUser($login, $email) // заносим юзера в базу
    {
        $connection =
            new PDO(DB_URL, USER, PWD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO userkeys (login, email) VALUES (:login, :email)";
        $statement = $connection->prepare($sql);
        $statement->bindParam(":login", $login);
        $statement->bindParam(":email", $email);
        $statement->execute();
        echo $statement->rowCount();
    }

    public function checkUser($login, $email) // проверяем существование юзера
    {
        $connection =
            new PDO(DB_URL, USER, PWD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT login, email FROM userkeys WHERE login = :login AND email = :email";
        $statement = $connection->prepare($sql);
        $statement->bindParam(":login", $login);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

}
