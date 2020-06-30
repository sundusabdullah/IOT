<?php
    require_once 'config/database.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    <body>

        <div class="controller pl-5 pr-5">
            <br><br>
            <div class="buttons text-center" style="text-align:center" role="group">
            
                <form action="" class="pl-5 pr-5" method="post">
                    <div class="form-group">
                        <label >Right</label>
                        <input style="width: 100%;" type="number" class="form-control" name="right">
                    </div>

                    <div class="form-group">
                        <label>Forward</label>
                        <input style="width: 100%;" type="number" class="form-control" name="forward">
                    </div>

                    <div class="form-group">
                        <label>Left</label>
                        <input style="width: 100%;;" type="number" class="form-control" name="left">
                    </div>

                    <button style="float: center; margin:5px;" type="submit"  name="save"  class="btn btn-success">Save</button>
                    <button style="float: center; margin:5px;" type="submit"  name="start"  class="btn btn-secondary">Start</button>
                    <button style="float: center; margin:5px;" type="submit"  name="delete"  class="btn btn-danger">Delete</button>   
                </form>
            </div>
        </div>
    </body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $right = (int) $_POST['right'] ;
    $forward = (int) $_POST['forward'];
    $left = (int) $_POST['left'];

    // Save data in DB 
    if (isset($_POST["save"])){
        $sql =  "INSERT INTO `roport_info`(`Right`, `Forward`, `Left`) VALUES ($right, $forward, $left)";

        if(mysqli_query($mysqli, $sql)){
            echo "";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }

        $result = "SELECT `Right`, `Left`, `Forward` FROM `roport_info`";
        echo "<center><h2>Robot Tracking</h2>";
        echo "<center><table border='1'>
        <tr>
        <th>Right</th>
        <th>Forward</th>
        <th>Left</th>
        </tr>";
        if ($result = $mysqli->query($result)) {
            while($row = $result->fetch_assoc())
            {
            echo "<tr>";
            echo "<td>" . $row['Right'] . "</td>";
            echo "<td>" . $row['Forward'] . "</td>";
            echo "<td>" . $row['Left'] . "</td>";
            echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_close($mysqli);
    } 
    // Delete data in label
    elseif(isset($_POST["delete"])){
        $right = '';
        $forward = '';
        $left = '';
    } 
    // Start to draw line
    elseif(isset($_POST["start"])){

        //Forward
        // echo "<center><h2>Robot Path</h2>";
        // echo '<center><svg height="210" width="500">
        //         <line x1="0" y1="0" x2="0" y2="' .$forward.'" style="stroke:rgb(255,0,0);stroke-width:2"/>
        //       </svg>';

        //Right
        // echo '<center><svg height="210" width="500">
        //     <line x1=""' .$forward.'"" y1="" x2=""' .$right.'"" y2=" " style="stroke:rgb(255,0,0);stroke-width:2"/>
        //     </svg>';

        // //Left
        // echo '<svg height="210" width="500">
        // <line x1="0" y1="0" x2="0" y2="' .$forward.'" style="stroke:rgb(255,0,0);stroke-width:2"/>
        // </svg>';
    }
}

?>




