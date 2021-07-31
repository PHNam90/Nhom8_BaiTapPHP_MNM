<?php 
	include "models/CartModel.php";
	class CartController extends Controller{
		use CartModel;
		public function __construct(){
			if(isset($_SESSION["cart"]) == false)
				$_SESSION["cart"] = array();
		}
		public function create(){
			$MaSP = isset($_GET["MaSP"]) ? $_GET["MaSP"] : 0;
			$this->cartAdd($MaSP);
			header("location:index.php?controller=products&action=detail&MaSP=$MaSP");
		}
		public function index(){
			$this->loadView("CartView.php");
		}
		public function delete(){
			$MaSP = isset($_GET["MaSP"]) ? $_GET["MaSP"] : 0;
			$this->cartDelete($MaSP);
			header("location:index.php?controller=cart");
		}
		public function destroy(){
			$this->cartDestroy($MaSP);
			header("location:index.php?controller=cart");
		}
		public function update(){
			foreach($_SESSION["cart"] as $product){
				$MaSP = $product["MaSP"];
				$quantity = $_POST["product_$MaSP"];
				$this->cartUpdate($MaSP,$quantity);
			}
			header("location:index.php?controller=cart");
		}
		//thanh toan gio hang
		public function checkout(){
			if(isset($_SESSION["khachhang"]) == false)
				header("location:index.php?controller=account&action=login");
			else{
				header("location:index.php?controller=cart&action=pay");}
		}
		public function pay(){
			$this->loadView("PayView.php");
		}
		public function checkpay(){
			$this->cartCheckOut();
			header("location:index.php?controller=account&action=success");
		}
	}
 ?>