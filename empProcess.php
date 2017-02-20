<?php
require_once "AdminService.php";
$id=$_POST['id'];
$password=$_POST['password'];
$adminService=new AdminService();
$name=$adminService->chekcAdimn($id,$password);
if($name!=""){
    //把登陆信息写入cookie 'loginname':$name
    //把登陆表 把登陆的人ip id..
    //合法

    header("Location: empManage.php?name=$name");
    exit();
}else{
    //非法
    header("Location: login.php?errno=1");
    exit();
}