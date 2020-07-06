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
        .buttons{
            background-color: #E7E7E9;
        }
        .btn{
            background-color: #B563C5;
            border-color: #B563C5;
            margin: 0;
        }
               
        .stop{
            background-color: red;
            border-color: red;
            position: absolute;
            top: 20%;
            left: 50%;
        }

    </style>
    </head>
    <body>
        <div class="controller">
            <br><br>
            <div class="buttons text-center" role="group">
                <form action="" method="post">

                    <br><br><br><br>
                    <button type="submit" class="stop btn-danger">Stop</button>  
                    <br><br>
                    <button type="submit"  value="R" name="R"  class="btn btn-secondary">Right</button>
                    <button type="submit"  name="L"  class="btn btn-secondary">Left</button>
                    <button type="submit"  name="F"  class="btn btn-secondary">Forwards</button>
                    <button type="submit"  name="B"  class="btn btn-secondary">Backwards</button>
                    <br><br><br><br>
                </from>
            </div>
        </div>
    </body>
</html>

<?php 

$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["R"])){
        $result = 'R';
        $sql =  "INSERT INTO `controller` (`Right`, `Left`, `Forward`, `Backward`, `Stop`) VALUES ('$result', '', '', '', '')";
        if(mysqli_query($mysqli, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }
        mysqli_close($mysqli);
        header('location: result.php');
    } 

    else if (isset($_POST["L"])){
        $result = 'L';
        $sql =  "INSERT INTO `controller` (`Right`, `Left`, `Forward`, `Backward`, `Stop`) VALUES ('', '$result', '', '', '')";
        if(mysqli_query($mysqli, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }
        mysqli_close($mysqli);
        header('location: result.php');
    }

    else if (isset($_POST["F"])){
        $result = 'F';
        $sql =  "INSERT INTO `controller` (`Right`, `Left`, `Forward`, `Backward`, `Stop`) VALUES ('', '', '$result', '', '')";
        if(mysqli_query($mysqli, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }
        mysqli_close($mysqli);
        header('location: result.php');
    }

    else if (isset($_POST["B"])){
        $result = 'B';
        $sql =  "INSERT INTO `controller` (`Right`, `Left`, `Forward`, `Backward`, `Stop`) VALUES ('', '', '', '$result', '')";
        if(mysqli_query($mysqli, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }
        mysqli_close($mysqli);
        header('location: result.php');

    }
    else{
        $result = 'S';
        $sql =  "INSERT INTO `controller` (`Right`, `Left`, `Forward`, `Backward`, `Stop`) VALUES ('', '', '', '', '$result')";
        if(mysqli_query($mysqli, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }
        mysqli_close($mysqli);
        header('location: result.php');
    }
}

?>

