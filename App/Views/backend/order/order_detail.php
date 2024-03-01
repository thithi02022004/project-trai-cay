<?php 
    require_once "../trai-cay/App/Views/backend/header.php";
    require_once "../trai-cay/App/Views/backend/sidebar.php";
    extract($data);
?>
<div class="main-content">

        <section class="section">
          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                <?php foreach ($list_order as $key => $order) :?>
                  <div class="col-lg-12">
                    <div class="invoice-title">
                      <h2>Hóa đơn mua hàng</h2>
                      <div class="invoice-number">Mã đơn: <?=$order['OrderID']?></div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          
                          <strong>Tên: <?=$order['customerName']?></strong><br>
                          <b>Email:</b> <?=$order['customerEmail']?><br>
                          <b>Phone:</b> <?=$order['customerPhone']?><br>
                          <b>Địa chỉ:</b> <?=$order['customerAddress']?><br>
                          
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Trạng thái:</strong><br>
                            <?php if($order['ShippingStatus'] == 5) : ?>
                                <strong>Đã giao</strong>
                            <?php elseif ($order['ShippingStatus'] == 6) : ?>
                                <strong>Không thành công</strong>
                            <?php else : ?>
                                <strong>Đang giao</strong>
                            <?php endif ?>
                        </address>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Hình thức thanh toán:</strong><br>
                          Chuyển khoản <br>
                          4135423432412
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Ngày xuất hóa đơn:</strong><br>
                          <?=$order['OrderDate']?><br><br>
                        </address>
                      </div>
                    </div>
                  </div>
                  <?php endforeach ?>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Sản phẩm</div>
                    <p class="section-lead">Những sản phẩm có trong đơn</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <th data-width="40">#</th>
                          <th>Sản phẩm</th>
                          <th>Hình ảnh</th>
                          <th class="text-center">Giá tiền</th>
                          <th class="text-center">số lượng</th>
                          <th class="text-right">Thành tiền</th>
                        </tr>
                        <?php foreach ($order_detail as $key => $detail) : ?>
                        <tr>
                          <td><input type="checkbox" value="<?= $detail['OrderDetailID'] ?>"></td>
                          <td><?= $detail['ProductName'] ?></td>
                          <td>
                              <img style="width:100px; height: 100px" src="public/frontend/assets/images/products/<?= $detail['Image'] ?>" alt="">
                          </td>
                          <td class="text-center"><?= number_format($detail['UnitPrice']) ?></td>
                          <td class="text-center"><?= $detail['Quantity'] ?></td>
                          <td class="text-right"><?= number_format($detail['UnitPrice'] * $detail['Quantity']) ?></td>
                      </tr>
                      <?php endforeach ?>
                      </table>
                    </div>
                    <div class="row mt-4">
                      <div class="col-lg-8">
                        <div class="section-title">Hình thức thanh toán</div>
                        <p class="section-lead">Lựa chọn hình thức thanh toán của bạn</p>
                        <div class="images">
                          <img src="public/backend/assets/img/cards/visa.png" alt="visa">
                          <img src="public/backend/assets/img/cards/jcb.png" alt="jcb">
                          <img src="public/backend/assets/img/cards/mastercard.png" alt="mastercard">
                          <img src="public/backend/assets/img/cards/paypal.png" alt="paypal">
                        </div>
                      </div>
                      <div class="col-lg-4 text-right">
                        <!-- <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Subtotal</div>
                          <div class="invoice-detail-value">$670.99</div>
                        </div> -->
                        <!-- <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Phí ship</div>
                          <div class="invoice-detail-value"><?=number_format($order['ship'])?>đ</div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Tổng đơn</div>
                          <div class="invoice-detail-value invoice-detail-value-lg"><?=number_format($sum + $order['ship'])?>đ</div>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                  <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process
                    Payment</button>
                  <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
                </div>
                <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
              </div>
            </div>
          </div>
        </section>
        
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php 
    require_once "../trai-cay/App/Views/backend/footer.php";
?>



