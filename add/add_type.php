<?php
require '../database/database.php';
$query="SELECT * FROM movietype";
$res = mysql_query($query) or die(mysql_error());
if(!empty($_GET['message'])) {
    if (($_GET['message'] == 'true')) {
        echo "<script language='JavaScript'>alert('Gatunek został pomyślnie dodany do bazy!');</script>";
    } else if (($_GET['message'] == 'false')) {
        echo "<script language='JavaScript'>alert('Ten gatunek jest już w naszej bazie!');</script>";
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
<?php include 'header.php' ;  ?>
<section>
  <div class="add_movie">
  <form method = "POST" action="add_type_proc.php" enctype="multipart/form-data">
    <p>Type:<input type="text" name="type"></p>
    <input type="submit" value="Add a type of movie">
  </form>
  </div>
</section>
</body>
</html>