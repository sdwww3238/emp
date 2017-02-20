<head>
<style type="text/css">
td{width:80px;text-align:center;}
table{background-color:light-blue}
</style>
</head>
<?php
echo "<h1>雇员管理系统</h1>";

$conn=mysql_connect("localhost","root","1qaz2wsx");
mysql_select_db('empmanage');

$pageNow=1;
$pageSize=10;
$rowCount=0;

if(!empty($_GET['pageNow'])){
    $pageNow=$_GET['pageNow'];
}

$sql1="select count(id) from emp";
$res1=mysql_query($sql1,$conn);
if($row=mysql_fetch_row($res1)){
    $rowCount=$row[0];
}


$pageCount=ceil($rowCount/$pageSize);
$sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
$res=mysql_query($sql,$conn);



echo "<table  border='1px' bordercolor='green'  cellspacing='0px'  width='700px'>";
echo "<tr>
     <td>id</td>
    <td>name</td>
    <td>grade</td>
    <td>email</td>
    <td>salary</td>
    <td>修改</td>
    <td>删除</td>
    </tr>";
while($row=mysql_fetch_assoc($res)){
    $k=$row['id']%10;
    echo "<tr>
            <td>{$row['id']}</td>
       <td>{$row['name']}</td>
       <td>{$row['grade']}</td>
       <td>{$row['email']}</td>
       <td>{$row['salary']}</td>
       <td><a href='xiugai.php?id={$row['id']}'>修改用户<a/></td>
       <td><a href='delete.php?flag=del&id={$row['id']}'>删除用户<a/></td>
        </tr>";
}
echo "</table>";
$a=floor(($pageNow-1)/10)*10+1;
for($i=$a;$i<=$a+9&&$i<=$pageCount;$i++){
    echo "<a href='empList.php?pageNow=$i'>&nbsp;$i</a>";
}
$pagePre=$pageNow-1;
if($pageNow>1){
   echo "<br ><a href='empList.php?pageNow=$pagePre'>上一页</a>"; 
}

$pageNext=$pageNow+1;
if($pageNow<$pageCount){
   echo "<br ><a href='empList.php?pageNow=$pageNext'>下一页</a>"; 
}
//10页
$pagePre10=$pageNow-10;
if($pageNow>10){
    echo "<br ><a href='empList.php?pageNow=$pagePre10'><<</a>";
}
$pageNext10=$pageNow+10;
if($pageNow<$pageCount){
    echo "<a href='empList.php?pageNow=$pageNext10'>>></a>";
}

echo "<br />当前第{$pageNow}页/共{$pageCount}页<br />";
mysql_free_result($res);
mysql_close($conn);
?>
<form action="empList.php">
跳转到:<input type="text" name="pageNow" />
<input type="submit" value="GO">
</form>
<hr/>
