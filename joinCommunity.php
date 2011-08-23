<?php ob_start(); ?>
<?php
$conn=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('socialnetworking', $conn) or die(mysql_error());;
?>
<html>
<head>
<title></title>
</head>

<body>
<?php
if(isset($_GET['at'])){
$str="insert into joins values({$_COOKIE['id']}, {$_GET['id']})";
mysql_query($str, $conn);
}
else
{
$str="delete from joins where id='{$_COOKIE['id']}' and community_id='{$_GET['id']}'"; 
mysql_query($str, $conn);
}
header("Location:communities.php?id={$_GET['id']}");
?>
 
</body>


</html>