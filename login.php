<?php ob_start(); ?>
<?php
$conn=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('socialnetworking', $conn) or die(mysql_error());;
$str="select id from person where ";
$str .= "username = '{$_POST['username']}'";
$str .= " and password = '{$_POST['password']}'";
$res=mysql_query($str,$conn);
?>
<html>
<head>
<title></title>
</head>

<body>
<?php
$row=mysql_fetch_array($res);
if(isset($row['id'])){
setcookie('id', $row['id'], time()+13143243);
header("Location:profile.php?id={$row['id']}");
}
else
header("Location:index.php?error=1");
?>
 
</body>


</html>