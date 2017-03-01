<?php
require 'database/database.php';
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
<head>
    <title>Dodaj film</title>
</head>
<body>
<form method="get" action="add/add_movie_proc.php">
    Tytuł filmu: <input type="text" name="title_movie">
    Główny aktor : <input type="text" name="leadactor">
    Reżyser : <input type="text" name="director">
    Rok produkcji : <select name="year">
        <?php
            for ($i=date("Y");$i >= 1900;$i--){
                echo "<option value=".$i.">$i</option>";
            }
        ?>
    </select>
    Gatunek : <select name="type">
        <?php
            $count = 0;
            while($row = mysql_fetch_assoc($res)){
                echo "<option value=".$row['movietype_id'].">".$row['movietype_label']."</option>";
            }
        ?>
    </select>
    <input type="submit" name="sub_add_moving" value="Dodaj !">
</form>
<?php

?>
</body>
</html>