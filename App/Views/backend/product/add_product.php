<?php 
    require_once "../trai-cay/App/Views/backend/header.php";
    require_once "../trai-cay/App/Views/backend/sidebar.php";
    
    extract($data);
?>
<div class="main-content">
    <form action="<?=BASE_PATH?>insert_product" method="post" enctype="multipart/form-data">
        <section class="section">
            <div class="section-body">
                    <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Thêm Mới sản phẩm</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Chọn danh mục sản phẩm</label>
                                        <div class="selectgroup w-100">
                                                <?php foreach ($list_category as $key => $cate) : ?>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="category" value="<?=$cate['CategoryID']?>" class="selectgroup-input-radio" checked>
                                                        <span class="selectgroup-button"><?=$cate['CategoryName']?></span>
                                                    </label>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                <div class="form-group">
                                    <label class="form-label">Chọn thương hiệu sản phẩm</label>
                                        <div class="selectgroup w-100">
                                                <?php foreach ($list_brand as $key => $br) : ?>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="brand" value="<?=$br['BrandID']?>" class="selectgroup-input-radio" checked>
                                                        <span class="selectgroup-button"><?=$br['BrandName']?></span>
                                                    </label>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    <div class="row" style="display: flex;justify-content: space-around;">
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" name="name" style="width: 400px" id="title" onkeyup="ChangeToSlug();" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input type="text" name="slug" style="width: 400px" id="slug" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" name="img[]" style="width: 400px" class="form-control" multiple>
                                        </div>
                                    </div>
                                    <div class="row" style="display: flex;justify-content: space-around;">
                                        <div class="form-group">
                                            <label>Giá tiền</label>
                                            <input type="text" name="price" style="width: 400px" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input type="text" name="quantity" style="width: 400px" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>% giảm giá</label>
                                            <input type="text" name="discount" style="width: 400px" class="form-control">
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea rows="4" cols="4" name="desc" class="form-control"></textarea>
                                            <!-- <input type="text"  style="width: 400px" class="form-control"> -->
                                        </div>
                                <div class="form-group">
                                    <label class="form-label">Trạng thái sản phẩm</label>
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