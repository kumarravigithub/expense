<?php
session_start();
require_once 'bootstrap.php';

use Pop\Db\Record,
    Pop\Auth\Adapter\Table;

class staff extends Record {
    
}

if (isset($_REQUEST['u']) && isset($_REQUEST['p'])) {
    $u = $_REQUEST['u'];
    $p = $_REQUEST['p'];
} else {
    echo '{"status":"ERR","value":"","message":"Nothing Requested"}';
    exit();
}

$staff = staff::findBy(array("username" => $u, "password" => $p, "status" => "ACTIVE"));
if (count($staff->rows) == 0) {
    echo '{"status":"ERR","value":"","message":"Login Failed. ID or Password is in-correct"}';
    exit();
} else {
    $_SESSION['uid'] = $staff->id;
    $_SESSION['name'] = $staff->name;
    echo '{"status":"SUCCESS","value":"","message":"Login Successfully."}';
}
    