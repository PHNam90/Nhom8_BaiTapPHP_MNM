<?php 
	trait CategoriesModel{
		public function modelRead($recordPerPage){	
			$page = isset($_GET["page"])&&is_numeric($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 : 0;
			$from = $page * $recordPerPage;
			$conn = Connection::getInstance();
			$query = $conn->query("select * from danhmuc where DMCha = 0 order by MaDM desc limit $from,$recordPerPage");
			$result = $query->fetchAll();
			return $result;
		}
		public function modelTotal(){
			$conn = Connection::getInstance();
			$query = $conn->query("select MaDM from danhmuc where DMCha=0");
			return $query->rowCount();
		}
		public function modelGetRecord($MaDM){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from danhmuc where MaDM=$MaDM");
			return $query->fetch();
		}
		public function modelUpdate($id){
			$TenDM = $_POST["TenDM"];
			$DMCha = $_POST["DMCha"];
			$conn = Connection::getInstance();
			$query = $conn->prepare("update danhmuc set TenDM=:_TenDM,DMCha=:_DMCha where MaDM=:_MaDM");
			$query->execute([":_TenDM"=>$TenDM,":_DMCha"=>$DMCha,":_MaDM"=>$id]);
		}
		public function modelCreate(){
			$TenDM = $_POST["TenDM"];
			$DMCha = $_POST["DMCha"];
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into danhmuc set TenDM=:_TenDM,DMCha=:_DMCha");
			$query->execute([":_TenDM"=>$TenDM,":_DMCha"=>$DMCha]);
		}
		//xoa ban ghi
		public function modelDelete($MaDM){
			$conn = Connection::getInstance();
			$conn->query("delete from danhmuc where MaDM=$MaDM");
		}
		//lay cac ban ghi categories
		public function modelListCategories($MaDM){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select * from danhmuc where DMCha=0 and MaDM <> $MaDM order by MaDM desc");
			return $query->fetchAll();
		}
		//lay cac ban ghi categories con
		public function modelListCategoriesSub($MaDM){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from danhmuc where DMCha=$MaDM order by MaDM desc");
			return $query->fetchAll();
		}
	}
 ?>