<?php


$con = new mysqli("localhost", "root", "", "detai");
if ($con->connect_errno) {
    die("connection error");
}
$id = $_GET["ids"];
var_export($ids);
$customer_name = $_GET["customer_name"];
var_export($customer_name);
$phone = $_GET["phone"];
var_export($phone);
$address = $_GET["address"];
var_export($address);
//$status = $_GET["status"];
//var_export($status);
date_default_timezone_set("Asia/Bangkok");
$buy_date = date ("Y-m-d H:i-s");
var_export($buy_date);
//$ids = $_POST["ids"];
//$customer_name = $_POST["customer_name"];
//$phone = $_POST["phone"];
//$address = $_POST["address"];
date_default_timezone_set("Asia/Bangkok");
$buy_date = date ("Y-m-d H:i-s");
var_export($buy_date);
$sql = "";
$sql .= " INSERT INTO Orders (customer_name,phone,address,buy_date,status) ";
$sql .= " VALUES ('$customer_name','$phone','$address','$buy_date','PENDING') ";
//
//$con->query($sql);
$insertedId = $con->insert_id;
$arrId = explode(",", $ids);
$sqlOrderDetail = "";
$sqlOrderDetail .= " INSERT INTO OrderDetail (product_id,quantity,order_id) ";
$sqlOrderDetail .= " VALUES  ";
for ($i = 0; $i < count($arrId); $i++) {
    if($i != count($arrId) -1 ) {
        $sqlOrderDetail .= " (".$arrId[$i].", 1, $insertedId), ";
    }
    else {
        $sqlOrderDetail .= " (".$arrId[$i].", 1, $insertedId) ";
    }
}
var_export($sqlOrderDetail);
echo "<br>Đặt hàng thành công";
