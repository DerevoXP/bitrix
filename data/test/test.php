<?php
include __DIR__ . "/../engine/db.php";
$repository = new DbEngine();


//////////// добавление в базу тестовых данных ////////////
// $repository->setUser("6B4F96D2-8584-B37D-803C-D9503E05A920", "derevoxp2015@gmail.com");

//////////// проверка тестовых данных ////////////
$responseLogin = $repository->checkUser("6B4F96D2-8584-B37D-803C-D9503E05A920", "derevoxp2015@gmail.com");
var_dump($responseLogin);
