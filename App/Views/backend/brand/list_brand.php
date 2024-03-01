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
                                            <h4>Danh Sách Thương hiệu</h4>
                                            <a href="<?=BASE_PATH?>add_brand" class="btn btn-info" >Thêm</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-md">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tên</th>
                                                        <th>Slug</th>
                                                        <th>Mô tả</th>
                                                        <th>Trạng thái</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                   <?php foreach ($list_brand as $key => $brand) : ?>
                                                        <tr>
                                                            <td><input type="checkbox" value="<?=$brand['BrandID']?>"></td>
                                                            <td><?=$brand['BrandName']?></td>
                                                            <td><?=$brand['Slug']?></td>
                                                            <td><?=$brand['Description']?></td>
                                                            <td>
                                                                <?php if ($brand['Status'] == 1 ) : ?>
                                                                    <a href="<?=BASE_PATH?>update_status_br&id=<?=$brand['BrandID']?>&sta=<?=$brand['Status']?>" class="btn btn-success" >Hoạt động</a>
                                                                <?php elseif($brand['Status'] == 2 ) :?>
                                                                    <a href="<?=BASE_PATH?>update_status_br&id=<?=$brand['BrandID']?>&sta=<?=$brand['Status']?>" class="btn btn-danger" >Tạm ngưng</a>
                                                                <?php endif ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?=BASE_PATH?>edit_brand&id=<?=$brand['BrandID']?>" class="btn btn-warning">Sửa</a>
                                                                <a href="<?=BASE_PATH?>delete_brand&id=<?=$brand['BrandID']?>" class="btn btn-danger">Xóa</a>
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