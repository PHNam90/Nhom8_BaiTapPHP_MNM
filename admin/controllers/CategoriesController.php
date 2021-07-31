<?php 
	include "models/CategoriesModel.php";
	class CategoriesController extends Controller{
		use CategoriesModel;
		public function __construct(){
			$this->authentication();
		}
		public function index(){
			$recordPerPage = 10;
			$numPage = ceil($this->modelTotal()/$recordPerPage);
			$data = $this->modelRead($recordPerPage);
			$this->loadView("CategoriesView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		public function update(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$action = "index.php?controller=categories&action=updatePost&id=$id";
			$record = $this->modelGetRecord($id);
			$this->loadView("CategoriesForm.php",["record"=>$record,"action"=>$action]);
		}
		public function updatePost(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->modelUpdate($id);
			header("location:index.php?controller=categories");
		}
		//create
		public function create(){
			$action = "index.php?controller=categories&action=createPost";
			$this->loadView("CategoriesForm.php",["action"=>$action]);		
		}
		//crete POST
		public function createPost(){
			$this->modelCreate();
			//quay tro lai mvc categories
			header("location:index.php?controller=categories");
		}
		//delete
		public function delete(){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$this->modelDelete($id);
			//quay tro lai mvc categories
			header("location:index.php?controller=categories");
		}
	}
 ?>