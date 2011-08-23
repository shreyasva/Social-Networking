<?php 
ob_start();
$conn=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('socialnetworking',$conn) or die(mysql_error());
?>
<html>
<head>
<title>Social Networking</title>
</head>
<body>
<?php
$str = "INSERT INTO person (ID ,username ,password ,sex , email ,DOB ,About_Me ,Status_Message) VALUES (NULL ,  '{$_POST[username]}',  '{$_POST[password]}',  '{$_POST[select]}',  '{$_POST[email]}', '{$_POST[dob]}' , NULL , NULL)";
mysql_query($str);
header("Location:index.php?sign=1");
?>
</body>
</html>
<?php
mysql_close();
?>