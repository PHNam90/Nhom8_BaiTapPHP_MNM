<?php 
  //load LayoutTrangChu.php
$this->layoutPath = "LayoutTrangChu.php";
?>
<script type="text/javascript">
  $(document).ready(function(){
  $(".item-quantity").click(function(){
      $( "#update_cart" ).trigger( "click" );
      });
  });
</script>
<div class="container">
  <form action="index.php?controller=cart&action=update" method="post">
  <div class="row">
    <div id="layout-page" class="col-md-12">
      <div class="main-title2 mb30">
        <h1>Giỏ hàng</h1>
      </div>
      <div id="cartformpage" class="pb30">
        <table class="cart cart-hidden">
          <thead>
            <tr>
              <th class="image">Hình ảnh</th>
              <th class="item">Tên sản phẩm</th>
              <th class="price">Giá bán lẻ</th>
              <th class="qty">Số lượng</th>
              <th class="remove">Xoá</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($_SESSION["cart"] as $product): ?>
            <tr class="item">
              <td class="image">
                <div class="product_image">
                  <a href="index.php?controller=products&action=detail&MaSP=<?php echo $product['MaSP']; ?>">
                    <img class="lazyload" data-sizes="auto" src="assets/upload/products/<?php echo $product['Anh']; ?>" data-src="assets/upload/products/<?php echo $product['Anh']; ?>"/>
                  </a>
                </div>
              </td>
              <td class="item">
                <a href="index.php?controller=products&action=detail&MaSP=<?php echo $product['MaSP']; ?>">
                  <strong><?php echo $product['TenSP']; ?></strong>
                </a>
              </td>
              <td class="price"><?php echo number_format($product['Gia']); ?>₫</td>
              <td class="qty">
                <input type="number" id="quantity" min="1" class="item-quantity" value="<?php echo $product['SoLuong']; ?>" name="product_<?php echo $product['MaSP']; ?>" required="Không thể để trống">
              </td>
              <td class="remove">
                <a href="index.php?controller=cart&action=delete&MaSP=<?php echo $product['MaSP']; ?>" rel="nofollow" class="cart remove_cart" ></a>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php if($this->cartNumber() > 0): ?>
            <tr class="summary">
              <td class="image"></td>
              <td>
                  <a style="    width: 110px;display: block; line-height: 34px; margin-top: 10px;  background: #c6ab7f; color: #fff; text-transform: uppercase; float: left;" class="button-default" href="index.php?controller=cart&action=destroy" class="button pull-left" onclick="return confirm('Bạn có chắc chắn muốn xóa giỏ hàng')">Xóa toàn bộ</a>
                  <input id="update_cart" style="display: none; width:100px; margin-right: 10px; float: right; " type="submit" class="button-default" value="Cập nhật">
              </td>
              <td style="font-size: 20px; text-transform: uppercase;">Tổng tiền</td>
              <td class="price">
                <span class="total" style="font-size: 25px;">
                  <strong><?php echo number_format($this->cartTotal()); ?>₫</strong>
                </span>
              </td>
              <td>&nbsp;</td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
        <div class="cart-buttons inner-right inner-left">
          <div class="buttons clearfix text-right">
            <button type="button" id="update-cart" class="button-default" name="update" onclick="location.href = 'index.php'">Tiếp tục mua sắm</button>
            <?php if($this->cartNumber() > 0): ?>
            <button type="button" id="checkout" class="button-default" onclick="location.href = 'index.php?controller=cart&action=checkout'">Thanh toán
            </button>
          <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
</div>