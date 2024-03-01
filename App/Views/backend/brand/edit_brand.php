<?php 
    require_once "../trai-cay/App/Views/backend/header.php";
    require_once "../trai-cay/App/Views/backend/sidebar.php";
    
    extract($data);
?>
<div class="main-content">
    <form action="<?=BASE_PATH?>update_brand&id=<?=$get_one_brand['BrandID']?>" method="post">
        <section class="section">
            <div class="section-body">
                    <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Cập nhật thương hiệu</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên thương hiệu</label>
                                    <input type="text" name="name" value="<?=$get_one_brand['BrandName']?>" id="title" onkeyup="ChangeToSlug();" class="form-control">
                                    <label>Slug</label>
                                    <input type="text" name="slug" value="<?=$get_one_brand['Slug']?>" id="slug" class="form-control">
                                    <label>Mô tả</label>
                                    <input type="text" name="desc" value="<?=$get_one_brand['Description']?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Trạng thái thương hiệu</label>
                                    <div class="selectgroup w-100">
                                        <?php if ($get_one_brand['Status'] == 1) :?>
                                            <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input-radio" checked>
                                            <span class="selectgroup-button">Hoạt Động</span>
                                            </label>
                                            <label class="selectgroup-item">
                                            <input type="radio" name="status" value="2" class="selectgroup-input-radio">
                                            <span class="selectgroup-button">Tạm Ngưng</span>
                                            </label>
                                        <?php elseif($get_one_brand['Status'] == 2) : ?>
                                            <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input-radio" >
                                            <span class="selectgroup-button">Hoạt Động</span>
                                            </label>
                                            <label class="selectgroup-item">
                                            <input type="radio" name="status" value="2" class="selectgroup-input-radio" checked>
                                            <span class="selectgroup-button">Tạm Ngưng</span>
                                            </label>
                                        <?php endif ?>
                                        
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