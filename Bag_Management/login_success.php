<?php
require_once("index_ConnectionInfo.php");
$con = new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username,ConnectionInfo::$password,ConnectionInfo::$database);
if ($con->connect_error) {
    die("Connection error");
}

$email = $_POST["email"];
$password = $_POST["password"];
$sql  = "";
$sql .= " SELECT * ";
$sql .= " FROM customers ";
$sql .= " WHERE ";
$sql .= " email = '$email' ";
$sql .= " AND password = '$password' ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    session_start();
    while ($row = $result->fetch_assoc()) {
        $_SESSION["email"] = $row["email"];
    }

    header("Location: home.php");
} else {
    header("Location: login1.php?msg=error");
}

