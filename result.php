<?php
    require_once 'config/database.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body{
            background-color: #BFBFBF;
        }
    </style>
    </head>
    <body>

    </body>

</html>

<?php

$result = "SELECT `Right`, `Left`, `Forward`, `Backward`, `Stop` FROM `controller`
            ORDER BY id DESC
            LIMIT 1";

$query= mysqli_query($mysqli, $result) or die(mysql_error());
while($row = mysqli_fetch_assoc($query)){
    foreach($row as $row){
        print "$row\t";
    }
}
?>