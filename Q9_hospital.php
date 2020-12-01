<?php
$con=mysqli_connect("localhost:3308","root","");
if(mysqli_connect_errno())
{
 echo"failed to connect to mysql:",mysqli_connect_error();
}
$sql="CREATE DATABASE Hospital";
if(mysqli_query($con,$sql))
{
echo "database MCA2020 created successfully";
}
else
{
echo "error creating database",mysqli_error($con);
}
mysqli_close($con);
?>