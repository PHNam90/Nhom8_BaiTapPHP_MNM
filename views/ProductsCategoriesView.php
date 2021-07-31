<?php 
  //load LayoutTrangChu.php
$this->layoutPath = "LayoutTrangChu.php";
$MaDM = isset($_GET["MaDM"])&&is_numeric($_GET["MaDM"])?$_GET["MaDM"]:0;
?>
<div id="collection" class="tp_product_category">
  <div class="fix-breadcrumb">
    <ul class="breadcrumb&#x20;breadcrumb-arrow&#x20;hidden-sm&#x20;hidden-xs">
      <li>
        <a href="index.html">Trang chủ</a>
      </li>
      <li>
        <span><?php echo $this->getCategory($MaDM);?></span>
      </li>
    </ul>
  </div>
  <div class="container">
    <div class="row">
      <div class="product-lists clearfix select4">
        <?php foreach($data as $rows): ?>
          <div class="product-item" style="position: relative;">
            <div style=" z-index: 1; position: absolute; width: 30px; line-height: 30px; border-radius: 30px; background: black; color:white; text-align: center;"><?php echo $rows->GiamGia; ?>%</div>
            <div class="img">
              <a href="index.php?controller=products&action=detail&MaSP=<?php echo $rows->MaSP; ?>">
                <img class="lazyload" data-sizes="auto" src="assets/upload/products/<?php echo $rows->Anh; ?>" title="<?php echo $rows->TenSP; ?>" alt="<?php echo $rows->TenSP; ?>">
              </a>
            </div>
            <div class="info">
              <h3>
                <a class="tp_product_name" href="index.php?controller=products&action=detail&MaSP=<?php echo $rows->MaSP; ?>"><?php echo $rows->TenSP; ?></a>
              </h3>
              <div class="prices">
                <h4 style="text-decoration:line-through;" class="tp_product_price"><?php echo number_format($rows->Gia); ?>₫</h4>
              </div>
              <div class="prices">
                <h4 class="tp_product_price"><?php echo number_format($rows->Gia-($rows->Gia*$rows->GiamGia)/100); ?>₫</h4>
              </div>
            </div>
          </div>
        <?php endforeach; ?> 
      </div>
      <div class="paginate text-center">
        <div id="pagination">
          <?php 
            $a =isset($_GET["order"]) ? $_GET["order"]: "";
            $order = isset($_GET["order"]) ? "&order=$a" : "";

           ?>
           <?php if($numPage>1): ?>
              <div class="paginator">
                <span ><a rel="nofollow" class="paging-first" href="index.php?controller=products&action=categories&MaDM=<?php echo $MaDM; ?><?php echo $order ?>&page=1"></a>
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <a class="currentPage" href="index.php?controller=products&action=categories&MaDM=<?php echo $MaDM; ?><?php echo $order ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
              <?php endfor; ?> 
              <a rel="nofollow" class="paging-last" href="index.php?controller=products&action=categories&MaDM=<?php echo $MaDM; ?><?php echo $order ?>&page=<?php echo $numPage ?>"></a></span>
              </div>
          <?php endif; ?>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>