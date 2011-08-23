<?php ob_start(); ?>
<?php
$conn=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('socialnetworking', $conn) or die(mysql_error());
if(!isset($_COOKIE[id]))
die("Login first!");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="profile.css" />
<title>Profile</title>
</head>

<body>
<h1><a href="index.php"><img src='2.jpg' href="index.php"/></a> Social Networking </h1><br>
<?php
if(isset($_COOKIE['id']))
{$str="logout.php?id=".$_COOKIE['id'];
echo "<h5><a href={$str}>Logout</a></h5>";
}
?>

<?php
$s="editProfile.php";
if($_GET['id']==$_COOKIE['id'])
echo "<h5><a href=\"{$s}\">"."Edit Profile"."</a>&nbsp&nbsp&nbsp&nbsp</h5>";
?>
<ul>
<?php
$res=mysql_query("select * from person where id ={$_GET['id']}",$conn);
$row=mysql_fetch_row($res);
echo "<li>"."Sex: {$row[3]}"."</li>";
echo "<li>"."E-Mail: {$row[4]}"."</li>";
echo "<li>"."DOB: {$row[5]}"."</li>";
echo "<li>"."About Me: {$row[6]}"."</li>";
echo "<li>"."Status Message: {$row[8]}"."</li>";
?>
</ul>

<?php
$res=mysql_query("select * from friends where id={$_COOKIE[id]} and friend_id={$_GET[id]}");
$row=mysql_fetch_array($res);
if($_COOKIE[id]==$_GET[id])
echo "This is You!";
else if(isset($row[0]))
echo "<a href=\"addFriend.php?id={$_GET[id]}&uf=1\">You are a friend, click to Unfriend</a>";
else
echo "<a href=\"addFriend.php?id={$_GET[id]}&f=1\">You are not a friend, click to friend</a>";
?>

<h4>Favourite Movies</h4>
<ul>
<?php
$res=mysql_query("select movies from person a, favorite_movies b where a.id=b.id and a.id={$_GET['id']} ",$conn);
?>
<?php
while($row=mysql_fetch_array($res))
echo "<li>".$row[0]."</li>"
?>
</ul>
<h4>Favourite Music</h4>
<?php
$res=mysql_query("select music from person a, favorite_music b where a.id=b.id and a.id={$_GET['id']} ",$conn);
?>
<ul>
<?php
while($row=mysql_fetch_array($res))
echo "<li>".$row[0]."</li>"
?>
</ul>
<h4>Favourite TV Shows</h4>
<?php
$res=mysql_query("select tv_shows from person a, favorite_tv_shows b where a.id=b.id and a.id={$_GET['id']} ",$conn);
?>
<ul>
<?php
while($row=mysql_fetch_array($res))
echo "<li>".$row[0]."</li>"
?>
</ul>

<a href="communities.php"><h4>Communities</h4></a>
<?php
$res=mysql_query("select name, c.id from person a, joins b, community c where a.id=b.id and b.community_id=c.id and a.id={$_GET['id']} ",$conn);
?>
<ul>
<?php
while($row=mysql_fetch_array($res)){
$ss="communities.php?id={$row['id']}";
echo "<a href=\"{$ss}\"><li>".$row['name']."</li></a>";
}
?>
</ul>


<a href="events.php"><h4>Events</h4></a>
<?php
$res=mysql_query("select name, c.id from person a, attends b, event c where a.id=b.id and b.event_id=c.id and a.id={$_GET['id']} ",$conn);
?>
<ul>
<?php
while($row=mysql_fetch_array($res)){
$ss="events.php?id={$row['id']}";
echo "<a href=\"{$ss}\"><li>".$row['name']."</li></a>";
}
?>
</ul>


<h4>Friends</h4>
<ul>
<?php
$str="select * from friends, person where friend_id=person.id and (friends.id={$_GET['id']} or friends.friend_id={$_GET[id]})";
$res=mysql_query($str);
while($row=mysql_fetch_array($res)){
	echo "<li><a href=\"profile.php?id={$row[2]}\"> {$row[3]}  </a></li>";
}
?>
</ul>

</body>


</html>