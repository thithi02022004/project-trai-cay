<?php 
    require_once "../Trai-Cay//App/Views/backend/header.php";
    require_once "../Trai-Cay//App/Views/backend/sidebar.php";
    
    extract($data);
?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header" style="display: flex;justify-content: space-between;">
                                            <h4>Danh Sách Danh Mục</h4>
                                            <a href="<?=BASE_PATH?>add_category" class="btn btn-info" >Thêm</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-md">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tên</th>
                                                        <!-- <th>Hình ảnh</th> -->
                                                        <th>Trạng thái</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                   <?php foreach ($list_category as $key => $cate) : ?>
                                                        <tr>
                                                            <td><input type="checkbox" value="<?=$cate['CategoryID']?>"></td>
                                                            <td><?=$cate['CategoryName']?></td>
                                                            <td>
                                                                <?php if ($cate['Status'] == 1 ) : ?>
                                                                    <a href="<?=BASE_PATH?>update_status&id=<?=$cate['CategoryID']?>&status=<?=$cate['Status']?>" class="btn btn-success" >Hoạt động</a>
                                                                <?php elseif($cate['Status'] == 2 ) :?>
                                                                    <a href="<?=BASE_PATH?>update_status&id=<?=$cate['CategoryID']?>&status=<?=$cate['Status']?>" class="btn btn-danger" >Tạm ngưng</a>
                                                                <?php endif ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?=BASE_PATH?>edit_cate&id=<?=$cate['CategoryID']?>" class="btn btn-warning">Sửa</a>
                                                                <a href="<?=BASE_PATH?>delete_cate&id=<?=$cate['CategoryID']?>" class="btn btn-danger">Xóa</a>
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