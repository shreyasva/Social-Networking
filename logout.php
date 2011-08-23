<?php ob_start(); ?>
<html>
<head>
<title></title>
</head>

<body>
<?php
	setcookie('id', -1, time()-213);
	header("Location:index.php");
?>
 
</body>


</html>