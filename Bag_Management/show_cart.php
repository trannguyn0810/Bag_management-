<?php

session_unset();
session_start();
?>

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/all.css">
<script src="js/jquery.min.js"></script>
<h3>Cart</h3>


<?php
$carts = $_SESSION["cart"];

?>
<a href="home.php" class="btn btn-primary">Trang chủ</a>
<table class="table table-bordered table-striped">
    <thead>
    <tr>

        <td>Id</td>
        <td>Bag Name</td>
        <td>Price</td>

        <td>Image</td>

        <td></td>
        <td></td>
    </tr>
    </thead>

    <tbody>

    <?php
    if($carts != null) {
        foreach ($carts as $key) {
            echo "<tr>";
            echo "<td>".$key["id"]."</td>";
            echo "<td>".$key["bag_name"]."</td>";
            echo "<td>".$key["price"]."</td>";
//            echo "<td>".$key["quantity"]."</td>";
            echo"<td class='table-danger'><img src='image_product/".$key["image"]."' width='100' alt=''></td>";
            echo "<td> <a href='session_remove_SC.php?id=".$key["id"]."'><i class='fa-regular fa-trash-can text-danger'></i></a></td>";
            echo "<td> <a href='Dat_Hang.php?id=".$key["id"]."'><i class='btn btn-primary btn-user btn-block'>đặt hàng</i></a></td>";
            echo "</tr>";
        }
    }
    else {
        echo"Giỏ hàng trống";
    }
    ?>

    </tbody>
</table>

<?php
//        if($carts != null) {
//            var_export($carts);
//        foreach ($carts as $key) {
//
//
//            echo '<input type="text" name="id" value="'.$key["id"].'" >' ;
//
//
//        }
//        }
//?>

<script>
    $(function () {
        $("#order").click(function () {
            var ids = new Array();

            $("input[name=id]").each(function() {
                ids.push($(this).val());
            });
            alert(ids);
            $("#ids").val(ids);
            ;
        });
    });
</script>
<script>
    $(function () {
        $("#order").click(function () {
            var ids = new Array();

            $("input[name=id]").each(function() {
                ids.push($(this).val());
            });
            alert(ids);
            $("#ids").val(ids);
            ;
        });
    });
</script>