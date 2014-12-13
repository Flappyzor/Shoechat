<!DOCTYPE html>
<!--
	Last updated: December 15th 2013
-->
<html>
<head>
<title>Shoechat</title>
<meta charset="utf-8" />
<meta http-equiv="content-language" content="en-gb" />
<meta http-equiv="refresh" content="5" />
<link rel="stylesheet" type="text/css" href="//cdn.flashii.net/css/mio.css" />
</head>
<body>
<img class="logo" src="http://cdn.flashii.net/img/logo.png" alt="Flashii's Blog" /><br>
<a href="chat.php">[Chat]</a></div>
<div class="blogcontent">
<?php
require("config.php");
$countid = 0;
$connection = mysql_connect($connect_host, $connect_username, $connect_password);
if (!($connection)){print("SQL Connection Error.");}
$check_database_connect = mysql_select_db($connect_database);
if(!($check_database_connect)){print("Database Error.");}
if(isset($_GET['b'])){
	$result= mysql_query("SELECT * FROM ".$connect_table." WHERE postid='".mysql_real_escape_string(preg_replace('/\D/', '', $_GET['b']))."' ORDER BY id DESC");
}else{
	$result= mysql_query("SELECT * FROM ".$connect_table." ORDER BY id DESC");
}
$num_rows = mysql_num_rows($result);
if(!$num_rows) {print("There's no posts.");}
while($row = mysql_fetch_array($result)) {
	++$countid;
	print("<div class=\"content\" id=\"$countid\"><h3 class=\"title\" id=\"".$row['postid']."\">".$row['user']." - ".$row['date']."".$row['postid'].$row['content']."<br></div><br></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>");
}
?>
</div>
<br>&copy;<s><a href="http://flash.moe/">Flashwave</a> 2013 | FW_Blog v2.2 | Content on the page may be reused if the site is mentioned as a source.</s> lol<br><br>
</body>
</html>
