<?php 
	//load file model
	include "models/ProductsModel.php";
	class ProductsController extends Controller{
		use ProductsModel;
		public function __construct(){
			$this->authentication();
		}
		public function index(){
			$recordPerPage = 10;
			$numPage = ceil($this->modelTotal()/$recordPerPage);
			$data = $this->modelRead($recordPerPage);
			$this->loadView("ProductsView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//update
		public function update(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$action = "index.php?controller=products&action=updatePost&id=$id";
			$record = $this->modelGetRecord($id);
			//goi view
			$this->loadView("ProductsForm.php",["record"=>$record,"action"=>$action]);
		}
		//update - POST
		public function updatePost(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->modelUpdate($id);
			header("location:index.php?controller=products");
		}
		//create
		public function create(){
			$action = "index.php?controller=products&action=createPost";
			$this->loadView("ProductsForm.php",["action"=>$action]);		
		}
		//crete POST
		public function createPost(){
			$this->modelCreate();
			header("location:index.php?controller=products");
		}
		//delete
		public function delete(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->modelDelete($id);
			//quay tro lai mvc products
			header("location:index.php?controller=products");
		}
	}
 ?>