<?php
$con=mysqli_connect("localhost:3308","root","","Hospital");
if(mysqli_connect_errno())
{
 echo"failed to connect to mysql:",mysqli_connect_error();
}
$sql="CREATE TABLE Doctors(ID INT, Name CHAR(20),Specialization CHAR(20), DOJ CHAR(20),Total_experience VARCHAR(20),Age INT, Contact_number INT)";
if(mysqli_query($con,$sql))
{
echo "Table Docters created successfully";
}
else
{
echo "error creating Table",mysqli_error($con);
}
mysqli_close($con);
?>