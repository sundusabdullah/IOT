<?

$connection = [
    'host'=> 'localhost',
    'user' => 'root',
    'database' => 'roport'
];

$mysqli = mysqli_connect($connection['host'],
 $connection['user'],
  "", 
  $connection['database']
);

if ($mysqli->connect_error){
    die("Error connecting".$mysqli->connect_error);
}