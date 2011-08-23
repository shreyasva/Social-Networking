<?php ob_start(); ?>
<?php
if(!isset($_COOKIE[id]))
die("Login first to Delete");
?>

<?php
$conn=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('socialnetworking',$conn) or die(mysql_error());
$str="delete from person where id={$_COOKIE[id]}";
mysql_query($str);
header("Location:logout.php");
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