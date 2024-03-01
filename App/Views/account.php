<?php 
    require_once "header.php";
    extract($data);
    // var_dump($product);
?>
  

 <!--Hero Section-->
 <div class="hero-section hero-background">
        <h1 class="page-title">Organic Fruits</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Authentication</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain login-page">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">
                
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">Tài khoản</h4>
                                
                                
                                <div class="info-user" style="padding: 20px;display: flex; justify-content: space-around;">
                                    <div class="avatar-user" style="width:150px; height:150px">
                                        <img src="public/frontend/assets/images/insta-02.jpg" style="border-radius:10%" alt="">
                                    </div>
                                    <div class="info">
                                        <b>Họ và tên:</b> <?= $_SESSION['user']['FullName'] ?><br>
                                        <b>Email:</b> <?= $_SESSION['user']['Email'] ?><br>
                                        <b>SĐT:</b> <?= $_SESSION['user']['Phone'] ?><br>
                                        <b>Địa chỉ:</b> <?= $_SESSION['user']['Address'] ?><br>
                                        <input type="file" name="img_user" value="" style="width:200px">
                                        
                                    </div>
                                    
                                </div>
                                   
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">Menu</h4>
                                <!-- <a href="#" class="btn btn-bold">Cập nhật</a> -->
                                <a href="<?=BASE_PATH?>whislist" class="btn btn-bold">Sản phẩm yêu thích</a>
                                <a href="<?=BASE_PATH?>order_history" class="btn btn-bold">Lịch sử đơn hàng</a>
                                <a href="<?=BASE_PATH?>logout" class="btn btn-bold">Đăng Xuất</a>
                                <?php if ($_SESSION['user']['role'] != 0): ?>
                                    <a href="<?=BASE_PATH?>dashboard" class="btn btn-bold">Vào admin</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>


                    <!--Go to Register form-->
                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <div class="info-user" style="padding: 20px;">
                                    
                                    <b>Họ và tên:</b> <?= $_SESSION['user']['name'] ?><br>
                                   <b>Email:</b> <?= $_SESSION['user']['email'] ?><br>
                                   <b>SĐT:</b> <?= $_SESSION['user']['phone'] ?><br>
                                   <b>Địa chỉ:</b> <?= $_SESSION['user']['address'] ?><br>
                                </div>
                                <a href="#" class="btn btn-bold">Create an account</a>
                            </div>
                        </div>
                    </div> -->

                </div>

            </div>

        </div>

    </div>



<?php 
    require_once "footer.php"
?>