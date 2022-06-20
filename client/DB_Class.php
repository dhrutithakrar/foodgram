<?php 
	class DB
	{
		public $con;
		public $server = "localhost";
		public $uname = "root";
		public $pass = "";
		public $dbname = "dbtyproject";
		public function __construct()
		{
			$this->con = mysqli_connect($this->server,$this->uname,$this->pass,$this->dbname);
		}
		public function joinQuery($query)
		{
			$res = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
			if(@mysqli_num_rows($res))
			{
				return $res;
			}
			else
			{
				return "No Record Available";
			}
		}
		public function select($tableName,$where)
		{

			$query = "select * from $tableName ".$where;
			$res = mysqli_query($this->con,$query);
			if(@mysqli_num_rows($res))
			{
			
				return $res;
			}
			else
			{
				return "No Record Available";
			}
		}
		public function selectcol($tableName,$colname,$where){
			$query = "select $colname from $tableName ".$where;
			$res = mysqli_query($this->con,$query);
			if(@mysqli_num_rows($res))
			{
				return $res;
			}
			else
			{
				return "No Record Available";
			}
		}
		public function delete($tableName,$id)
		{
			$query = "delete from $tableName where `id` = $id";
			if (mysqli_query($this->con,$query)) {
				return "Record Deleted Successfully";
			}
			else{
				return "no data found";
			}
		}
		public function deleteWhere($tableName,$where)
		{
			$query = "delete from $tableName $where";
			if (mysqli_query($this->con,$query)) {
				return "Record Deleted Successfully";
			}
			else{
				return "no data found";
			}
		}
		public function insert($tableName,$colName,$value)
		{
			$query = "insert into $tableName ($colName) values($value)";
			if (mysqli_query($this->con,$query) or die(mysqli_error($this->con))) {
				return "Record Inserted";
			}
		}
		public function update($tableName,$colAndData,$where)
		{
			$query = "update $tableName set $colAndData where $where";
			if(mysqli_query($this->con,$query)) 
			{
				return "Record updated Successfully...";
			}else{
				return mysqli_error($this->con);
			}		
		}
	}
?>