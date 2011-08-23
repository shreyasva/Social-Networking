<?php ob_start(); ?>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="index.css" />
</head>

<body>
<?php
	if(isset($_COOKIE['id']))
		header("Location:profile.php?id=${_COOKIE['id']}");
	if($_GET['error']==1)
		echo "Error: Login Failed, Please Try Again\n";
	if($_GET['sign']==1)
		echo "Account created succesfully!\n";
?>

<h1><a href="index.php"><img src='2.jpg' href="index.php"/></a> Social Networking </h1><br>
<p> Sign In </p>
<form action="login.php" method="post">
Username: <input type="text" name="username" />
Password: <input type="password" name="password"/>
<input type="submit" value="Login" />
</form>

<p> Sign Up </p> 
<form action="signup.php" method="post">
Username: <input type="text" name="username" />
Password: <input type="password" name="password"/>
DOB: <input type="text" name="dob" value="yyyy-mm-dd" />
Email <input type="text" name="email"/>
Sex: <select name="select">
<option></option>
<option>M</option>
<option>F</option>
/select>
<input type="submit" value="Signup" />
</form>

</body>


</html>