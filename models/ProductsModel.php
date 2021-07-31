<?php 
	trait ProductsModel{
		public function modelRead($recordPerPage){	
			$MaDM = isset($_GET["MaDM"])&&is_numeric($_GET["MaDM"])?$_GET["MaDM"]:0;
			$page = isset($_GET["page"])&&is_numeric($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 : 0;
			$from = $page * $recordPerPage;
			$conn = Connection::getInstance();
			$query = $conn->query("select * from sanpham where MaDM in (select MaDM from danhmuc where MaDM=$MaDM or DMCha=$MaDM) limit $from,$recordPerPage");
			$result = $query->fetchAll();
			//---
			return $result;
		}
		//ham tinh tong so ban ghi
		public function modelTotal(){
			$MaDM = isset($_GET["MaDM"])&&is_numeric($_GET["MaDM"])?$_GET["MaDM"]:0;
			$conn = Connection::getInstance();
			$query = $conn->query("select MaSP from sanpham where MaDM in (select MaDM from danhmuc where MaDM=$MaDM or DMCha=$MaDM)");
			return $query->rowCount();
		}
		//lay mot ban ghi tuong ung voi id truyen vao
		public function modelGetRecord($MaSP){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from sanpham where MaSP=$MaSP");
			return $query->fetch();
		}
		//lay mot ban ghi tuong ung voi id truyen vao
		public function getCategory($MaDM){
			$conn = Connection::getInstance();
			$query = $conn->query("select TenDM from danhmuc where MaDM=$MaDM");
			$record = $query->fetch();
			return $query->rowCount() > 0 ? $record->TenDM : "";
		}		
	}
 ?>