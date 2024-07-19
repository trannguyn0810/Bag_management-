<?php
require_once ("index_ConnectionInfo.php");
$con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if($con->connect_error){
    die("Connection error");
}
$id = $_GET["id"];

$sql = "DELETE FROM bag WHERE id = $id";
$con->query($sql);

header("Location: index.php?page=bag.php");