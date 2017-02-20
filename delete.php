<?php
$conn=mysql_connect("localhost","root","1qaz2wsx");
mysql_select_db('empmanage');
$flag=$_REQUEST['flag'];
$id=$_REQUEST['id'];
if(!empty($flag)){
    $sql="delete from emp where id=$id";
    $b=mysql_query($sql,$conn) or die(mysql_error());
if(!$b){
				return 0;//失败
			}else{
				if(mysql_affected_rows($conn)>0){
					return 1;//表示成功
				}else{
					return 2;//表示没有行数影响.
				}
			}
}


mysql_close($conn);