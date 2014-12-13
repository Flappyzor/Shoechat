<?php
require("config.php");

print '<a href="/">' . "[Back]" . '</a><br>';

$id = date('dmYHis');
$date = date('d/m/Y @ g:iA T');
$permalink = '#'.$id;

if (isset($_GET['blog'])) { 
	switch (strtolower($_GET['blog'])) {
		case 'create':
			if (isset($_POST['content'])) { 
				$content = nl2br($_POST['content']);
				$content = stripslashes($content);
				$content = mysql_real_escape_string($content);
			}
			if (isset($_POST['user'])) { 
				$user = htmlentities($_POST['user'], ENT_QUOTES | ENT_IGNORE, "UTF-8");
				$user = stripslashes($user);
			}
			
			if (empty($_POST['content']) || empty($_POST['user'])) {
				print("<h3>One of the input boxes is empty!</h3><meta http-equiv=\"refresh\" content=\"2; URL=".$_SERVER['PHP_SELF']."\">");
			} else {
				print("<h3>Posted!</h3><meta http-equiv=\"refresh\" content=\"2; URL=".$_SERVER['PHP_SELF']."\">");
				mysql_connect($connect_host, $connect_username, $connect_password);
				mysql_query ("INSERT INTO `".$connect_database."`.`".$connect_table."` (`postid` ,`user` ,`date` ,`content`) VALUES ('$id', '$user', '$date', '$content')");
			}
		break;
	}
}
?>
<form name="submit" method="post" action="?blog=create">
User:<br>
<input class="textbox" type="input" size="20" maxlength="20" name="user" value="" /><br>
Content:<br>
<textarea class="contentbox" id="contentbox" type="input" rows="20" cols="100" maxlength="10000" name="content" value=""></textarea><br>
<input class="button" type="submit" value="Submit"></input>
</form>