<?php 
    require_once "../trai-cay/App/Views/backend/header.php";
    require_once "../trai-cay/App/Views/backend/sidebar.php";
    
    extract($data);
?>
<div class="main-content">
    <form action="<?=BASE_PATH?>update_blog&id=<?=$blog['BlogID']?>" method="post" enctype="multipart/form-data">
        <section class="section">
            <div class="section-body">
                    <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Thêm Mới blog</h4>
                            </div>
                            <div class="card-body">
                                <div class="row" style="justify-content: space-around;">
                                    <div class="form-group">
                                        <label>Tên Bài Viết</label>
                                        <input type="text" name="name" value="<?=$blog['Topic']?>" id="title" onkeyup="ChangeToSlug();" class="form-control" style="width:450px">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text" name="slug" value="<?=$blog['Slug']?>" style="width: 400px" id="slug" class="form-control" style="width:450px">
                                    </div>
                                </div>
                                <div class="row" style="justify-content: space-around;">
                                    <div class="form-group">
                                        <label>Hình ảnh 1</label>
                                        <input type="file" name="img1" class="form-control" multiple>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh 2</label>
                                        <input type="file" name="img2" class="form-control" multiple>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh 3</label>
                                        <input type="file" name="img3" class="form-control" multiple>
                                    </div>
                               </div>
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea id="detail" name="content" class="form-control" rows="10"><?=$blog['Content']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Đường dẫn</label>
                                    <input type="text" value="<?=$blog['URL']?>" name="url_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Trạng thái blog</label>
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