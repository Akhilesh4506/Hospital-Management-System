<?php
$con=mysqli_connect("localhost:3308","root","","Hospital");
if(mysqli_connect_errno())
{
 echo"failed to connect to mysql:",mysqli_connect_error();
}
$count=0;
$id=$_POST["id"];
$name=$_POST["name"];
$sp=$_POST["sp"];
$doj=$_POST["doj"];
$exp=$_POST["exp"];
$age=$_POST["age"];
$no=$_POST["no"];
$type=$_POST["type"];
$bed=$_POST["bed"];
$charge=$_POST["charge"];
$pat=$_POST["pat"];
$search=$_POST['search'];
 if(empty($id))
                               {
                                  $idErr = 'Id should not be empty';
                                   $count=1;
                               }
                       if(empty($name))
                               {
                                  $nameErr = 'Name should not be empty';
                                  $count=1;
                               }
                       elseif(!preg_match("/^[a-zA-Z]*$/",$name))
                               {
                                   $nameErr = 'only letters and white spaces are allowed';
                              $count=1; }
                       if(empty($sp))
                               {
                                  $spErr = 'Specialization should not be empty';
                              $count=1; }
                      /* elseif($sp == "Physician" || $sp == "Surgeon" || $sp == "Dentist")
                               {
                                   $spErr = '';
                               }
                       else
                              {    $spErr = 'Specialization can only be Physician,Surgeon or Dentist';
                               $count=1;}*/
                       
                       if(empty($doj))
                               {
                                  $dojErr = 'Date of joining should not be empty';
                               $count=1;}
                        if(empty($exp))
                               {
                                  $expErr = 'Experience should not be empty';
                              $count=1; }
                       if(empty($age))
                               {
                                  $ageErr = 'Age should not be empty';
                              $count=1; }
                       elseif(!preg_match("/^[0-9]*$/",$age))
                               {
                                   $ageErr = 'Age should contain only numeric values';
                              $count=1; }
                        if(empty($no))
                               {
                                  $noErr = 'contact should not be empty';
                              $count=1; }
                         if(empty($type))
                               {
                                  $typeErr = 'Room type should not be empty';
                               $count=1;}
                         /*elseif($type == "General" || $type == "ICU" || $type == "Private")
                               {
                                   $typeErr = '';
                              $count=1; }
                         else
                                {  $typeErr = 'Room type can only be General, ICU or Private';
                               $count=1;   }*/
                         if(empty($bed))
                               {
                                  $bedErr = 'No of beds should not be empty';
                               $count=1;}
                         elseif($bed>20)
                               {
                                   $bedErr = 'No. of beds should not exceed 20';
                               $count=1;}
                         if(empty($charge))
                               {
                                  $chargeErr = 'This box should not be empty';
                               $count=1;}
                             if(empty($pat))
                               {
                                  $patErr = 'This box should not be empty';
                               $count=1;}

                         if($search == "Physician" || $search == "Surgeon" || $search == "Dentist")
                               {
                                   $searchErr = '';
                               }
                       else
                              {    $searchErr = 'Specialization can only be Physician,Surgeon or Dentist';
                              $count=1; }
                    
 
if(!mysqli_query($con, "INSERT INTO Doctors(ID, Name, Specialization, DOJ, Total_experience, Age, Contact_number) VALUES($id, '$name','$sp', $doj, $exp, $age, $no)")
||!mysqli_query($con, "INSERT INTO Rooms_Wards(Type, Total_no_of_beds, Charges_per_day, Number_of_patients) VALUES('$type', $bed, $charge, $pat)") || $count==1)
 {
 include("Q9_hp_form.html");
  }
else{
 echo "REcord Added";


echo "<br>","-----------------------Doctors--------------------------","<br>";
$res=mysqli_query($con,"SELECT * FROM Doctors");
while($row=mysqli_fetch_array($res))
{
echo $row['ID'], "  ", $row['Name'], " ", $row['Specialization'], " ", $row['DOJ']," ", $row['Total_experience'], " ", $row['Age'], " ", $row['Contact_number'];  
echo "<br>";
}
 
echo "<br>","-----------------------Rooms--------------------------","<br>";
$res2=mysqli_query($con,"SELECT * FROM Rooms_Wards");
while($row=mysqli_fetch_array($res2))
{
echo $row['Type'], "  ", $row['Total_no_of_beds'], " ", $row['Charges_per_day'], " ", $row['Number_of_patients'];  
echo "<br>";
}

echo "<br>","-----------------------Based on specialization--------------------------","<br>";
$res3=mysqli_query($con,"SELECT * FROM Doctors WHERE Specialization='$search'");
while($row=mysqli_fetch_array($res3))
{
 echo $row['ID'], "  ", $row['Name'], " ", $row['Specialization'], " ", $row['DOJ']," ", $row['Total_experience'], " ", $row['Age'], " ", $row['Contact_number']; 
echo "<br>";
}
}

mysqli_close($con);
?>



