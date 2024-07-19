
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
                <div><h3 class="text-success" style="text-align: center">CHÀO MỪNG BẠN ĐẾN VỚI TRANG ĐĂNG KÝ!!!</h3></div>

                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form action="register_save.php" method="post">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="customer_name">Customer Name</label>
                                    <input type="text" name="customer_name" id="customer_name" required class="form-control form-control-user">

                                </div>
                            <br>
                                <div class="col-sm-6">
                                    <label for="phone">Phone</label>

                                    <input type="text" name="phone" id="phone" required class="form-control form-control-user" >

                                </div>
                            <br>
                            <div class="col-sm-6">
                                <label for="email">Email</label>

                                <input type="text" name="email" id="email" required class="form-control form-control-user" >

                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" required class="form-control form-control-user">
                                </div>
                                <div class="col-sm-6">
                                    <label for="re_password">Re-Password</label>
                                    <input type="re_password" required class="form-control form-control-user"
                                         name="re_password"  id="re_password">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="address">Address</label>

                                <input type="text" name="address" id="address"  required class="form-control form-control-user">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="gender">Gender</label>

                                <input type="text" name="gender" id="gender"  required class="form-control form-control-user">
                            </div>
                            <br>
                            <div class="mb-3 mt-3">
                                <button class="btn btn-primary btn-user btn-block">Register Account</button>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="login1.php">Already have an account? Login!</a>
                        </div>
                    </div>

                </div>
                <div >
                    <img class="img-fluid"  src="image_product/register.jpg"  style="height: 400px;width: 400px;margin-left: 750px; margin-top: -400px" alt="">
                </div>

            </div>
        </div>
    </div>

</div>
</body>
