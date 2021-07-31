<?php 
	//load file model
	include "models/LoginModel.php";
	class LoginController extends Controller{
		use LoginModel;
		public function index(){
			$this->loadView("LoginView.php");
		}
		public function login(){
			$email = $_POST["email"];
			$password = $_POST["password"];	
			$password = md5($password);
			$query = $this->modelLogin($email,$password);
			if($query> 0){
					$_SESSION["email"] = $email;
					header("location:index.php");
			}else
				header("location:index.php?controller=login");
		}
		//dang xuat
		public function logout(){
			unset($_SESSION["email"]);
			header("location:index.php");
		}
	}
 ?>