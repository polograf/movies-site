<!DOCTYPE html>
<html>
<head>
	<title>Movie list</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php include 'header.php';
include 'test.php';
require 'database/database.php';
$query="SELECT * FROM movie;";
$res=mysql_query($query) or die(mysql_error());
$io = mysql_num_rows($res);
?>
<section class="movies_content">
  <ul class="movie_list">
  <?php
  $count = 0;
  	while($full_info = mysql_fetch_assoc($res_full_info)){
	echo "<li class='part_movie'><img src=".$full_info['movie_image'].
  " class='movie_img'/><div class='movie_content'><a href=index.php?movie=".$full_info['movie_id']."><h3>".
  $full_info['movie_name'].
  "</h3></a><p>".
  $full_info['movietype_label'].
  "</p><p>".$full_info['actor_fullname'].
  "</p><p>".$full_info['director_fullname'].
  "</p></div></li>";
    
    }
    ?>
  </ul>
</section>
</body>
</html>
