<input type="hidden" id="checkStoreId" value="39301">
        <div class="header">
            <div class="header-top tp_header clearfix hidden-xs hidden-sm">
                <div class="container">
                    <h1 class="logo">
                        <a href="#" class="brand">
                            <img class="lazyload" data-sizes="auto" data-src="assets/frontend/images/store_1548917977_950.png" alt="Home"/>
                        </a>
                    </h1>
                    <?php 
                    $number = 0;
                    if(isset($_SESSION['cart'])){
                        foreach ($_SESSION['cart'] as $value) {
                            $number++;
                        }
                    }
                    ?>
                    <div class="user-cart hidden-xs hidden-sm">
                        <?php if(isset($_SESSION["khachhang"]) == false): ?>
                        <a href="index.php?controller=account&action=login">Đăng nhập</a>
                        <?php else: ?>
                          <a href="index.php?controller=account&action=personal"><?php echo $_SESSION["khachhang"]['TenKH']; ?></a>&nbsp; &nbsp;<a href="index.php?controller=account&action=logout">Đăng xuất</a>
                        <?php endif; ?>
                        <a href="index.php?controller=cart" class="cart-top">
                            Giỏ hàng<span class="cart-count"><?php echo $number; ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-bottom clearfix hidden-xs hidden-sm">
                <div class="container">
                    <div class="menu-center">
                        <ul class="main-menu tp_menu clearfix">
                            <li class="">
                                <a class="tp_menu_item" href="index.php">Trang chủ</a>
                            </li>
                            <?php 
                              //load cap 1
                             $categories = $this->modelGetCategories();
                              ?>
                            <?php foreach($categories as $rows): ?>
                             <li class="has-child">
                                <a href="index.php?controller=products&action=categories&MaDM=<?php echo $rows->MaDM; ?>"><?php echo $rows->TenDM; ?></a>
                                 <ul class="child">
                                          <?php 
                                            //load cap 2
                                            $categoriesSub = $this->modelGetCategoriesSub($rows->MaDM);
                                         ?>
                                         <?php foreach($categoriesSub as $rowsSub): ?>
                                        <li style="padding-left:20px;"><a href="index.php?controller=products&action=categories&MaDM=<?php echo $rowsSub->MaDM; ?>"><?php echo $rowsSub->TenDM ?></a></li>
                                          <?php endforeach; ?>
                                </ul>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>