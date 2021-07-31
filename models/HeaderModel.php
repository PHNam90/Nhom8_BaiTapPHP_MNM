<?php 
	trait HeaderModel{
		//load menu cap 1
		public function modelGetCategories(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from danhmuc where DMCha = 0 order by MaDM desc");
			$result = $query->fetchAll();
			return $result;
		}
		//load menu cap 2
		public function modelGetCategoriesSub($MaDM){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from danhmuc where DMCha = $MaDM order by MaDM desc");
			$result = $query->fetchAll();
			return $result;
		}
	}
 ?>