<?php
$con = new mysqli("localhost", "root", "", "bag_management");
if ($con->connect_errno) {
    die("connection error");
}

$id = $_GET["id"];
$status = $_GET["status"];

$sql = "";
$sql .= " UPDATE orders ";
$sql .= " SET ";
$sql .= "   status    = '$status' ";
$sql .= " WHERE ";
$sql .= "   id              = $id ";

$con->query($sql);

header("Location: orders_customerAd.php");
