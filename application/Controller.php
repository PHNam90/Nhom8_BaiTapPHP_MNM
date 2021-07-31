<?php 
	class Controller{
		public $view = NULL;
		public $layoutPath = NULL;
		public function loadView($fileName,$data = NULL){
			if(file_exists("views/$fileName")){
				if($data != NULL)
					extract($data);
				ob_start();
					include "views/$fileName";
					$this->view = ob_get_contents();
				ob_get_clean();
			}
			if($this->layoutPath != NULL)
				include "views/$this->layoutPath";
			else
				echo $this->view;
		}
		//xac thuc viec dang nhap
		public function authentication(){
			if(isset($_SESSION["email"]) == false)
				header("location:index.php?controller=login");
		}
	}
 ?>