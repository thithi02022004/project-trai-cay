<?php 
   require_once "header.php";
        extract($data);
        foreach ($count as $key => $count) {
            
            $number = $count['COUNT(*)'];
        }
        $page = ceil($number / SHOP_LIMIT);
      
        
                                       
   ?>
   
   
   <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Organic Fruits</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="#" class="permal-link">Natural Organic</a></li>
                <li class="nav-item"><span class="current-page">Fresh Fruit</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="block-item recently-products-cat md-margin-bottom-39">
                        <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":30}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                            <?php foreach ($shop_discount as $key => $pro) : ?>
                                <li class="product-item">
                                    <div class="contain-product layout-02">
                                        <div class="product-thumb">
                                            <a href="<?=BASE_PATH?>product_detail/<?=$pro['Slug']?>" class="link-to-product">
                                                <img src="<?=BASE_PATH?>public/frontend/assets/images/products/<?=$pro['Image']?>" alt="dd" width="270" height="270" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <b class="categories">Giảm: <?=$pro['Discount']?> %</b>
                                            <h4 class="product-title"><a href="#" class="pr-name"><?=$pro['ProductName']?></a></h4>
                                            <div class="price">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span><?=number_format($pro['Price'])?></span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span><?=number_format($pro['Price'])?></span></del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <div class="product-category grid-style">

                        <div id="top-functions-area" class="top-functions-area">
                          
                                <div class="row">
                                    <a style="margin-left:25px" href="<?=BASE_PATH?>shop&high_to_low">Giá cao đến thấp </a>
                                    <a style="margin-left:25px" href="<?=BASE_PATH?>shop&low_to_high">Giá Thấp đến cao </a>
                                    <a style="margin-left:25px" href="<?=BASE_PATH?>shop&discount">Giảm giá </a>
                                    <a style="margin-left:25px" href="<?=BASE_PATH?>shop&view">Lượt xem </a>
                                    <a style="margin-left:25px" href="<?=BASE_PATH?>shop&sold">Lượt mua </a>
                                </div>
                           
                        </div>

                        <div class="row">pro_where_cate
                            <ul class="products-list">
                                <?php if (isset($slug)) : ?>
                                    <?php foreach ($pro_where_cate as $key => $pro) : ?>
                                        <li class="product-item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                            <div class="contain-product layout-default">
                                                <div class="product-thumb">
                                                    <a href="<?=BASE_PATH?>product_detail/<?=$pro['Slug']?>" class="link-to-product">
                                                        <img src="<?=BASE_PATH?>public/frontend/assets/images/products/<?=$pro['Image']?>" alt="dd" width="270" height="270" class="product-thumnail">
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <!-- <b class="categories">Fresh Fruit</b> -->
                                                    <h4 class="product-title"><a href="#" class="pr-name"><?=$pro['ProductName']?></a></h4>
                                                    <div class="price">
                                                        <ins><span class="price-amount"><span class="currencySymbol">£</span><?=number_format($pro['Price'])?></span></ins>
                                                        <del><span class="price-amount"><span class="currencySymbol">£</span><?=number_format($pro['Price'])?></span></del>
                                                    </div>
                                                    <!-- <div class="shipping-info">
                                                        <p class="shipping-day">3-Day Shipping</p>
                                                        <p class="for-today">Pree Pickup Today</p>
                                                    </div> -->
                                                    <div class="slide-down-box">
                                                        <p class="message"><?=$pro['Description']?></p>
                                                        <div class="buttons">
                                                            <a href="<?=BASE_PATH?>add_whislist&id=<?=$pro['ProductID']?>" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                            <a href="<?=BASE_PATH?>add_cart&id=<?=$pro['ProductID']?>" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Thêm vào giỏ</a>
                                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <?php foreach ($shop as $key => $pro) : ?>
                                        <li class="product-item col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                            <div class="contain-product layout-default">
                                                <div class="product-thumb">
                                                    <a href="<?=BASE_PATH?>product_detail/<?=$pro['Slug']?>" class="link-to-product">
                                                        <img src="public/frontend/assets/images/products/<?=$pro['Image']?>" alt="dd" width="270" height="270" class="product-thumnail">
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <!-- <b class="categories">Fresh Fruit</b> -->
                                                    <h4 class="product-title"><a href="#" class="pr-name"><?=$pro['ProductName']?></a></h4>
                                                    <div class="price">
                                                        <ins><span class="price-amount"><span class="currencySymbol">£</span><?=number_format($pro['Price'])?></span></ins>
                                                        <del><span class="price-amount"><span class="currencySymbol">£</span><?=number_format($pro['Price'])?></span></del>
                                                    </div>
                                                    <!-- <div class="shipping-info">
                                                        <p class="shipping-day">3-Day Shipping</p>
                                                        <p class="for-today">Pree Pickup Today</p>
                                                    </div> -->
                                                    <div class="slide-down-box">
                                                        <p class="message"><?=$pro['Description']?></p>
                                                        <div class="buttons">
                                                            <a href="<?=BASE_PATH?>add_whislist&id=<?=$pro['ProductID']?>" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                            <a href="<?=BASE_PATH?>add_cart&id=<?=$pro['ProductID']?>" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Thêm vào giỏ</a>
                                                            <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </ul>
                        </div>

                        <div class="biolife-panigations-block">
                            <ul class="panigation-contain">
                                <!-- <li><span class="current-page"><a href="<?=BASE_PATH?>product&page=1">1</a></span></li>
                                <li><span class="current-page"><a href="<?=BASE_PATH?>product&page=2">2</a></span></li>
                                <li><span class="current-page"><a href="<?=BASE_PATH?>product&page=3">3</a></span></li> -->
                                <!-- <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li> -->
                                        <?php
                                            $url = $_GET['price'] ?? '';
                                        ?>
                                            <?php if (isset($slug)) :?>
                                                <?php 
                                                for ($i=1; $i <= $page  ; $i++) { 
                                                    echo '<li><span class="current-page"><a href="product&page='.$i.'">'.$i.'</a></span></li>';
                                                }
                                            ?>
                                            <?php endif ?>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
<?php require_once "footer.php" ?>