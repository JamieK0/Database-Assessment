<?php //Tells system PHP is being used
$con=mysqli_connect("", 'root', 'root', "YR122024"); //adds db credentials to $con variable
if (mysqli_connect_errno()){
    throw new RuntimeException('mysqli connection error: '.mysqli_connect_error());
}
mysqli_set_charset($con, 'utf8mb4');
if (mysqli_errno($con)){
    throw new RuntimeException('mysqli error: '.mysqli_error($con));
}x

echo "Connection Established";

$result = mysqli_query($con, "SELECT * FROM Student_Info");

while($row = mysqli_fetch_array($result))
{
echo "The student's name is: ";
echo $row['First_Name'];
echo " ";
echo $row['Last_Name'];
echo " ";
echo "and their Date of Birth is: ";
echo $row['DOB'];
echo " ";
echo $row['House_Team'];
echo " ";
echo "<BR>";
}

?>