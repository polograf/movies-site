<?php
function check_director($director){
    global $director_id;
    global $auth_to_check_title;
    $auth_to_check_title ++;
    $query="SELECT director_id FROM directors WHERE director_fullname = '$director' ";
    $res_check = mysql_query($query) or die(mysql_error());
    if(mysql_fetch_row($res_check) == false){
        $add = "INSERT INTO directors (`director_fullname`) VALUES ('$director')";
        $res_add= mysql_query($add);
        check_director($director);
		$auth_to_check_title -=1;
    }
    else{
        $search = "SELECT director_id FROM directors WHERE director_fullname= '$director'";
        $res_dirId = mysql_query($search) or die (mysql_error());
        $row = mysql_fetch_row($res_dirId);

        return $director_id=$row;
    }
}
function check_leadactor($leadactor){
	var_dump($leadactor);
    global $auth_to_check_title;
    $auth_to_check_title ++;
    $query = "SELECT actor_id FROM actors WHERE actor_fullname = '$leadactor' ";
    $res_check = mysql_query($query) or die(mysql_error());
    if(mysql_fetch_row($res_check) == false){
        $add = "INSERT INTO actors (`actor_fullname`) VALUES ('$leadactor')";
        $res_add= mysql_query($add);
        check_leadactor($leadactor);
		$auth_to_check_title -=1;
    }
    else{
        $search = "SELECT actor_id FROM actors WHERE actor_fullname= '$leadactor'";
        $res_dirId = mysql_query($search) or die (mysql_error());
        $row = mysql_fetch_row($res_dirId);
        return $row;
    }
}
function check_title($title,$director_id,$leadactor_id){
    global $auth;
    $query="SELECT movie_name,movie_leadactor,movie_director FROM movie WHERE movie_name = '$title' AND movie_leadactor= '$leadactor_id' AND movie_director = '$director_id'";
    $res_check_movie = mysql_query($query);
    if(mysql_num_rows($res_check_movie)< 1){
        return $auth = 1;
    }
    else{
        header("Location:add_movie.php?message=false");
    }
}
$director_id=0;
$auth =0;
$auth_to_check_title = '';
require '../database/database.php';
$title=$_POST['title_movie'];
$leadactor=$_POST['leadactor'];
$director = $_POST['director'];
$year=(int)$_POST['year'];
$type=$_POST['type'];
$filename = $_FILES["file"]["name"];
$leadactor_id=check_leadactor($leadactor);
if(isset($_FILES)) {
        if(move_uploaded_file($_FILES["file"]["tmp_name"], "../images/movies/" . $_FILES["file"]["name"])) {
            
        }
        else{
            $filename = "default.jpg";
        }
}
check_director($director);
check_leadactor($leadactor);
var_dump($auth_to_check_title);
if($auth_to_check_title == 3) {
    check_title($title,$director_id[0],$leadactor_id[0]);
}
var_dump($auth);
if($auth == 1) {
    $query = "INSERT INTO movie(`movie_name`,`movie_type`,`movie_year`,`movie_leadactor`,`movie_director`,`movie_image`) VALUES ('$title','$type','$year','$leadactor_id[0]','$director_id[0]','images/movies/".$filename."')";
    ($res = mysql_query($query) or die(mysql_error()));
    $auth = 0;
    header("Location:add_movie.php?message=true");
}
mysql_close();
?>
