<?php ob_start(); ?>
<?php
$conn=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('socialnetworking', $conn) or die(mysql_error());;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="communities.css" />
<title>Communites</title>
</head>

<body>
<h1><a href="index.php"><img src='2.jpg' href="index.php"/></a> Social Networking </h1><br>
<?php
if(!isset($_GET['id']))	{
echo '<h4> Search Communities</h4>';
echo '<form action="communities.php" method="post">
Search <input type = "text" name="search_community" />
<input type="submit" value="search">
</form>';

if(isset($_COOKIE[id])){
echo '<h4>Add Community</h4>';
echo '<form action="addCommunity.php" method="post">
Name <input type="text" name="name"/>
Category <input type="text" name="category">
Location <input type="text" name="location"/>
<input type="submit" value="Add">
</form>
';
}
echo '<h4>Some of the Communities are</h4>';
if(isset($_POST[search_community]))
$tt="name like '%{$_POST[search_community]}%'";
else
$tt=1;
$res=mysql_query("select name, id from community where {$tt}");
echo '<ul>';
while($row=mysql_fetch_array($res)){
$ss="communities.php?id={$row['id']}";
echo "<a href=\"{$ss}\"><li>".$row['name']."</li></a>";
}
echo '</ul>';
}else{
$res=mysql_query("select * from community where id = {$_GET['id']}");
$row=mysql_fetch_array($res);
echo '<ul>';
echo '<li>'."Name: {$row[2]}".'</li>';
echo '<li>'."Category: {$row[3]}".'</li>';
echo '<li>'."Location: {$row[4]}".'</li>';
echo '</ul>';
echo '<h4>People in the community are:</h4>';
$res=mysql_query("select username, a.id from joins a, person b where a.id=b.id and a.community_id = {$_GET['id']}");
echo '<ul>';
while($row=mysql_fetch_array($res)){
echo "<a href=\"profile.php?id={$row[1]}\">".'<li>'."{$row[0]}".'</li>'.'</a>';
}
echo '</ul>';
}
if(isset($_COOKIE['id'])&&isset($_GET['id'])){
$res=mysql_query("select username from joins a, person b where a.id=b.id and a.community_id = {$_GET['id']} and b.id={$_COOKIE['id']}");
$row=mysql_fetch_array($res);
if(isset($row[0])){
echo '<a href="joinCommunity.php?id='."{$_GET[id]}\">".'<h4>You are Already in this community, click to UnJoin'.'</h4></a>';
}
else{
echo '<a href="joinCommunity.php?id='."{$_GET[id]}&at=1\">".'<h4>You are not in this community, click to Join'.'</h4></a>';
}
}
else if(isset($_GET['id']))
echo '<a href="index.php"><h4>Please login first to join</h4></a>';
?>
<?php
if(isset($_GET[id])){
$res=mysql_query("select * from community where id={$_GET[id]}");
$row=mysql_fetch_array($res);
if($row[1]==$_COOKIE[id])
echo "<a href=\"deleteCommunity.php?id={$_GET[id]}\"><h4>You own this community, click to delete </h4></a>";
}
?>
</body>


</html>