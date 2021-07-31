<?php 
	include "models/HeaderModel.php";
	class HeaderController extends Controller{
		use HeaderModel;
		public function index(){
			//load view
			$this->loadView("HeaderView.php");
		}
	}
 ?>