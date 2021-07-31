<?php 
	trait ProductsModel{
		public function modelRead($recordPerPage){	
			$page = isset($_GET["page"])&&is_numeric($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 : 0;
			$from = $page * $recordPerPage;
			$conn = Connection::getInstance();
			$query = $conn->query("select * from sanpham order by MaSP desc limit $from,$recordPerPage");
			$result = $query->fetchAll();
			return $result;
		}
		//ham tinh tong so ban ghi
		public function modelTotal(){
			$conn = Connection::getInstance();
			$query = $conn->query("select MaSP from sanpham");
			return $query->rowCount();
		}
		public function modelGetRecord($MaSP){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from sanpham where MaSP=$MaSP");
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function getCategory($MaDM){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select TenDM from danhmuc where MaDM=$MaDM");
			$record = $query->fetch();
			return $query->rowCount() > 0 ? $record->TenDM : "";
		}
		public function modelUpdate($id){
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			$TenSP = $_POST["TenSP"];
			$MoTa = $_POST["MoTa"];
			$Gia = $_POST["Gia"];
			$GiamGia = $_POST["GiamGia"];
			$MaDM = $_POST["MaDM"];
			$conn = Connection::getInstance();
			$query = $conn->prepare("update sanpham set TenSP=:_TenSP,MoTa=:_MoTa,Gia=:_Gia,GiamGia=:_GiamGia,MaDM=:_MaDM where MaSP=:_MaSP");
			$query->execute([":_TenSP"=>$TenSP,":_MoTa"=>$MoTa,":_Gia"=>$Gia,":_GiamGia"=>$GiamGia,":_MaDM"=>$MaDM,":_MaSP"=>$id]);

			if($_FILES["photo"]["name"] != ""){
				//lay anh cu de xoa
				$oldQuery = $conn->query("select Anh from sanpham where MaSP=$id");
				if($oldQuery->rowCount() > 0)
					$oldPhoto = $oldQuery->fetch();
					if(file_exists("../assets/upload/products/".$oldPhoto->Anh))
						unlink("../assets/upload/products/".$oldPhoto->Anh);
				//---
				$photo = time()."_".$_FILES["photo"]["name"];
				//upload anh moi
				move_uploaded_file($_FILES["photo"]["tmp_name"],"../assets/upload/products/$photo");
				//update csdl
				$query = $conn->prepare("update sanpham set Anh = :_Anh where MaSP=:_MaSP");
				$query->execute([":_Anh"=>$photo,":_MaSP"=>$id]);
				//---
			}
			//---
		}
		public function modelCreate(){
			$TenSP = $_POST["TenSP"];
			$MoTa = $_POST["MoTa"];
			$Gia = $_POST["Gia"];
			$GiamGia = $_POST["GiamGia"];
			$MaDM = $_POST["MaDM"];
			$photo = "";
			//---
			//neu user upload anh thi lay anh cu de xoa, sau do upload anh moi va update database
			if($_FILES["photo"]["name"] != ""){				
				$photo = time()."_".$_FILES["photo"]["name"];
				//upload anh moi
				move_uploaded_file($_FILES["photo"]["tmp_name"],"../assets/upload/products/$photo");
			}
			//---
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into sanpham set TenSP=:_TenSP,MoTa=:_MoTa,Anh=:_Anh,Gia=:_Gia,GiamGia=:_GiamGia,MaDM=:_MaDM");
			$query->execute([":_TenSP"=>$TenSP,":_MoTa"=>$MoTa,":_Anh"=>$photo,":_Gia"=>$Gia,":_GiamGia"=>$GiamGia,":_MaDM"=>$MaDM]);			
		}
		//xoa ban ghi
		public function modelDelete($MaSP){
			$conn = Connection::getInstance();
			$oldQuery = $conn->query("select Anh from sanpham where MaSP=$MaSP");
			if($oldQuery->rowCount() > 0)
				$oldPhoto = $oldQuery->fetch();
				if(file_exists("../assets/upload/products/".$oldPhoto->Anh))
					unlink("../assets/upload/products/".$oldPhoto->Anh);
			//---
			$conn->query("delete from sanpham where MaSP=$MaSP");
		}
		public function modelListCategories(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select MaDM,TenDM from danhmuc where DMCha = 0 order by MaDM desc");
			return $query->fetchAll();
		}
		public function modelListCategoriesSub($id){
			$conn = Connection::getInstance();
			$query = $conn->query("select MaDM,TenDM from danhmuc where DMCha = $id order by MaDM desc");
			return $query->fetchAll();
		}
	}
 ?>