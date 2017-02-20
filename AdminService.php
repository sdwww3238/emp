<?php
require_once "SqlHelper.class.php";
class AdminService{
    public function checkAdmin($id,$password){
        $sql="select name,password from admin where id=$id";
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dql($sql);
        if($row=mysql_fetch_assoc($row)){
            if($password==row['password']){
                return row['name'];
            }
        }
        mysql_free_result($res);
        $SqlHelper->close_connet();
        return "";
    }
}
?>