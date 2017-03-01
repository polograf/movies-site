<?php
if(!empty($_GET['message']))
    if(($_GET['message'] == 'true')){
        echo "<script language='JavaScript'>alert( 'Ten gatunek jest już w naszej bazie !');</script>";
    } else if(($_GET['message'] == 'false')){
        echo "<script language='JavaScript'>alert('Gatunek został dodany do naszej bazy!');</script>";
    }
?>
<!DOCTYPE html>
<head>
    <title>
        Dodaj Gatunek
    </title>
</head>
<body>
<form method="POST" action="add/add_type_proc.php">
    Gatunek <input type="text" name="type">
    <input type="submit" name="submit" Value="Dodaj">
</form>
</body>
</html>