<?php
require '../database/database.php';
$type=check_type($_POST['type']);

function check_type($type){
    $query="SELECT movietype_id FROM movietype WHERE movietype_label = '$type' ";
    $res_check = mysql_query($query) or die(mysql_error());
    if(mysql_fetch_row($res_check) == false){
        $add = "INSERT INTO movietype (`movietype_label`) VALUES ('$type')";
        $res_add= mysql_query($add);
        header("Location:add_type.php?message=true");
    }
    else{
        $search = "SELECT movietype_id FROM movietype WHERE movietype_label= '$type'";
        $res_type = mysql_query($search) or die (mysql_error());
        $row = mysql_fetch_row($res_dirId);
        return $row;
        header("Location:add_type.php?message=false");
    }
}
?>