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
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-md">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Thông tin</th>
                                                        <th>Hình ảnh</th>
                                                        <th>Giá</th>
                                                        <th>Số lượng</th>
                                                        <th>Thành tiền</th>
                                                    </tr>
                                                    <?php foreach ($order_detail as $key => $detail) : ?>
                                                        <tr>
                                                                <td><?=$detail['OrderID']?></td>
                                                                <td><?=$detail['ProductName']?></td>
                                                                <td>
                                                                    <img style="width: 100px; height: 100px" src="public/frontend/assets/images/products/<?=$detail['Image']?>" alt="">
                                                                </td>
                                                                <td><?=number_format($detail['UnitPrice'])?>đ</td>
                                                                <td><?=$detail['Quantity']?></td>
                                                                <td><?=number_format($detail['UnitPrice'] * $detail['Quantity'])?>đ</td>
                                                        </tr>
                                                    <?php endforeach ?>  
                                                </table>
                                            </div>
                                        </div>
                                <a href="<?=BASE_PATH?>order_history" class="btn btn-bold">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div><br>




<?php 
    require_once "footer.php"
?>