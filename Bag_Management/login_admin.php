<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/all.css">

<div class="container">
    <h3 class="text-success">Đăng Nhập</h3>
    <?php
    if (isset($_GET["msg"])){
        echo "<p class='alert alert-danger'>Email hoặc password sai!</p>";
    }
    ?>
    <form action="login_success_admin.php" method="post">
        <div class="mb-3 mt-3">
            Email<input type="text" required class="form-control" name="email">
        </div>
        <div class="mb-3 mt-3">
            Mật Khẩu <input type="password" required class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-success float-end">Đăng Nhập</button>
    </form>
</div>
