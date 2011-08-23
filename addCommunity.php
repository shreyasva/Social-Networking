<?php ob_start(); ?>
<?php
$conn=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('socialnetworking', $conn) or die(mysql_error());

$str="insert into community values (NULL, '{$_COOKIE[id]}', '{$_POST[name]}', '{$_POST[category]}', '{$_POST[location]}')";
mysql_query($str);
$str="select id from community where owner_id='{$_COOKIE[id]}' and name='{$_POST[name]}' and category='{$_POST[category]}' and location='{$_POST[location]}'";
$res=mysql_query($str);
$row=mysql_fetch_array($res);
$str="Location:joinCommunity.php?id={$row[0]}&at=1";
header($str);
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