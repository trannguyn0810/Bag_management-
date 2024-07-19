<?php
session_start();
?>

<?php
$con = new mysqli("localhost", "root", "", "bag_management");
if ($con->connect_errno) {
    die("connection error");
}
?>

<?php
$id = $_GET["id"];

$sql = "";
$sql .= " SELECT * ";
$sql .= " FROM bag ";
$sql .= " WHERE id = $id ";

$result = $con->query($sql);

$obj = null;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $obj = $row;
    }
}

$_SESSION["cart"][$obj["id"]] = $obj;

echo "<script>";
echo "alert('Đã thêm vào giỏ hàng thành công!');";
echo "window.location.href = 'show_cart.php';";
echo "</script>";
?>