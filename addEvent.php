<?php ob_start(); ?>
<?php
$conn=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('socialnetworking', $conn) or die(mysql_error());

$str="insert into event values (NULL, '{$_POST[name]}', '{$_POST[time]}', '{$_POST[location]}', '{$_POST[description]}', '{$_COOKIE[id]}')";
mysql_query($str);
$str="select id from event where owner_id='{$_COOKIE[id]}' and name='{$_POST[name]}' and location='{$_POST[location]}' and time='{$_POST[time]}' and description='{$_POST[description]}'";
$res=mysql_query($str);
$row=mysql_fetch_array($res);
header("Location:attendEvent.php?id={$row[0]}&at=1");
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