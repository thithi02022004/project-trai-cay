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
                                            <a href="<?=BASE_PATH?>insert_blog" class="btn btn-info" >Thêm</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-md">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tên</th>
                                                        <th>Hình ảnh</th>
                                                        <th>Nội dung</th>
                                                        <th>Đường dẫn</th>
                                                        <th>Trạng thái</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                   <?php foreach ($list_blog as $key => $blog) : ?>
                                                        <tr>
                                                            <td><input type="checkbox" value="<?=$blog['BlogID']?>"></td>
                                                            <td><?=$blog['Topic']?></td>
                                                            <td>
                                                                <img style="width: 50px" src="<?=BASE_PATH?>public/frontend/assets/images/products/<?=$blog['Image1']?>">
                                                                <img style="width: 50px" src="<?=BASE_PATH?>public/frontend/assets/images/products/<?=$blog['Image2']?>">
                                                                <img style="width: 50px" src="<?=BASE_PATH?>public/frontend/assets/images/products/<?=$blog['Image3']?>">
                                                            </td>
                                                            <td><?=substr($blog['Content'], 0, 100)?></td>
                                                            <td><?=$blog['URL']?></td>
                                                            <td>
                                                                <?php if ($blog['Status'] == 1 ) : ?>
                                                                    <a href="<?=BASE_PATH?>update_status_bl&id=<?=$blog['BlogID']?>&sta=<?=$blog['Status']?>" class="btn btn-success" >Hoạt động</a>
                                                                <?php elseif($blog['Status'] == 2 ) :?>
                                                                    <a href="<?=BASE_PATH?>update_status_bl&id=<?=$blog['BlogID']?>&sta=<?=$blog['Status']?>" class="btn btn-danger" >Tạm ngưng</a>
                                                                <?php endif ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?=BASE_PATH?>edit_blog&id=<?=$blog['BlogID']?>" class="btn btn-warning">Sửa</a>
                                                                <a href="<?=BASE_PATH?>delete_blog&id=<?=$blog['BlogID']?>" class="btn btn-danger">Xóa</a>
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