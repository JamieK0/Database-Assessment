<?PHP
//The line above is used to tell our system that we're using PHP

  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

$con=mysqli_connect("", 'root', 'root', "YR122024");
//The code above puts the database credentials into a variable called $con

if (mysqli_connect_errno()) {
throw new RuntimeException('mysqli connection error: '. mysqli_connect_error());
}

mysqli_set_charset($con, 'utf8mb4');

if (mysqli_errno($con)) {
throw new RuntimeException('mysqli error: ' . mysqli_error($con));
}


$result = mysqli_query($con, "SELECT * FROM Student_Info");

$result = mysqli_query($con, "SELECT * FROM Student_Info");
//The above code where it says "Select... etc." is SQL. Know this for the HSC!!!
// The above code will look for specific data from a table in your database.
//eg. SELECT (put in the column names... or * for all column names) FROM (Table name)
// optional: WHERE (search criteria... eg. first_name = "John" / field from the form
// of your web page.


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

//The line below is used to tell our system that we've finished using PHP
?>