<?php 
    require_once "../trai-cay/App/Views/backend/header.php";
    require_once "../trai-cay/App/Views/backend/sidebar.php";
    
    extract($data);
    // var_dump($one_product['CategoryID']); die();
    $html_catid = '';
    $html_brid = '';
        foreach ($list_category as $item) {
            if ($item['CategoryID'] == $one_product['CategoryID']) {
                $html_catid .= '<option selected value="' . $item['CategoryID'] . '">' . $item['CategoryName'] . '</option>';
            } else {
                $html_catid .= '<option value="' . $item['CategoryID'] . '">' . $item['CategoryName'] . '</option>';
            }
            }
        foreach ($list_brand as $item) {
            if ($item['BrandID'] == $one_product['BrandID']) {
                $html_brid .= '<option selected value="' . $item['BrandID'] . '">' . $item['BrandName'] . '</option>';
            } else {
                $html_brid .= '<option value="' . $item['BrandID'] . '">' . $item['BrandName'] . '</option>';
            }
            }
?>
<div class="main-content">
    <form action="<?=BASE_PATH?>update_product&id=<?=$one_product['ProductID']?>" method="post" enctype="multipart/form-data">
        <section class="section">
            <div class="section-body">
                    <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Cập nhật sản phẩm</h4>
                            </div>
                            <div class="card-body">
                                    <div class="row" style="display: flex; justify-content: space-around;">
                                        <div class="form-group">
                                            <label for="catid">Danh mục sản phẩm</label>
                                            <select id="catid" name="category" class="form-control custom-select">
                                                <option selected>[--Chọn Danh mục--]</option>
                                                <?= $html_catid ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="brid">Thương hiệu sản phẩm</label>
                                        <select id="brid" name="brand" class="form-control custom-select">
                                            <option selected>[--Chọn thương hiệu--]</option>
                                            <?= $html_brid ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row" style="display: flex;justify-content: space-around;">
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" name="name" value="<?=$one_product['ProductName']?>" style="width: 400px" id="title" onkeyup="ChangeToSlug();" class="form-control">
                                            <input type="hidden" name="ProductID" value="<?=$one_product['ProductID']?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input type="text" name="slug" value="<?=$one_product['Slug']?>" style="width: 400px" id="slug" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh mô tả</label>
                                            <input type="file" name="img[]"  style="width: 400px" class="form-control" multiple>
                                        </div>
                                    </div>
                                    <div class="row" style="display: flex;justify-content: space-around;">
                                        <div class="form-group">
                                            <label>Giá tiền</label>
                                            <input type="text" name="price" value="<?=$one_product['Price']?>" style="width: 400px" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input type="text" name="quantity" value="<?=$one_product['StockQuantity']?>" style="width: 400px" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>% giảm giá</label>
                                            <input type="text" name="discount" value="<?=$one_product['Discount']?>" style="width: 400px" class="form-control">
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea rows="4" cols="4" name="desc" class="form-control"><?=$one_product['Description']?></textarea>
                                            <!-- <input type="text"  style="width: 400px" class="form-control"> -->
                                        </div>
                                <div class="form-group">
                                    <label class="form-label">Trạng thái sản phẩm</label>
                                    <div class="selectgroup w-100">
                                    <?php if ($one_product['Status'] == 1) :?>
                                            <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input-radio" checked>
                                            <span class="selectgroup-button">Hoạt Động</span>
                                            </label>
                                            <label class="selectgroup-item">
                                            <input type="radio" name="status" value="2" class="selectgroup-input-radio">
                                            <span class="selectgroup-button">Tạm Ngưng</span>
                                            </label>
                                        <?php elseif($one_product['Status'] == 2) : ?>
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