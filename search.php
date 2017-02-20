<?php
$conn=mysql_connect("localhost","root","1qaz2wsx");
if($conn){
    echo "ok";
}else{
    die("die");
}
mysql_select_db("empmanage",$conn);
$id=$_get['search'];
$sql="select * from emp where id=$id";
$res=mysql_query($sql,$conn);
if($row=mysql_fetch_assoc($res)){
    $name=row['name'];
}
mysql_close($conn);
echo '<form action="search.php" method="post">';
echo '查询<input type="text" name="search" value=""><br /><br /><br />';
echo 'id<input type="text" name="id" value=""><br />';
echo 'name<input type="text" name="name" value=""><br />';
echo 'grade<input type="text" name="grade" value=""><br />';
echo 'email<input type="text" name="email" value=""><br />';
echo 'salary<input type="text" name="salary" value=""><br />';
echo '<input type="submit" value="提交">';

echo '</form>';


