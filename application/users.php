<?php
include 'application/connection.php';

function getRoleName($uid)
{
    include 'application/connection.php';
    
    $userq = $mysqli->query(
      "SELECT roleid FROM users WHERE id='".$uid."'"
    );

    if ($userq) {
        $userinf = mysqli_fetch_assoc($userq);
    } else {
        return 0;
    }

    $rid = $userinf['roleid'];
    $ridq = $mysqli->query(
      "SELECT role FROM user_role WHERE id='".$rid."'"
    );

    if ($ridq) {
        $roleq = mysqli_fetch_assoc($ridq);
    } else {
        return 0;
    }

    $rolename = $roleq['role'];

    return $rolename;

}