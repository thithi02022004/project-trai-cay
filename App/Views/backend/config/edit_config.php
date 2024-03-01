<?php 
    require_once "../trai-cay/App/Views/backend/header.php";
    require_once "../trai-cay/App/Views/backend/sidebar.php";
    
    extract($data);
?>
<div class="main-content">
    <form action="<?=BASE_PATH?>update_config&id=<?=$config['ConfigID']?>" method="post" enctype="multipart/form-data">
        <section class="section">
            <div class="section-body">
                    <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Thêm Mới Config</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" name="img" class="form-control" multiple>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" value="<?=$config['ContactEmail']?>" name="email" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>SĐT</label>
                                    <input type="text" value="<?=$config['ContactPhone']?>" name="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" value="<?=$config['Address']?>" name="address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Trạng thái Config</label>
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