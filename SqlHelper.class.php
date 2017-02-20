<?php
	class SqlHelper{
		public $conn;
		public $host="localhost";
		public $username="root";
		public $password="1qaz2wsx";
		public $dbname="empmanage";
		
		public function __construct(){
			$this->conn=mysql_connect($this->host,$this->username,$this->password);
			if(!$this->conn){
			    die("连接失败".mysql_error());
			}
			mysql_select_db($this->dbname,$this->conn);
		}
		
	
	
	public function execute_dql($sql){
		$res=mysql_query($sql,$con) or die(mysql_error());
		return $res;
	}
	
	public function execute_dql2($sql){
		$arr=array();
		$res=mysql_query($sql,$con) or die(mysql_error());
		while($row=mysql_fetch_assoc($res)){
			$arr=$row;
		}
		mysql_free_result($res);
		return $arr;
	}
	
	public function execute_dml($sql){
		$b=mysql_query($sql,$con) or die(mysql_error());
		if(!$b){
			return 0;
		}else{
			if(mysql_affected_rows($this->con)>0){
				return 1;//ok
			}else{
				return 2;//执行错误
			}
		}
	}
	
	public function close_connect(){
		if(!empty($this->con)){
			mysql_close($this->con);
		}
	}
	}
?>