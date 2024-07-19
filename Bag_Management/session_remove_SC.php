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
$_SESSION["cart"]= [];
header("Location:show_cart.php");
?>
