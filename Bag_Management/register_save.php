<?php
require_once("index_ConnectionInfo.php");
$con = new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username,ConnectionInfo::$password,ConnectionInfo::$database);
if ($con->connect_error) {
    die("Connection error");
}

$customer_name = $_POST["customer_name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
$re_password = $_POST["re_password"];
$address = $_POST["address"];
$gender = $_POST["gender"];
$sql  = "";
$sql .= " INSERT INTO customers(customer_name,phone,email,password,re_password,address,gender) ";
$sql .= " VALUES ( ";
$sql .= "  '$customer_name','$phone','$email','$password','$re_password','$address','$gender' ";
$sql .= " ) ";
$con->query($sql);
header("Location: home.php");
