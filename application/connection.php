<?php
$host = 'localhost'; // адрес сервера
$database = 'infrabase'; // имя базы данных
$user = 'profiuser'; // имя пользователя
$password = '02Profi50'; // пароль

/*
$host = 'mysql.zzz.com.ua'; // адрес сервера
$database = 'lisa'; // имя базы данных
$user = 'profiuser'; // имя пользователя
$password = '02Profi50'; // пароль
*/

$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}