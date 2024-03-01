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
                                            <h4>Danh Sách Config</h4>
                                            <a href="<?=BASE_PATH?>insert_config" class="btn btn-info" >Thêm</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-md">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Logo</th>
                                                        <th>Email</th>
                                                        <th>SĐT</th>
                                                        <th>Địa chỉ</th>
                                                        <th>Trạng thái</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                   <?php foreach ($list_config as $key => $cf) : ?>
                                                        <tr>
                                                            <td><input type="checkbox" value="<?=$cf['ConfigID']?>"></td>
                                                            <td>
                                                                <img src="<?=BASE_PATH?>public/frontend/assets/images/products/<?=$cf['Logo']?>" alt="">
                                                            </td>
                                                            <td><?=$cf['ContactEmail']?></td>
                                                            <td><?=$cf['ContactPhone']?></td>
                                                            <td><?=$cf['Address']?></td>
                                                            <td>
                                                                <?php if ($cf['Status'] == 1 ) : ?>
                                                                    <a href="<?=BASE_PATH?>update_status_cf&id=<?=$cf['ConfigID']?>&sta=<?=$cf['Status']?>" class="btn btn-success" >Hoạt động</a>
                                                                <?php elseif($cf['Status'] == 2 ) :?>
                                                                    <a href="<?=BASE_PATH?>update_status_cf&id=<?=$cf['ConfigID']?>&sta=<?=$cf['Status']?>" class="btn btn-danger" >Tạm ngưng</a>
                                                                <?php endif ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?=BASE_PATH?>edit_config&id=<?=$cf['ConfigID']?>" class="btn btn-warning">Sửa</a>
                                                                <a href="<?=BASE_PATH?>delete_config&id=<?=$cf['ConfigID']?>" class="btn btn-danger">Xóa</a>
                                                            </td>
                                                        </tr>
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