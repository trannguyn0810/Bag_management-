
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/all.css">
<link rel="stylesheet" href="style.css">
<body class="bg-gradient-primary">
<link rel="stylesheet" href="js/jquery.min.js">
<link rel="stylesheet" href="js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="js/jquery-easing/jquery.easing.min.js">
<link rel="stylesheet" href="js/sb-admin-2.min.js">
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div><h4 class="text-success" style="margin-left: 30px;text-size: 240px">CHÀO MỪNG BẠN ĐẾN VỚI TRANG ĐĂNG NHẬP!!!</h4></div>

                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login Account!</h1>
                        </div>
                        <?php
                        if (isset($_GET["msg"])) {
                            $msg = $_GET["msg"];
                            echo "<p class=' alert alert-danger'>Email hoặc Password sai</p>";
                        }
                        ?>
                        <form action="login_success.php" method="post">
                            <div class="col-sm-6">
                                <label for="email">Email</label>

                                <input type="text" name="email" id="email" required class="form-control form-control-user" >

                            </div>
                            <br>

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" required class="form-control form-control-user">
                                </div>
                                <br>
<!--                                <div class="col-sm-6 mb-3 mb-sm-0">-->
<!--                                    <label for="re_password">Re-Password</label>-->
<!--                                    <input type="re_password" required class="form-control form-control-user"-->
<!--                                           name="re_password"  id="re_password">-->
<!--                                </div>-->
                            <div class="mb-3 mt-3">
                                <button class="btn btn-primary btn-user btn-block">Login</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div >
                    <img class="img-fluid"  src="image_product/register.jpg"  style="height: 400px;width: 400px;margin-left: 570px; margin-top: -453px" alt="">
                </div>

            </div>
        </div>
    </div>

</div>
</body>
