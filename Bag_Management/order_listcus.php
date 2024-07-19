<?php
require_once("index_ConnectionInfo.php");

$con = new mysqli(ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if ($con->connect_error) {
    die("Connection error");
}
//
//if (isset($_GET["id"])) {
//    $id = $_GET["id"];
//}

$sql = "SELECT orders.id, orders.status, orders.date_buy, orders.total, bag.bag_name, customers.customer_name
        FROM orders
        JOIN bag ON orders.bag_id = bag.id
        JOIN customers ON orders.customer_id = customers.id";
$result = $con->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Order</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/all.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h3 class="text-primary">List Order</h3>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Id</td>
            <td>Date buy</td>
            <td>Total</td>
            <td>Status</td>
            <td>Bag name</td>
            <td>Customer Name</td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["date_buy"] . "</td>";
                echo "<td>" . $row["total"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td>" . $row["bag_name"] . "</td>";
                echo "<td>" . $row["customer_name"] . "</td>";

                if ($row["status"] === "SHIPPING" || $row["status"] === "ACCEPT") {
                    echo "<td><a href='#'><i class='fa-regular fa-lock'></i></a></td>";
                    echo "<td></td>";
                } elseif ($row["status"] === "CANCEL") {
                    echo "<td><a href='order_edit.php?id=" . $row["id"] . "'><i class='fa-regular fa-pen-to-square'></i></a></td>";
                    echo "<td><a href='order_delete.php?id=" . $row["id"] . "'><i class='fa-regular fa-trash-can text-danger'></i></a></td>";
                } elseif ($row["status"] === "RECEIVED") {
                    echo "<td><a href='order_rating.php?id=" . $row["id"] . "'><i class='fa-regular fa-star'></i></a></td>";
                    echo "<td></td>";
                }

                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
    <br>
</div>
</body>
</html>