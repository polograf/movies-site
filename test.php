<?php
require 'database.php';
function get_movie($id){
	$query="SELECT `movie`.`movie_id`,`movie`.`movie_year`,`movie`.`movie_name`,`actors`.`actor_fullname`,`directors`.`director_fullname`,`movietype`.`movietype_label`,`movie`.`movie_image`
	FROM `movie`
	JOIN `actors`
	ON `movie`.`movie_leadactor`=`actors`.`actor_id`
	JOIN `directors`
	ON `movie`.`movie_director` = `directors`.`director_id`
	JOIN `movietype`
	ON `movie`.`movie_type` = `movietype`.`movietype_id`
	WHERE `movie`.`movie_id` = '$id'";
	return mysql_fetch_assoc(mysql_query($query));
};
	$query="SELECT `movie`.`movie_id`,`movie`.`movie_year`,`movie`.`movie_name`,`actors`.`actor_fullname`,`directors`.`director_fullname`,`movietype`.`movietype_label`,`movie`.`movie_image`
	FROM `movie`
	JOIN `actors`
	ON `movie`.`movie_leadactor`=`actors`.`actor_id`
	JOIN `directors`
	ON `movie`.`movie_director` = `directors`.`director_id`
	JOIN `movietype`
	ON `movie`.`movie_type` = `movietype`.`movietype_id`";
$res_full_info=mysql_query($query);
?>