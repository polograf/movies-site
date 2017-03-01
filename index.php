<?php
require 'database/database.php';
include 'test.php';
if(isset($_GET['movie'])){
$res = get_movie($_GET['movie']);
$id = $_GET['movie'];
}
else{
  $res_id = mysql_fetch_row((mysql_query("SELECT `movie_id` FROM `movie` ORDER BY `movie_id` DESC LIMIT 1 ")));
  $res = get_movie($res_id[0]);
  $id = $res_id[0];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Strona główna</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css"  href="css/style_review.css" >
</head>
<?php include 'header.php'; ?>
<div class="container-fluid">
<section class="main-page">
  <div class="photo_title">
  <img src=<?php echo $res['movie_image']; ?> class="logo">
  </div>
  <div class="desc">
  <h2> <?php echo $res['movie_name'] ; echo "  (".$res['movie_year'].")" ?></h2>
  <p><b>Type :  </b><?php echo " ".$res['movietype_label'] ?> </p>
  <p><b>Main Actor: </b><?php echo " ".$res['actor_fullname'] ?></p>
  <p><b>Director: </b><?php echo " ".$res['director_fullname'] ?></p>
  </div>
</section>
<section class="review">
<div class="comment">
<h3> Comments </h3>
<div class="add_comment">
<?php 
echo "<form method='POST' name='rev' action='index.php?movie=$id'>";
?>
    <p><input class="input_review" name = "title" type="text" placeholder="Title"></p><br>
     <p><input class="input_review" name = "signature" type="text" placeholder="Signature"></p><br>
    <p><textarea rows=4 cols=300 name="comment" placeholder="Your comment.."  class="input_review"></textarea></p><br>
    <p class="input_review" id="grade">  
      </p>
      <input type="radio" name="grade" value="1"> 1
      <input type="radio" name="grade" value="2"> 2 
      <input type="radio" name="grade" value="3" checked> 3 
      <input type="radio" name="grade" value="4"> 4 
      <input type="radio" name="grade" value="5"> 5
      <p>
      <input type="hidden" name = "review" value="true">
      <input type="submit" value="Add comment"></a></p>
    </form>
</div>
</div>
</section>
<?php
if(isset($_POST['review'])){
if($_POST['review'] == 'true'){
  add_rev($res['movie_id']);
  $_GET['movie'] = $id;
}
}
function add_rev($id){
  $review_auth = 'false';
  $date=date("Y-m-d");
  $title = $_POST['title'];
  $comment = $_POST['comment'];
  $grade = $_POST['grade'];
  $signature = $_POST['signature'];
  $image = rand(1,6).".png ";
  $add_rev = "INSERT INTO `reviews`(`review_movie_id`, `review_date`, `review_name`, `review_comment`, `review_rating`,`review_signature`,`review_image`) VALUES ('$id','$date','$title','$comment','$grade','$signature','images/avatars/$image')";
  $res=mysql_query($add_rev);
};
$query_rev="SELECT `review_date`,`review_name`,`review_comment`,`review_rating`,`review_signature`,`review_image` FROM `reviews` WHERE `review_movie_id` =".$id;
$reviews = mysql_query($query_rev);  
while ($data = mysql_fetch_assoc($reviews)) {
  echo "<section class='review'>
    <div class='user_box'>
    <img src=".$data['review_image']."class='img_user'/>
      <p>".$data['review_signature']." </p>
    </div>
  <div class='review_conts'>
  <a href='#' class='delete'> Usuń komentarz </a>
    <div class='review_content'>
      <p style='font-weight:bold ;'>".$data['review_name']."</p>
      <a style='font-style: italic;'>".$data['review_comment']."</a>
    </div>
  <div class='review_details'>
      <p id='date'>Date : ".$data['review_date']."</p> 
      <p id='grade'> Rate : ".$data['review_rating']."</p>
      
      </section>";
}
?>

</body>
</html>