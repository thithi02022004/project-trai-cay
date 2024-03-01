<?php
    extract($data);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biolife - Organic Food</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="public/frontend/assets/images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="<?=BASE_PATH?>public/frontend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=BASE_PATH?>public/frontend/assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?=BASE_PATH?>public/frontend/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=BASE_PATH?>public/frontend/assets/css/nice-select.css">
    <link rel="stylesheet" type="text/css" href="<?=BASE_PATH?>public/frontend/assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="<?=BASE_PATH?>public/frontend/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?=BASE_PATH?>public/frontend/assets/css/main-color.css">

</head>

<body class="biolife-body">

    <!-- Preloader -->
    <!-- <div id="biof-loading">
        <div class="biof-loading-center">
            <div class="biof-loading-center-absolute">
                <div class="dot dot-one"></div>
                <div class="dot dot-two"></div>
                <div class="dot dot-three"></div>
            </div>
        </div>
    </div> -->

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">
        <div class="header-top bg-main hidden-xs">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                        <?php foreach ($list_config as $key => $cf) : ?>
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><?=$cf['ContactEmail']?></a></li>
                            <li><a href="#">Liên Hệ: <?=$cf['ContactPhone']?></a></li>
                            <li><a href="#">Văn phòng: <?=$cf['Address']?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="top-bar right">
                    <ul class="social-list">    
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="horizontal-menu">
                        <?php if (isset($_SESSION['user'])) : ?>
                            <li><a href="<?=BASE_PATH?>account" class="login-link"><i class="biolife-icon icon-login"></i>Tài khoản</a></li>
                        <?php else : ?>
                            <li><a href="<?=BASE_PATH?>login" class="login-link"><i class="biolife-icon icon-login"></i>Login/Register</a></li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-middle biolife-sticky-object ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                        <?php foreach ($list_config as $key => $cf) : ?>
                            <a href="<?=BASE_PATH?>home" class="biolife-logo"><img src="<?=BASE_PATH?>public/frontend/assets/images/products/<?=$cf['Logo']?>" alt="biolife logo" width="135" height="34"></a>
                        <?php endforeach ?>
                    </div>
                    <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                        <div class="primary-menu">
                            <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                                <li class="menu-item"><a href="<?=BASE_PATH?>home">Home</a></li>
                                <li class="menu-item menu-item-has-children">
                                    <a href="<?=BASE_PATH?>shop" class="menu-name" data-title="Shop">Sản phẩm</a>
                                </li>
                                <li class="menu-item menu-item-has-children">
                                    <a href="<?=BASE_PATH?>blog" class="menu-name" data-title="Products">Bài viết</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                        <div class="biolife-cart-info">
                            <div class="mobile-search">
                                <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                                <div class="mobile-search-content">
                                    <form action="#" class="form-search" name="mobile-seacrh" method="get">
                                        <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                        <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                                        <select name="category">
                                            <option value="-1" selected>All Categories</option>
                                            <option value="vegetables">Vegetables</option>
                                            <option value="fresh_berries">Fresh Berries</option>
                                            <option value="ocean_foods">Ocean Foods</option>
                                            <option value="butter_eggs">Butter & Eggs</option>
                                            <option value="fastfood">Fastfood</option>
                                            <option value="fresh_meat">Fresh Meat</option>
                                            <option value="fresh_onion">Fresh Onion</option>
                                            <option value="papaya_crisps">Papaya & Crisps</option>
                                            <option value="oatmeal">Oatmeal</option>
                                        </select>
                                        <button type="submit" class="btn-submit">go</button>
                                    </form>
                                </div>
                            </div>
                            <div class="wishlist-block hidden-sm hidden-xs">
                                <a href="#" class="link-to">
                                    <span class="icon-qty-combine">
                                        <i class="icon-heart-bold biolife-icon"></i>
                                        <span class="qty">
                                            <?php if (isset($whislist)) : ?>
                                                <?=Count($whislist)?>
                                            <?php else : ?>
                                                0
                                            <?php endif ?>
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <div class="minicart-block">
                                <div class="minicart-contain">
                                    <a href="javascript:void(0)" class="link-to">
                                        <span class="icon-qty-combine">
                                                <i class="icon-cart-mini biolife-icon"></i>
                                                <span class="qty">
                                                    <?php if (isset($_SESSION['cart'])) : ?>
                                                        <?=Count($_SESSION['cart'])?>
                                                    <?php else : ?>
                                                        0
                                                    <?php endif ?>
                                                </span>
                                        </span>
                                        <span class="title">Giỏ hàng -</span>
                                        <span class="sub-total">$0.00</span>
                                    </a>
                                    <div class="cart-content">
                                        <div class="cart-inner">
                                            <ul class="products">
                                                <?php foreach ($_SESSION['cart'] as $key => $cart) : ?>
                                                    <li>
                                                        <div class="minicart-item">
                                                            <div class="thumb">
                                                                <a href="#"><img src="<?=BASE_PATH?>public/frontend/assets/images/products/<?=$cart['img']?>" width="90" height="90" alt="National Fresh"></a>
                                                            </div>
                                                            <div class="left-info">
                                                                <div class="product-title"><a href="#" class="product-name"><?=$cart['name']?></a></div>
                                                                <div class="price">
                                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span><?=number_format($cart['price'])?></span></ins>
                                                                    <!-- <del><span class="price-amount"><span class="currencySymbol">£</span><?=number_format($cart['price'])?></span></del> -->
                                                                </div>
                                                                <div class="qty">
                                                                    <label for="cart[id123][qty]">số lượng:</label>
                                                                    <input type="number" class="input-qty" name="cart[id123][qty]" id="cart[id123][qty]" value="<?=$cart['qty']?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="action">
                                                                <a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                                <a href="#" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                            <p class="btn-control">
                                                <a href="<?=BASE_PATH?>cart" class="btn view-cart">Giỏ hàng</a>
                                                <a href="<?=BASE_PATH?>checkout" class="btn">Thanh toán</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-menu-toggle">
                                <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="vertical-menu vertical-category-block">
                            <div class="block-title">
                                <span class="menu-icon">
                                    <span class="line-1"></span>
                                <span class="line-2"></span>
                                <span class="line-3"></span>
                                </span>
                                <span class="menu-title">Danh mục</span>
                                <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            </div>
                            <div class="wrap-menu">
                                <ul class="menu clone-main-menu">
                                    <?php foreach ($list_category as $key => $cate) : ?>
                                    <li class="menu-item menu-item-has-children">
                                        <a href="<?=BASE_PATH?>product/<?=$cate['CategorySlug']?>" class="menu-name" data-title="Fruit & Nut Gifts"><?=$cate['CategoryName']?></a>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 padding-top-2px">
                        <div class="header-search-bar layout-01">
                            <form action="<?=BASE_PATH?>search" class="form-search" name="desktop-seacrh" method="POST">
                                <input type="text" name="search" class="input-text">
                                <select name="category">
                                    <!-- <option selected>Tất cả danh mục</option> -->
                                    <?php foreach ($list_category as $key => $cate) : ?>
                                    <li class="menu-item menu-item-has-children">
                                        <option value="<?=$cate['CategoryID']?>"><?=$cate['CategoryName']?></option>
                                    </li>
                                    <?php endforeach ?>
                                </select>
                                <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                            </form>
                        </div>
                        <div class="live-info">
                            <?php foreach ($list_config as $key => $cf) : ?>
                                <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">Liên Hệ : <?=$cf['ContactPhone']?></b></p>
                                <!-- <p class="working-time">Mon-Fri: 8:30am-7:30pm; Sat-Sun: 9:30am-4:30pm</p> -->
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>