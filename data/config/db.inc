<?php

$salt1 = 'NothingElseMatter';
$salt2 = 'DuHastMihGefracht';

// для удалённого подключения к derevoxp.ru с Убунты
// define('DB_URL', "dblib:host=derevoxp.ru;dbname=a0438483_bitrix");

// для удалённого подключения к derevoxp.ru с Винды
// define('DB_URL', "mysql:host=derevoxp.ru;dbname=a0438483_bitrix");

// для локального подключения к derevoxp.ru
define('DB_URL', "mysql:host=localhost;dbname=a0438483_bitrix");

define("USER", "a0438483_bitrix");
define("PWD", "aT690z!jgFDs@21f");

// для запуска с терминала в Винде
// php -S localhost:4444 -t "C:\Users\derev\Documents\HackerU\06_EXPERIMENTS\login"