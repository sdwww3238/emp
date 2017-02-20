<?php
$id=$_REQUEST['id'];
$conn=mysql_connect("localhost","root","1qaz2wsx");
mysql_select_db('empmanage');
$name2=$_GET['name2'];
$grade2=$_POST['grade2'];
$email2=$_POST['email2'];
$salary2=$_POST['salary2'];
$sql="update emp set name=$name2,grade='$grade2',email='$grade2',salary='$salary2' where id='.$id.'";
$res=mysql_query($sql,$conn);
echo $name2;
mysql_close($conn);
?>
<html>
<body>
<form action="xiugai.php?id=$id" method="post">

id<input type='text' readonly='readonly' name='id2' value="<?php echo $id;?>">
name<input type='text' name='name2' value="<?php echo $name2;?>">
grade<input type='text' name='grade2' value="<?php echo $grade2;?>" >
email<input type='text' name='email2' value="<?php echo $email2;?>">
salary<input type='text' name='salary2' value="<?php echo $salary2;?>">
<input type="submit" value="提交"> 
</form>
</body>
</html>