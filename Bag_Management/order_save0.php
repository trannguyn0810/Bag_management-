<?php
require_once("index_ConnectionInfo.php");

$con = new mysqli(ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);

if ($con->connect_error) {
    die("Connection error");
}

$customer_name = $_POST["customer_name"];
$date_buy = !empty($_POST["date_buy"]) ? $_POST["date_buy"] : date('Y-m-d H:i:s');
$address = $_POST["address"];
$phone = $_POST["phone"];
$quantity = $_POST["quantity"];
$status = $_POST["status"];

$sql = "INSERT INTO orders(customer_name, date_buy, address, phone, quantity, status) VALUES ('$customer_name', '$date_buy', '$address', '$phone', '$quantity', '$status')";
$sql2 = "SELECT * FROM orders";
$con->query($sql);
$con->query($sql2);

header("Location: order_listcus.php");
?>