<?php
require '../database/database.php';
$query="SELECT * FROM movietype";
$res = mysql_query($query) or die(mysql_error());
if(!empty($_GET['message'])) {
    if (($_GET['message'] == 'true')) {
        echo "<script language='JavaScript'>alert('Film został pomyślnie dodany do bazy!');</script>";
    } else if (($_GET['message'] == 'false')) {
        echo "<script language='JavaScript'>alert('Ten film jest już w naszej bazie!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add movie</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<?php include 'header.php' ;?>
<section>
  <div class="add_movie">
  <form method = "POST" action="add_movie_proc.php" enctype="multipart/form-data">
    <p>Title :<input type="text" name="title_movie"></p>
    <p>Lead actor : <input type="text" name="leadactor"></p>
    <p>Director : <input type="text" name="director"></p>
    <p>Year : <select name="year">
        <?php
            for ($i=date("Y");$i >= 1900;$i--){
                echo "<option value=".$i.">$i</option>";
            }
        ?></select>
      <a>Type : <select name="type">
        <?php
            $count = 0;
            while($row = mysql_fetch_assoc($res)){
                echo "<option value=".$row['movietype_id'].">".$row['movietype_label']."</option>";
            }
        ?></select></a>
      <p>Cover : <input type="file" name = "file"></p>
    <input type="submit" value="Add a movie">
  </form>
  </div>
</section>
</body>
</html>