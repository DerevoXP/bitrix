<?php
include __DIR__ . "/db.php";
$repository = new DbEngine();

$rawKey = preg_match('/[A-Z0-9-]{1,50}/', $_REQUEST["key"]) ? $_REQUEST["key"] : "error";
$rawEmail = preg_match('/@/', $_REQUEST["email"])  ? $_REQUEST["email"] : "error";

if ($rawKey == "error") {
    die("Недопустимый формат! В поле имени допустимы буквы латинского алфавита в верхнем регистре, тире и цифры.");
}

if ($rawEmail == "error") {
    die("Недопустимый формат email.");
}

$key = hash("sha256", $rawKey . $salt1);
$email = hash("sha256", $rawEmail . $salt2);
$checkExists = $repository->checkUser($key, $email);

if (!count($checkExists)) {
    $repository->setUser($key, $email);
} else {
    echo 'ok';
}
