<?php
require_once("index_ConnectionInfo.php");
$con = new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username,ConnectionInfo::$password,ConnectionInfo::$database);
if ($con->connect_error) {
    die("Connection error");
}
if( isset($_GET["id"])){
    $id=$_GET["id"];
}
$sql = "SELECT orders.id,orders.status, orders.date_buy,orders.total,bag.bag_name, customers.customer_name,customers.phone,customers.address,customers.gender
FROM orders
JOIN bag ON orders.bag_id = bag.id
JOIN customers ON orders.customer_id = customers.id ";
$result= $con->query($sql);
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
    <script>
        function showReceivedMessage() {
            alert("Đơn hàng đã hoàn thành");
        }
    </script>
</head>
<body>
<div class="container">
    <h3 class="text-primary"> List Order</h3>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Id</td>
            <td>Customer Name</td>
            <td>Buy Date</td>
            <td>Address</td>
            <td>Phone</td>
            <td>Gender</td>
            <td>Status</td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?php
        if($result->num_rows >0) {

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["customer_name"]."</td>";
    echo "<td>".$row["date_buy"]."</td>";
    echo "<td>".$row["address"]."</td>";
    echo "<td>".$row["phone"]."</td>";
    echo "<td>".$row["gender"]."</td>";
    echo "<td>".$row["status"]."</td>";
    echo "<td> <a href='order_delete.php?id=".$row["id"]."'><i class='fa-regular fa-trash-can text-danger'></i></a></td>";
    echo "<td> <a href='order_delete.php?id=".$row["id"]."'><i class='fa-regular fa-trash-can text-danger'></i></a></td>";

//    if ($row["status"] == "ACCEPTED") {
//        echo "<td><a class='btn btn-info btn-sm' href='order_updateStatus.php?id=".$row["id"]."&status=SHIPPING'>SHIPPING</a></td>";
//    } elseif ($row["status"] == "SHIPPING") {
//        echo "<td><a class='btn btn-info btn-sm' href='order_updateStatus.php?id=".$row["id"]."&status=RECEIVED'>RECEIVED</a></td>";
//    } elseif ($row["status"] == "RECEIVED") {
//        echo "<td><button class='btn btn-info btn-sm' onclick='showReceivedMessage()' disabled>RECEIVED</button></td>";
//    } elseif ($row["status"] == "CANCEL") {
//        echo "<td><button class='btn btn-info btn-sm' disabled>CANCEL</button></td>";
//    } else {
//        echo "<td><a class='btn btn-info btn-sm' href='order_updateStatus.php?id=".$row["id"]."&status=ACCEPTED' >ACCEPTED</a></td>";
//        echo "<td><a class='btn btn-info btn-sm' href='order_updateStatus.php?id=".$row["id"]."&status=CANCEL' >CANCEL</a></td>";
//    }

    echo "</tr>";
}
//    echo "<td><a class='btn btn-info btn-sm' href='order_updateStatus.php?id=".$row["id"]."&status=ACCEPTED' onclick='showReceivedMessage()'>ACCEPTED</a></td>";

        }

        ?>
        <a href="home.php" class="btn btn-success">Quay về trang chủ</a>

    </table>
    <br>
</div>

</body>
</html>
