<?php ob_start(); 
if(!isset($_COOKIE['id']))
	die("Please login first!!!");
$conn=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('socialnetworking',$conn) or die(mysql_error());
?>

<?php
if(isset($_GET['delmovie'])){
$str ="delete from favorite_movies where id={$_COOKIE['id']} and movies='$_GET[movies]'";
mysql_query($str);
header("Location:editProfile.php");
}
if(isset($_POST['movies']))
{
$str="insert into favorite_movies values({$_COOKIE[id]}, '{$_POST[movies]}')";
mysql_query($str);
header("Location:editProfile.php");
}
if(isset($_GET['delmusic'])){
$str ="delete from favorite_music where id={$_COOKIE['id']} and music='$_GET[music]'";
mysql_query($str);
header("Location:editProfile.php");
}
if(isset($_POST['music']))
{
$str="insert into favorite_music values({$_COOKIE[id]}, '{$_POST[music]}')";
mysql_query($str);
header("Location:editProfile.php");
}

if(isset($_GET['deltv'])){
$str ="delete from favorite_tv_shows where id={$_COOKIE['id']} and tv_shows='$_GET[tv]'";
mysql_query($str);
header("Location:editProfile.php");
}
if(isset($_POST['tv']))
{
$str="insert into favorite_tv_shows values({$_COOKIE[id]}, '{$_POST[tv]}')";
mysql_query($str);
header("Location:editProfile.php");
}

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="profile.css" />
<title>Edit Profile</title>
</head>

<body>
<h1><a href="index.php"><img src='2.jpg' href="index.php"/></a> Social Networking </h1><br>
<?php
if(isset($_POST['username'])){
$str="update person set username='{$_POST[username]}', password='{$_POST[password]}', email ='{$_POST['email']}', about_me='{$_POST['about_me']}', status_message='{$_POST['status_message']}' where id={$_COOKIE['id']}";
mysql_query($str);
}
?>
<?php
$res=mysql_query("select * from person where id = {$_COOKIE['id']}");
$row=mysql_fetch_array($res);
?>
<form action="editProfile.php" method="post">
Username: <input type="text" name="username" value="<?php echo "{$row[1]}" ?> "/>
Password: <input type="password" name="password" value="<?php echo "{$row[2]}" ?> "/>
EMail: <input type="text" name="email" value="<?php echo "{$row[4]}" ?> "/>
About me: <input type="text" name="about_me" value="<?php echo "{$row[6]}" ?> "/>
Status Message: <input type="text" name="status_message" value="<?php echo "{$row[8]}" ?> "/>
<input type="submit" value="Change">
</form>
 
<a href="deleteAccount.php">Click here to delete Account</a>

<h4>Favourite Movies</h4>
<table>
<?php
$res=mysql_query("select movies from person a, favorite_movies b where a.id=b.id and a.id={$_COOKIE['id']} ",$conn);
?>
<?php
while($row=mysql_fetch_array($res))
echo "<tr> <td>".$row[0]."</td> <td> <a href=\"editProfile.php?delmovie=1&movies={$row[0]}\"> Delete </a> </td></tr>" ;
?>
</table>
<h4>Add Movie</h4>
<form action="editProfile.php" method="post">
Movie: <input type="text" name="movies"/>
<input type="submit" value="Add">
</form>

<h4>Favourite Music</h4>
<table>
<?php
$res=mysql_query("select music from person a, favorite_music b where a.id=b.id and a.id={$_COOKIE['id']} ",$conn);
?>
<?php
while($row=mysql_fetch_array($res))
echo "<tr> <td>".$row[0]."</td> <td> <a href=\"editProfile.php?delmusic=1&music={$row[0]}\"> Delete </a> </td></tr>" ;
?>
</table>
<h4>Add Music</h4>
<form action="editProfile.php" method="post">
Movie: <input type="text" name="music"/>
<input type="submit" value="Add">
</form>


<h4>Favourite TV Shows</h4>
<table>
<?php
$res=mysql_query("select tv_shows from person a, favorite_tv_shows b where a.id=b.id and a.id={$_COOKIE['id']} ",$conn);
?>
<?php
while($row=mysql_fetch_array($res))
echo "<tr> <td>".$row[0]."</td> <td> <a href=\"editProfile.php?deltv=1&tv={$row[0]}\"> Delete </a> </td></tr>" ;
?>
</table>
<h4>Add TV Show</h4>
<form action="editProfile.php" method="post">
TV Show: <input type="text" name="tv"/>
<input type="submit" value="Add">
</form>


</body>


</html>