<?php ob_start(); ?>
<?php
$conn=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('socialnetworking', $conn) or die(mysql_error());;
mysql_query("delete from community where id={$_GET[id]}");
header("Location:communities.php");
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