<?php 
	trait AccountModel{
		public function modelRegister(){
			$TenKH = $_POST["TenKH"];
			$Email = $_POST["Email"];
			$DiaChi = $_POST["DiaChi"];
			$SDT = $_POST["SDT"];
			$MatKhau = $_POST["MatKhau"];
			$conn = Connection::getInstance();
			$check = $conn->prepare("select MaKH from khachhang where Email=:_Email");
			$check->execute(array("_Email"=>$Email));
			if($check->rowCount() == 0){
				$MatKhau = md5($MatKhau);
				$query = $conn->prepare("insert into khachhang set TenKH=:_TenKH,Email=:_Email,DiaChi=:_DiaChi,SDT=:_SDT,MatKhau=:_MatKhau");
				$query->execute(array("_TenKH"=>$TenKH,"_Email"=>$Email,"_DiaChi"=>$DiaChi,"_SDT"=>$SDT,"_MatKhau"=>$MatKhau));
				header("location:index.php?controller=account&action=login&notify=success");
			}else
				header("location:index.php?controller=account&action=register&notify=exists");
		}
		public function modelLogin(){
			$Email = $_POST["Email"];
			$MatKhau = $_POST["MatKhau"];
			$MatKhau = md5($MatKhau);
			$conn = Connection::getInstance();
			$query = $conn->prepare("select Email,MaKH,TenKH from khachhang where Email=:_Email and MatKhau=:_MatKhau");
			$query->execute(array("_Email"=>$Email,"_MatKhau"=>$MatKhau));
			if($query->rowCount() > 0){
				//---
				$record = $query->fetch();
				 $_SESSION['khachhang'] = array(
		            'Email' => $record->Email,
		            'MaKH' => $record->MaKH,
		            'TenKH' => $record->TenKH
		        );
				header("location:index.php");
			}else
				header("location:index.php?controller=account&action=login");
		}
		//lay mot ban ghi trong table customers		
		public function modelGetCustomers($MaKH){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from khachhang where MaKH = $MaKH");
			//tra ve mot ban ghi
			return $query->fetch();
			//---
		}
		//lay mot ban ghi trong table products		
		public function modelGetProducts($MaSP){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from sanpham where MaSP = $MaSP");
			return $query->fetch();
			//---
		}
		
	}
 ?>