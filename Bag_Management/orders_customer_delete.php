<?php

session_unset();
session_start();
?>
<?php
require_once ("index_ConnectionInfo.php");
$con = new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username,ConnectionInfo::$password,ConnectionInfo::$database);
if($con->connect_error){
    die("Connection error");
}

$sql="DELETE * FROM orders WHERE ";
$result=$con->query($sql);
?>