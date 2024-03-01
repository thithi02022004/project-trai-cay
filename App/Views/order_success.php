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
                                                        <th>Thông tin</th>
                                                        <th>Tổng hóa đơn</th>
                                                        <th>Trạng thái</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                            <?php foreach ($list_order as $key => $od) : ?>
                                                                <tr>
                                                                    <?php if ($od['ShippingStatus'] == 5 || $od['ShippingStatus'] == 6) : ?>
                                                                        <td><input type="checkbox" value="<?=$od['OrderID']?>"></td>
                                                                        <td>
                                                                            Tên: <b><?=$od['customerName']?></b><br>
                                                                            ====================<br>
                                                                            SĐT: <?=$od['customerPhone']?><br>
                                                                            Email: <?=$od['customerEmail']?><br>
                                                                            Địa chỉ: <?=$od['customerAddress']?><br>
                                                                        </td>
                                                                        <td><b><?=number_format($od['TotalAmount'])?> vnđ</b></td>
                                                                        <td>
                                                                            <?php if ($od['ShippingStatus'] == 1 ) : ?>
                                                                                    <a href="#" class="btn btn-warning" >Chờ duyệt</a>
                                                                                <?php if ($od['ShippingStatus'] == 1 ) : ?>
                                                                                    <a href="<?=BASE_PATH?>cancel&id=<?=$od['OrderID']?>" class="btn btn-danger" >Hủy đơn</a>
                                                                                <?php endif ?>
                                                                            <?php elseif($od['ShippingStatus'] == 2 ) :?>
                                                                                <a href="#" class="btn btn-info" >Đã nhận đơn</a>
                                                                            <?php elseif($od['ShippingStatus'] == 3 ) :?>
                                                                                <a href="#" class="btn btn-info" >Đang xử lý</a>
                                                                            <?php elseif($od['ShippingStatus'] == 4 ) :?>
                                                                                <a href="#" class="btn btn-info" >Đang giao</a>
                                                                            <?php elseif($od['ShippingStatus'] == 5 ) :?>
                                                                                <a href="#" class="btn btn-success" >Giao thành công</a>
                                                                            <?php elseif($od['ShippingStatus'] == 6 ) :?>
                                                                                <a href="#" class="btn btn-danger" >Dẫ hủy</a>
                                                                            <?php endif ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?=BASE_PATH?>order_detail_user&id=<?=$od['OrderID']?>" class="btn btn-info">Chi tiết</a>
                                                                            <!-- <a href="#" class="btn btn-danger">Xóa</a> -->
                                                                        </td>
                                                                    <?php endif ?>
                                                                </tr>
                                                            <?php endforeach ?>
                                                </table>
                                            </div>
                                        </div>
                                <a href="<?=BASE_PATH?>order_history" class="btn btn-bold">Quay Lại</a>
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