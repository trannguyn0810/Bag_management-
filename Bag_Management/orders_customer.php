<?php
session_unset();
session_start();
?>
<?php
require_once("index_ConnectionInfo.php");
$con = new mysqli(ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if ($con->connect_error) {
    die("Connection error");
}

$sql = "SELECT orders.*, customers.customer_name, customers.phone, customers.email, customers.address, customers.gender
        FROM orders
        INNER JOIN customers ON orders.customer_id = customers.id";
$result = $con->query($sql);
?>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/all.css">
<script src="js/jquery.min.js"></script>
<h4 style="text-align: center">List Orders</h4>

<div class="container">
    <a href="home.php" class="btn btn-primary">Trang chủ</a>
    <a href="show_cart.php" class="btn btn-primary">Giỏ hàng</a>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Date Buy</th>
            <th>Status</th>
            <th>Customer Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Gender</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='table-primary'>" . $row["id"] . "</td>";
                echo "<td class='table-success'>" . $row["date_buy"] . "</td>";
                echo "<td class='table-success'>" . $row["status"] . "</td>";
                echo "<td class='table-danger'>" . $row["customer_name"] . "</td>";
                echo "<td class='table-danger'>" . $row["phone"] . "</td>";
                echo "<td class='table-danger'>" . $row["email"] . "</td>";
                echo "<td class='table-danger'>" . $row["address"] . "</td>";
                echo "<td class='table-danger'>" . $row["gender"] . "</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>