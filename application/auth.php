<?php
session_start(); //Запускаем сессии
include 'application/connection.php';


/**
 * @return boolean
 */
function isAuth() {
  if (isset($_SESSION["is_auth"])) { //Если сессия существует
    return $_SESSION["is_auth"]; //Возвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
  }
  else {
    return FALSE;
  } //Пользователь не авторизован, т.к. переменная is_auth не создана
}

/**
 * Авторизация пользователя
 * @param string $login
 * @param string $passwors
 */
function auth($login, $pass) {
  include 'application/connection.php';

  $q = $mysqli->query(
    "SELECT * FROM users WHERE login='" . $login . "' AND pass='" . $pass . "'"
  );
  if ($q) {
    $query = mysqli_fetch_assoc($q);
  }

  $role_q = $mysqli->query(
    "SELECT role FROM user_role WHERE id=" . $query['roleid']
  );
  if ($role_q) {
    $role = mysqli_fetch_assoc($role_q);
  }


  if ($query) { //Если логин и пароль введены правильно
    $_SESSION["is_auth"] = TRUE; //Делаем пользователя авторизованным
    $_SESSION["login"] = $login; //Записываем в сессию логин пользователя
    $_SESSION["role"] = $role['role'];
    $_SESSION['user_id'] = $query['id'];
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];


    return TRUE;
  }
  else { //Логин и пароль не подошел
    $_SESSION["is_auth"] = FALSE;

    return FALSE;
  }
}

/**
 * Метод возвращает логин авторизованного пользователя
 */
function getLogin() {
  if (isAuth()) { //Если пользователь авторизован
    return $_SESSION["login"]; //Возвращаем логин, который записан в сессию
  }
}

function getID() {
  if (isAuth()) { //Если пользователь авторизован
    return $_SESSION["user_id"]; //Возвращаем логин, который записан в сессию
  }
}

function getRole() {
  if (isAuth()) { //Если пользователь авторизован
    return $_SESSION["role"]; //Возвращаем логин, который записан в сессию
  }
}

function out() {
  $_SESSION = []; //Очищаем сессию
  session_destroy(); //Уничтожаем
}
