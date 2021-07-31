<?php 
	trait LoginModel{
		public function modelLogin($email,$password){
			
			$conn = Connection::getInstance();	
			$query = $conn->query("select email,password from admin where email='$email' and password ='$password' ");
			return $query->rowCount();
		}
	}
 ?>