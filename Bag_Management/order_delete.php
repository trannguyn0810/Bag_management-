<?php
session_unset();
session_start();
?>
<?php
require_once("index_ConnectionInfo.php");
$con = new mysqli(ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if ($con->connect_errno) {
    die("connection error");
}

$id = $_GET["id"];
$sqlDeleteOrderDetail = "DELETE FROM orderdetail WHERE order_id = $id";
$con->query($sqlDeleteOrderDetail);
$sqlDeleteOrder = "DELETE FROM orders WHERE id = $id";
$con->query($sqlDeleteOrder);
header("Location: status_admin.php");
?>