<?php 
    require_once "../trai-cay/App/Views/backend/header.php";
    require_once "../trai-cay/App/Views/backend/sidebar.php";
    
    extract($data);

?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header" style="display: flex;justify-content: space-between;">
                                            <h4>Lưu trữ sản phẩm</h4>
                                            <a href="<?=BASE_PATH?>add_product" class="btn btn-info" >Thêm</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-md">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Thông tin</th>
                                                        <th>Khác</th>
                                                        <th>Hình ảnh</th>
                                                        <!-- <th>Trạng thái</th> -->
                                                        <th>Hành động</th>
                                                    </tr>
                                                   <?php foreach ($list_product as $key => $pro) : ?>
                                                    <?php if ($pro['Status'] == 3) : ?>
                                                        <tr>
                                                            <td><input type="checkbox"  value="<?=$pro['ProductID']?>"></td>
                                                            <td>
                                                                <b>Tên: </b> <?=$pro['ProductName']?><br>
                                                                <b>Danh Mục: </b> <?=$pro['cateName']?><br>
                                                                <b>Thương Hiệu: </b> <?=$pro['brName']?><br>
                                                                <b>Giá: </b> <?=number_format($pro['Price'])?> VNĐ<br>
                                                                
                                                            </td>
                                                            <td>
                                                                <b>Số lượng: </b> <?=$pro['StockQuantity']?><br>
                                                                <b>% giảm giá: </b> <?=$pro['Discount']?><br>
                                                                <b>Lượt xem: </b> <?=$pro['Views']?><br>
                                                                <b>Số lượng đã bán: </b> <?=$pro['QuantitySold']?><br>
                                                            </td>
                                                            <td>
                                                                <img src="public/frontend/assets/images/products/<?=$pro['pro_image']?>" alt="" style="width:100px; height: 100px">
                                                            </td>
                                                            <!-- <td>
                                                                <?php if ($pro['Status'] == 1 ) : ?>
                                                                    <a href="#" class="btn btn-success" >Hoạt động</a>
                                                                <?php elseif($pro['Status'] == 2 ) :?>
                                                                    <a href="#" class="btn btn-danger" >Tạm ngưng</a>
                                                                <?php endif ?>
                                                            </td> -->
                                                            <td>
                                                                <!-- <a href="<?=BASE_PATH?>edit_product&id=<?=$pro['ProductID']?>" class="btn btn-warning">Sửa</a> -->
                                                                <a href="<?=BASE_PATH?>retrash&id=<?=$pro['ProductID']?>&status=<?=$pro['Status']?>" class="btn btn-warning">Khôi phục</a>
                                                            </td>
                                                        </tr>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <nav class="d-inline-block">
                                                <ul class="pagination mb-0">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                    </div>
            </div>
        </div>
    </section>
</div>     
<?php 
    require_once "../trai-cay/App/Views/backend/footer.php";
?>