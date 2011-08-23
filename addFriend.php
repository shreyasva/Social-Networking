<?php ob_start(); ?>
<?php
$conn=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('socialnetworking', $conn) or die(mysql_error());
if($_GET[f]==1)
mysql_query("insert into friends values ('{$_COOKIE[id]}','{$_GET[id]}')");
if($_GET[uf]==1)
mysql_query("delete from friends where id={$_COOKIE[id]} and friend_id={$_GET[id]}");
header("Location:profile.php?id={$_GET[id]}");

?>
<html>
<head>
<title></title>
</head>

<body>
<?php
	
?>
 
</body>


</html>