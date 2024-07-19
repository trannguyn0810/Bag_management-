<?php
session_start();
?>
<?php
$email ="";
if (isset($_SESSION["email"])){
    $email =$_SESSION["email"];
}

require_once ("index_ConnectionInfo.php");
$con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if($con->connect_error){
    die("Connection error");
}
$sql = "SELECT bag.*
FROM bag INNER JOIN types ON bag.type_id= types.id WHERE types.type_name='balo laptop';";
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>bag</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="trang_chu.css">
    <link rel="stylesheet" href="css/all.css">
</head>
<body>
<div class="category-image">
    <img src="image_product/z5053796211794_2d757411825cbef0964cda250134a427.jpg" style="width:100%;height:100%;" alt=""/>
</div>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php"?page=index>Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" >Balo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" >Túi xách</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" >Phụ kiện</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders_customer.php">Sản phẩm đã đặt</a>
                </li>
            </ul>
            <form class="d-flex">
                <?php
                if ($email != ""){
                    echo "<a href='cart_show.php' style='margin-right: 10px' class='btn btn-outline-danger'><i class='fa-solid fa-cart-shopping'></i>Xem giỏ hàng</a>";
                    echo '<a href="logout.php" class="btn btn-outline-danger">Đăng Xuất</a>';
                } else{
                    ?>
                    <a href="register.php" class="btn btn-outline-danger" style="margin-right: 10px" ><i class="fa-regular fa-user"></i>Đăng Ký</a>
                    <a href="login1.php" class="btn btn-outline-danger" style="margin-right: 10px"><i class="fa-solid fa-user"></i>Đăng Nhập</a>
                    <a href="login_admin.php" class="btn btn-outline-primary"><i class="fa-solid fa-circle-user"></i>Admin</a>
                    <?php
                }
                ?>
            </form>
        </div>
    </div>
</nav>

<div class="category-image">
    <img src="image_product/balo1.jpg" style="width:80%;height:40%; margin-left: 150px" alt=""/>
</div>

<div class="container">
    <div class="title">Balo nổi bật</div>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-3">';
                echo '<div class="card" style="width:300px">';
                echo "<a style='text-decoration: none' href='bag_detail.php?id=".$row["id"]."'><img class='card-img-top' src='image_product/".$row["image"]."' alt=''>";

                echo ' <div class="card-body">';
                echo ' <h4 class="card-title" style="color: black">'.$row["bag_name"].'</h4>';
                echo '<p class="card-text" style="color: black">'.$row["size"].'</p>';
                echo ' <p class="card-text" style="font-size: 20px; color: #fd2b67" ><b>'.$row["price"].'<u>đ</u></b></p>';

                echo '</div>';

                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>

</div>

</body>
</html>
