<?php

function backDB($backup_folder, $backup_name, $host, $database, $user, $password) {
  $fullFileName = $backup_folder . '/' . $backup_name . '.sql';
  $command = 'mysqldump -h' . $host . ' -u' . $user . ' -p' . $password . ' ' . $database . ' > ' . $fullFileName;
  shell_exec($command);
  return $fullFileName;
}

if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/backup')) {
  mkdir($_SERVER['DOCUMENT_ROOT'].'/backup', '0777');
}

$backup_folder = $_SERVER['DOCUMENT_ROOT'].'/backup';    // куда будут сохранятся файлы
$backup_name = 'my_site_backup_' . date("Y-m-d_H:i");    // имя архива

$doBackupDB = backDB($backup_folder, $backup_name, $host, $database, $user, $password);    // бекап базы данных
