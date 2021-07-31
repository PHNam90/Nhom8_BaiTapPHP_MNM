<?php 
  //load LayoutTrangChu.php
$this->layoutPath = "LayoutTrangChu.php";
?>

<div class="container">
  <div class="row clearfix">
    <div class="product-left">
      <div id="surround">
        <div class="blockImage">
          <img class="product-image-feature" data-zoom-image="assets/upload/products/<?php echo $record->Anh; ?>" src="assets/upload/products/<?php echo $record->Anh; ?>" alt="<?php echo $record->TenSP; ?>">
        </div>
        <div class="thumb-mt20 visible-xs visible-sm">
          <div id="sliderproduct" class="owl-carousel owl-theme">
            <div class="item">
              <img alt="<?php echo $record->TenSP; ?>" src="assets/upload/products/<?php echo $record->Anh; ?>" data-image="assets/upload/products/<?php echo $record->Anh; ?>">
            </div>
            <div class="item">
              <img alt="<?php echo $record->name; ?>" src="assets/upload/products/<?php echo $record->Anh; ?>" data-image="assets/upload/products/<?php echo $record->Anh; ?>">
            </div>
          </div>
        </div>
        <div id="sliderproduct-pc" class="hidden-xs hidden-sm" style="display:none;">
          <ul class="slides">
            <li class="product-thumb">
              <a href="javascript:" data-image="assets/upload/products/<?php echo $record->Anh; ?>" data-zoom-image="assets/upload/products/<?php echo $record->Anh; ?>">
                <img alt="<?php echo $record->TenSP; ?>" data-image="assets/upload/products/<?php echo $record->Anh; ?>" src="assets/upload/products/<?php echo $record->Anh; ?>">
              </a>
            </li>
            <li class="product-thumb">
              <a href="javascript:" data-image="assets/upload/products/<?php echo $record->Anh; ?>" data-zoom-image="assets/upload/products/<?php echo $record->Anh; ?>">
                <img alt="<?php echo $record->name; ?>" data-image="assets/upload/products/<?php echo $record->Anh; ?>" src="assets/upload/products/<?php echo $record->Anh; ?>">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="product-right" style="margin-top: 0px !important;">
      <h3 class="tp_product_detail_name"><?php echo $record->TenSP; ?></h3>
      <h6>Danh mục:&nbsp; <span> <?php echo $this->getCategory($record->MaDM); ?> </h6>
      <div class="product-price" id="price-preview2">
        <span class="tp_product_detail_price" style="text-decoration:line-through;"> <?php echo number_format($record->Gia); ?>₫ </span>
        <p><span class="tp_product_detail_price"> <?php echo number_format($record->Gia-($record->Gia*$record->GiamGia)/100); ?>₫ </span></p>
      </div>
      <div id="add-item-form" class="variants clearfix">
        <div class="action_btn">
       <form action="index.php?controller=cart&action=create&MaSP=<?php echo $record->MaSP; ?>" method="post">
            <div class="select-wrapper number-wrapper">
              <label>Số lượng</label>
            <input type="number" id="pview-qtt" value="1" min="1" max="5000" class="text-center" name="sl"></div>
          <button type="submit" id="AddToCart" class="btnBuyNow " data-psid="12074411" data-selId="12074411" title="" data-ck="1" onclick="alert('Thêm vào giỏ hàng thành công')" >Thêm vào giỏ</button>
      </form>
          <a href="index.php?controller=cart&action=pay"><button id="buyNow" class="btnBuyNow " data-psid="12074411" data-selId="12074411" title="" data-ck="1" >Mua ngay</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
