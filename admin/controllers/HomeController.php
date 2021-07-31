<?php 
	class HomeController extends Controller{
		//ham tao - check login
		public function __construct(){
			$this->authentication();
		}
		public function index(){
			//load view
			$this->loadView("Layout.php");
		}
	}
 ?>