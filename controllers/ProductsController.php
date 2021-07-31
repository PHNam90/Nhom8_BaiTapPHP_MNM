<?php 
	//load file model
	include "models/ProductsModel.php";
	class ProductsController extends Controller{
		use ProductsModel;
		public function categories(){
			$recordPerPage = 10;
			$numPage = ceil($this->modelTotal()/$recordPerPage);
			$data = $this->modelRead($recordPerPage);
			$this->loadView("ProductsCategoriesView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//chi tiet san pham
		public function detail(){
			$MaSP = isset($_GET["MaSP"])&&is_numeric($_GET["MaSP"])?$_GET["MaSP"]:0;
			$record = $this->modelGetRecord($MaSP);
			$this->loadView("ProductsDetailView.php",["record"=>$record]);
		}
	}
 ?>