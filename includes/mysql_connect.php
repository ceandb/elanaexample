<?php
$server = 'localhost';
$username = 'root';
$password= '';
$database ='elanabd';

$mysql = mysqli_connect ($server,$username,$password,$database);
if (!$mysql)
{
    die("Error" . mysqli_connect_error());
}


