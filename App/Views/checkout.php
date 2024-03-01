<?php 
    require_once "header.php";
    extract($data);
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
                <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain checkout">

        <!-- Main content -->
        <!-- <form action="<?=BASE_PATH?>insert_order" name="frm-login" method="post"> -->
        <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="<?=BASE_PATH?>insert_order">
        <div id="main-content" class="main-content">
            <div class="container sm-margin-top-37px">
                <div class="row">
                    <!--checkout progress box-->
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                        <div class="checkout-progress-wrap">
                            <ul class="steps">
                                <li class="step 1st">
                                    <div class="checkout-act active">
                                        <h3 class="title-box"><span></span>Thông tin người nhận</h3>
                                        <div class="box-content">
                                            <!-- <p class="txt-desc">Checking out as a <a class="pmlink" href="#">Guest?</a> You’ll be able to save your details to create an account with us later.</p> -->
                                            <div class="login-on-checkout">
                                                <form action="#" name="frm-login" method="post">
                                                    <p class="form-row">
                                                        <input type="hidden" name="id_user" value="<?=$_SESSION['user']['CustomerID']?>">
                                                        <label for="input_fullname">Họ và tên</label>
                                                        <input style="width:100%" type="text" name="name" id="input_fullname" value="<?=$_SESSION['user']['FullName']?>" >
                                                        <label for="input_phone">SĐT</label>
                                                        <input style="width:100%" type="text" name="phone" id="input_phone" value="<?=$_SESSION['user']['Phone']?>" >
                                                        <label for="input_email">Email</label>
                                                        <input style="width:100%" type="email" name="email" id="input_email" value="<?=$_SESSION['user']['Email']?>" >
                                                        <label for="input_address">Địa chỉ</label>
                                                        <input style="width:100%" type="text" name="address" id="input_address" value="<?=$_SESSION['user']['Address']?>" >
                                                        <!-- <button type="submit" name="btn-sbmt" class="btn">Continue As Guest</button> -->
                                                    </p>
                                                    <!-- <p class="form-row">
                                                        <input type="checkbox" name="subcribe" id="input_subcribe" >
                                                        <label for="input_subcribe">Subscribe to our newsletter</label>
                                                    </p> -->
                                                    <!-- <p class="msg">Already have an account? <a href="#" class="link-forward">Sign in now</a></p> -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- <li class="step 2nd">
                                    <div class="checkout-act"><h3 class="title-box"><span class="number">2</span>Shipping</h3></div>
                                </li>
                                <li class="step 3rd">
                                    <div class="checkout-act"><h3 class="title-box"><span class="number">3</span>Billing</h3></div>
                                </li>
                                <li class="step 4th">
                                    <div class="checkout-act"><h3 class="title-box"><span class="number">4</span>Payment</h3></div>
                                </li> -->
                            </ul>
                        </div>
                    </div>

                    <!--Order Summary-->
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                        <div class="order-summary sm-margin-bottom-80px">
                            <div class="title-block">
                                <h3 class="title">Sản phẩm cần thanh toán</h3>
                                <!-- <a href="#" class="link-forward">Edit cart</a> -->
                            </div>
                            <div class="cart-list-box short-type">
                                <span class="number">Tổng <?=COUNT($_SESSION['cart'])?> Sản phẩm</span>
                                
                                <ul class="cart-list">
                                <?php $sum=0; foreach ($_SESSION['cart'] as $key => $item_cart) :?>
                                    <li class="cart-elem">
                                        <div class="cart-item">
                                            <div class="product-thumb">
                                                <a class="prd-thumb" href="#">
                                                    <figure><img src="public/frontend/assets/images/products/<?=$item_cart['img']?>" width="113" height="113" alt="shop-cart" ></figure>
                                                </a>
                                            </div>
                                            <div class="info">
                                                <a href="#" class="pr-name"><?=$item_cart['name']?></a>
                                                <span class="txt-quantity">Số lượng: <?=$item_cart['qty']?></span>
                                            </div>
                                            <div class="price price-contain">
                                                <?php $price_pro = $item_cart['price'] * $item_cart['qty'] ?>
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span><?=number_format($price_pro)?></span></ins>
                                                <input type="hidden" name="price_pro" value="<?=$price_pro?>">
                                                <input type="hidden" name="momostatus" value="2">
                                                <input type="hidden" name="productID" value="<?=$item_cart['id']?>">
                                                <!-- <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del> -->
                                            </div>
                                        </div>
                                    </li>
                                    <?php $sum += $item_cart['price'] * $item_cart['qty']; endforeach ?>
                                </ul>
                                <ul class="subtotal">
                               
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Thành tiền</b>
                                           
                                            <input type="hidden" name="total" value="<?= $sum - ($sum * $item_cart['discount'] / 100) ?>">
                                            <span class="stt-price">£<?= $sum - ($sum * $item_cart['discount'] / 100) ?></span>
                                            
                                        </div>
                                    </li>
                                    
                                </ul>
                                
                                <button type="submit" class="btn checkout" style="width: 100%;height: 50px; background-color: #00b900;font-size: 20px;font-weight: 600;color: white; margin-bottom: 20px">Thanh Toán</button>
                                
                                    
                                        <!-- <a class="btn btn-primary btn-block" href="<?=BASE_PATH?>insert_order&momo">Thanh toán bằng MOMO</a> -->
                                            <button type="submit" name="momo" class="btn btn-primary btn-block">Thanh toán bằng MOMO</button>
                                            <button type="submit" name="pay_atm" class="btn btn-primary btn-block">Thanh toán Ngân Hàng</button>
                                    
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </form>
        
    </div>
    


<?php 
    require_once "footer.php"
?>