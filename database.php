<?php $connect = mysql_connect('localhost','user','user')
		or die;
	$create = mysql_query("Create database if not exists moviesite") or die(mysql_error());
	mysql_select_db("moviesite");
	?>