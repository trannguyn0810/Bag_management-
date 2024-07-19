<?php
session_unset();
session_start();

?>

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/all.css">
<script src="js/jquery.min.js"></script>

<h3>Cart <a href="home.php" class="btn btn-outline-danger"><i class="fa-solid fa-house-chimney-window"></i></a></h3>


<?php
$carts = $_SESSION["cart"];

?>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Price</td>
        <td>Quantity</td>
        <td>Description</td>
        <td>Image</td>
        <td></td>
<!--        <td>Image</td>-->

    </tr>
    </thead>

    <tbody>

    <?php
    if($carts != null) {
        foreach ($carts as $cart) {
            echo "<tr>";
            echo "<td>".$cart["id"]."</td>";
            echo "<td>".$cart["bag_name"]."</td>";
            echo "<td>".$cart["price"]."</td>";
            echo "<td>".$cart["quantity"]."</td>";
            echo "<td>".$cart["description"]."</td>";
//            echo "<td>".$cart["category"]."</td>";
            echo"<td class='table-danger'><img src='image_product/".$cart["image"]."' width='100' alt=''></td>";
            echo"<td><a href='session_remove.php?id=".$cart["id"]."'><i class='fa-regular fa-trash-can text-danger'></i></a></td>";

            echo "</tr>";
        }
    }

    $total = 0;
    if(is_array($carts) && count($carts) > 0){
        foreach ($carts as $row){
            $total = $total +$row["price"]*$row["quantity"];
    }
    }
    ?>
    </tbody>
</table>
<h3>Tổng Tiền: <?php echo $total; ?></h3>

    <?php
    if($carts != null) {
        foreach ($carts as $cart) {
            echo '<input type="text" name="id" value="'.$cart["id"].'" >';
        }
    }
    ?>

<form action="BALO_orders.php" method="post">
        ids:
        <input type="text" name="ids" id="ids" value="">
        <div>
            Tên: <input type="text" required name="customer_name">
        </div>
    <div>
            Giới tính: <input type="text" required name="gender">
        </div>
        <div>
            SĐT: <input type="text" required name="phone">
        </div>
        <div>
            Địa Chỉ: <input type="text" required name="address">
        </div>
        <div>
            Email: <input type="text" required name="email">
        </div>
        <p>Ship COD</p>
    <div>
        <button type="submit" id="order" class="btn bg-info btn-sm"><i class="fa-solid fa-truck"></i> Đặt Hàng</button>
        <a href='session_remove.php' class="btn btn-outline-danger"><i class='fa-regular fa-trash-can text-danger'></i>Xóa giỏ hàng</a>
    </div>
</form>

<script>
    $(function () {
        $("#order").click(function () {
            var ids = new Array();
            $("input[name=id]").each(function() {
                ids.push($(this).val());
            });
            alert(ids);
            $("#ids").val(ids);
        });
    });
</script>


