<?php
$con=mysqli_connect("localhost:3308","root","","Hospital");
if(mysqli_connect_errno())
{
 echo"failed to connect to mysql:",mysqli_connect_error();
}
$sql="CREATE TABLE Rooms_Wards(Type CHAR(20),Total_no_of_beds INT, Charges_per_day INT, Number_of_patients INT)";
if(mysqli_query($con,$sql))
{
echo "Table Rooms/Wards created successfully";
}
else
{
echo "error creating Table",mysqli_error($con);
}
mysqli_close($con);
?>