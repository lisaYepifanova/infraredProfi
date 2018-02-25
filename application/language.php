<?php

function setLanguage() {
//language variable
  $lang = 1;
  if (isset($_POST)) {
    if (isset($_POST['lang'])) {
      $lang = $_POST['lang'];
    }
  }

  if (isset($_COOKIE["language"])) {
    if ($_COOKIE['language'] !== $lang) {
      setcookie('language', $lang, time() + 7 * 24 * 60 * 60);
    }
  }
  else {
    setcookie('language', $lang, time() + 7 * 24 * 60 * 60);
  }
}

function getLanguage() {
  $lang = 1;
  if (isset($_COOKIE)) {
    if (isset($_COOKIE['language'])) {
      $lang = $_COOKIE['language'];
    }
  }


  return $lang;
}