<?php
// connect to the database
$conn = mysqli_connect('localhost', 'ninjauser', 'Password#123', 'ninja_table') or die($conn);

// check connection
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}
?>