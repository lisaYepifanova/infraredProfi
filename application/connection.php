<?php
/*$host = 'localhost'; // адрес сервера
$database = 'infrabase'; // имя базы данных
$user = 'profiuser'; // имя пользователя
$password = '02Profi50'; // пароль
*/
/*
$host = 'mysql.zzz.com.ua'; // адрес сервера
$database = 'lisa'; // имя базы данных
$user = 'profiuser'; // имя пользователя
$password = '02Profi50'; // пароль
*/


$host = 'localhost'; // адрес сервера
$database = 'bhspyrqm_infraredprofi.de'; // имя базы данных
$user = 'bhspyrqm_infra'; // имя пользователя
$password = '23xyF18wpA'; // пароль


/*
$host = 'db709572782.db.1and1.com'; // адрес сервера
$database = 'db709572782'; // имя базы данных
$user = 'dbo709572782'; // имя пользователя
$password = 'Infrared24sql#'; // пароль
*/
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}