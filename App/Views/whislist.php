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

                    <!--Go to Register form-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <!-- <h4 class="box-title">Đơn hàng đã đặt</h4> -->
                                <div class="card-body">
                                            <div class="table-responsive">
                                                <br>
                                                    <h4>Đơn hàng đã giao</h4>
                                                <br>
                                                <table class="table table-bordered table-md">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Hình ảnh</th>
                                                        <th>Giá</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                            <?php foreach ($whislist as $key => $wls) : ?>
                                                                <tr>
                                                                    
                                                                        <td><input type="checkbox" value="<?=$wls['WishlistID']?>"></td>
                                                                        <td><?=$wls['ProductName']?></td>
                                                                        <td>
                                                                            <img src="public/frontend/assets/images/products/<?=$wls['Image']?>" style="width:100px; height:100px">
                                                                        </td>
                                                                        <td><?=number_format($wls['Price'])?> vnđ</td>
                                                                        <td>
                                                                            <a href="<?=BASE_PATH?>product_detail/<?=$wls['Slug']?>" class="btn btn-info">Chi tiết</a>
                                                                            <a href="<?=BASE_PATH?>delete_wishlist&id=<?=$wls['ProductID']?>" class="btn btn-danger">Xóa</a>
                                                                            <!-- <a href="#" class="btn btn-danger">Xóa</a> -->
                                                                        </td>
                                                                    
                                                                </tr>
                                                            <?php endforeach ?>
                                                </table>
                                            </div>
                                        </div>
                                <a href="<?=BASE_PATH?>account" class="btn btn-bold">Quay Lại</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

</div>



<?php 
    require_once "footer.php"
?>