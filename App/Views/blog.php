<?php 
    require_once "header.php";
    extract($data);
    // var_dump($product);
   
?>
    
<!-- Page Contain -->
<div class="page-contain blog-page">
        <div class="container">
            <!-- Main content -->
            <div id="main-content" class="main-content">

                <div class="row">

                    <!--articles block-->
                    <ul class="posts-list main-post-list">
                        <?php foreach ($list_blog as $key => $blog) :?>
                            <li class="post-elem col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="post-item effect-04 style-bottom-info">
                                    <div class="thumbnail">
                                        <a href="<?=BASE_PATH?>blog_detail/<?=$blog['Slug']?>" class="link-to-post"><img src="<?=BASE_PATH?>public/frontend/assets/images/products/<?=$blog['Image1']?>" width="370" height="270" alt=""></a>
                                    </div>
                                    <div class="post-content">
                                        <h4 class="post-name"><a href="<?=BASE_PATH?>blog_detail/<?=$blog['Slug']?>" class="linktopost"><?=$blog['Topic']?></a></h4>
                                        <p class="excerpt"><?= substr($blog['Content'], 0, 100)  ?>...</p>
                                        <div class="group-buttons">
                                            <a href="<?=BASE_PATH?>blog_detail/<?=$blog['Slug']?>" class="btn readmore">Đọc ngay</a>
                                            <!-- <a href="#" class="btn count-number liked"><i class="biolife-icon icon-heart-1"></i><span class="number">20</span></a>
                                            <a href="#" class="btn count-number commented"><i class="biolife-icon icon-conversation"></i><span class="number">06</span></a> -->
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach ?>
                    </ul>

                </div>

                <!--Panigation Block-->
                <div class="biolife-panigations-block ">
                    <ul class="panigation-contain">
                        <li><span class="current-page">1</span></li>
                        <li><a href="#" class="link-page">2</a></li>
                        <li><a href="#" class="link-page">3</a></li>
                        <li><span class="sep">....</span></li>
                        <li><a href="#" class="link-page">20</a></li>
                        <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

<?php 
    require_once "footer.php"
?>