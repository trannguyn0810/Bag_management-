<?php

require_once ("index_ConnectionInfo.php");
$con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if($con->connect_error){
    die("Connection error");
}

if (isset($_GET["id"]))
{
    $sql="UPDATE bag SET 
    bag_name='". $_GET["bag_name"] . "',color='". $_GET["color"] . "',price='" . $_GET["price"] . "',size='" . $_GET["size"] . "',quantity='" . $_GET["quantity"] . "',description='" . $_GET["description"] . "' 
    WHERE id='" . $_GET["id"] . "' ";
    $con->query($sql);
}
header("Location: index.php?page=bag.php");