<?php
	trait CartModel{		
		public function cartAdd($MaSP){
		    if(isset($_SESSION['cart'][$MaSP])){
		        $_SESSION['cart'][$MaSP]['SoLuong']+= $_POST['sl'];
		    } else {
		        $conn = Connection::getInstance();
		        $query = $conn->prepare("select * from sanpham where MaSP=:_MaSP");
		        $query->execute(array("_MaSP"=>$MaSP));
		        $query->setFetchMode(PDO::FETCH_OBJ);
		        $product = $query->fetch();
		        //---
		        
		        $_SESSION['cart'][$MaSP] = array(
		            'MaSP' => $MaSP,
		            'TenSP' => $product->TenSP,
		            'Anh' => $product->Anh,
		            'SoLuong' => $_POST['sl'],
		            'Gia' => $product->Gia
		        );
		    }
		}
		public function cartUpdate($MaSP, $SoLuong){
		    if($SoLuong==0){
		        //xóa sp ra khỏi giỏ hàng
		        unset($_SESSION['cart'][$MaSP]);
		    } else {
		        $_SESSION['cart'][$MaSP]['SoLuong'] = $SoLuong;
		    }
		}
		public function cartDelete($MaSP){
		    unset($_SESSION['cart'][$MaSP]);
		}
		// Tổng giá trị giỏ hàng
		public function cartTotal(){
		    $total = 0;
		    foreach($_SESSION['cart'] as $product){
		        $total += $product['Gia'] * $product['SoLuong'];
		    }
		    return $total;
		}
		/**
		 * Số sản phẩm có trong giỏ hàng
		 */
		public function cartNumber(){
		    $number = 0;
		    foreach($_SESSION['cart'] as $product){
		        $number += $product['SoLuong'];
		    }
		    return $number;
		}
		/**
		 * Danh sách sản phẩm trong giỏ hàng
		 */
		public function cartList(){
		    return $_SESSION['cart'];
		}
		/**
		 * Xóa giỏ hàng
		 */
		public function cartDestroy(){
		    $_SESSION['cart'] = array();
		}
		//=============
		//checkout
		public function cartCheckOut(){
			//---
			$conn = Connection::getInstance();
			//lay id vua moi insert
			$MaKH = $_SESSION["khachhang"]['MaKH'];
			$GhiChu = $_POST['GhiChu'];
			$query = $conn->query("insert into donhang(MaKH,GhiChu) values($MaKH,'$GhiChu')");
			$MaDH = $conn->lastInsertId();
			foreach($_SESSION["cart"] as $product){
				$query = $conn->prepare("insert into chitietdonhang set MaDH=:_MaDH, MaSP=:_MaSP, DonGia=:_DonGia, SoLuong=:_SoLuong");
				$query->execute(array("_MaDH"=>$MaDH,"_MaSP"=>$product["MaSP"],"_DonGia"=>$product["Gia"],"_SoLuong"=>$product["SoLuong"]));
			}
			//xoa gio hang
			unset($_SESSION["cart"]);
		}
	}	
?>