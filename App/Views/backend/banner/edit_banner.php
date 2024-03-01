<?php 
    require_once "../trai-cay/App/Views/backend/header.php";
    require_once "../trai-cay/App/Views/backend/sidebar.php";
    
    extract($data);
?>
<div class="main-content">
    <form action="<?=BASE_PATH?>update_banner&id=<?=$one_banner['BannerID']?>" method="post" enctype="multipart/form-data">
        <section class="section">
            <div class="section-body">
                    <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Thêm Mới Banner</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên Banner</label>
                                    <input type="text" value="<?=$one_banner['Title']?>" name="name" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" name="img" class="form-control" multiple>
                                </div>
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <input type="text" value="<?=$one_banner['Content']?>" name="content" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Đường dẫn</label>
                                    <input type="text" value="<?=$one_banner['URL']?>" name="url_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Trạng thái Banner</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                        <input type="radio" name="status" value="1" class="selectgroup-input-radio" checked>
                                        <span class="selectgroup-button">Hoạt Động</span>
                                        </label>
                                        <label class="selectgroup-item">
                                        <input type="radio" name="status" value="2" class="selectgroup-input-radio">
                                        <span class="selectgroup-button">Tạm Ngưng</span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-icon btn-lg btn-success"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </section>
    </form>
</div>     
<?php 
    require_once "../trai-cay/App/Views/backend/footer.php";
?>