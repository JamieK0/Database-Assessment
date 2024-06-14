<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>

  <?PHP
  //The line above is used to tell our system that we're using PHP
  
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
  
  $con = mysqli_connect("", 'root', 'root', "YR122024"); //The code above puts the database credentials into a variable called $con
  
  if (mysqli_connect_errno()) {
    throw new RuntimeException('mysqli connection error: ' . mysqli_connect_error());
  }

  mysqli_set_charset($con, 'utf8mb4');

  if (mysqli_errno($con)) {
    throw new RuntimeException('mysqli error: ' . mysqli_error($con));
  }


  // Receive student number from last page

  $studentNumber = $_POST['studentNumber']; 
  echo "Data received: " . $studentNumber; 


  /////////////////////////////
  // Code for form
/////////////////////////////
  
  // Establish page 1 form variables
  $StuFirstName = "";
  $StuLastName = "";
  $StuEmail = "";
  $StuDOB = "";
  $StuYear = "";
  $StuHouse = "";
  $StuPC = "";
  $StuNumber = "";

  // Establish page 2 form variables
  $P1FirstName = $P2FirstName = $P1LastName = $P2LastName = $P1Address = $P2Address = $P1Mobile = $P2Mobile = $P1Work = $P2Work = $P1Home = $P2Home = "";

  // Establish page 3 form variables
  $Sub1 = $Sub2 = $Sub3 = $Sub4 = $sub5 = $Sub6 = $Sub7 = $sub8 = "";

  $StuFirstNameErr = "";
  $StuLastNameErr = "";
  $StuEmailErr = "";
  $StuDOBErr = "";
  $StuYearErr = "";
  $StuHouseErr = "";
  $StuPCErr = "";
  $StuNumberErr = "";


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Page 1
    $StuFirstName = test_input($_POST["StuFirstName"]);
    $StuLastName = test_input($_POST["StuLastName"]);
    $StuEmail = test_input($_POST["StuEmail"]);
    $StuDOB = test_input($_POST["StuDOB"]);
    $StuYear = test_input($_POST["StuYear"]);
    $StuHouse = test_input($_POST["StuHouse"]);
    $StuPC = test_input($_POST["stuPC"]);
    $StuNumber = test_input($_POST["StuNumber"]);

    // Page 2
    $P1FirstName = test_input($_POST["P1FirstName"]);
    $P2FirstName = test_input($_POST["P2FirstName"]);
    $P1LastName = test_input($_POST["P1LastName"]);
    $P2LastName = test_input($_POST["P2LastName"]);
    $P1Address = test_input($_POST["P1Address"]);
    $P2Address = test_input($_POST["P2Address"]);
    $P1Mobile = test_input($_POST["P1Mobile"]);
    $P2Mobile = test_input($_POST["P2Mobile"]);
    $P1Work = test_input($_POST["P1Work"]);
    $P2Work = test_input($_POST["P2Work"]);
    $P1Home = test_input($_POST["P1Home"]);
    $P2Home = test_input($_POST["P2Home"]);


    // Page 3
    $Sub1 = test_input($_POST["Sub1"]);
    $Sub2 = test_input($_POST["Sub2"]);
    $Sub3 = test_input($_POST["Sub3"]);
    $Sub4 = test_input($_POST["Sub4"]);
    $Sub5 = test_input($_POST["Sub5"]);
    $Sub6 = test_input($_POST["Sub6"]);
    $Sub7 = test_input($_POST["Sub7"]);
    $Sub8 = test_input($_POST["Sub8"]);

    // Insert into Student Info Table
    $queryStuInfo = "INSERT INTO `Student_Info` (`First_Name`, `Last_Name`, `Grade`, `PC_Class`, `Student_Number`, `DOB`, `House_Team`) 
      VALUES ('$StuFirstName', '$StuLastName', '$StuYear', '$StuPC', '$StuNumber', '$StuDOB', '$StuHouse');";
    if (mysqli_query($con, $queryStuInfo)) {
      echo "New student added successfully";
    } else {
      echo "Error: " . $queryStuInfo . "<br>" . mysqli_error($con);
    }

    // Insert into Contact Info Table
    $queryContInfo = "INSERT INTO `Contact_Info` (`First_Name_1`, `First_Name_2`, `Last_Name_1`, `Last_Name_2`, `Student_Number`, `Email`, `Home_Address_1`, `Home_Address_2`, `Home_Phone_1`, `Home_Phone_2`, `Work_Phone_1`, `Work_Phone_2`, `Mobile_Phone_1`, `Mobile_Phone_2`) 
        VALUES ('$P1FirstName', '$P2FirstName', '$P1LastName', '$P2LastName', '$StuNumber', '$StuEmail', '$P1Address', '$P2Address', '$P1Home',  '$P2Home', '$P1Work', '$P2Work', '$P1Mobile','$P1Mobile' );";
    if (mysqli_query($con, $queryContInfo)) {
      echo "Parent Info added successfully";
    } else {
      echo "Error: " . $queryContInfo . "<br>" . mysqli_error($con);
    }

    // Insert into Subject Info Table
    $querySubInfo = "INSERT INTO `Subjects` (`Student_Number`, `Subject_1`, `Subject_2`, `Subject_3`, `Subject_4`, `Subject_5`, `Subject_6`, `Subject_7`, `Subject_8` ) 
    VALUES ('$StuNumber', '$Sub1', '$Sub2', '$Sub3', '$Sub4',  '$Sub5', '$Sub6', '$Sub7', '$Sub8' );";
if (mysqli_query($con, $querySubInfo)) {
  echo "Parent Info added successfully";
} else {
  echo "Error: " . $querySubInfo . "<br>" . mysqli_error($con);
}

  }




  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  //The line below is used to tell our system that we've finished using PHP
  ?>



  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Add Attendance</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="Add-Student.css" media="screen">
  <link rel="stylesheet" href="additional.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 6.10.5, nicepage.com">
  <meta name="referrer" content="origin">
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">



  <script type="application/ld+json">{
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "",
    "logo": "images/default-logo.png"
}</script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Add Student">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en">
  <header class="u-clearfix u-header u-palette-1-base u-header" id="sec-9160">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <a href="#" class="u-image u-logo u-image-1">
        <img src="images/default-logo.png" class="u-logo-image u-logo-image-1">
      </a>
      <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
        <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
          <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
            href="#">
            <svg class="u-svg-link" viewBox="0 0 24 24">
              <use xlink:href="#menu-hamburger"></use>
            </svg>
            <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px"
              xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
              <g>
                <rect y="1" width="16" height="2"></rect>
                <rect y="7" width="16" height="2"></rect>
                <rect y="13" width="16" height="2"></rect>
              </g>
            </svg>
          </a>
        </div>
        <div class="u-custom-menu u-nav-container">
          <ul class="u-nav u-unstyled u-nav-1">
            <li class="u-nav-item"><a
                class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="Student-Lookup.php" style="padding: 10px 20px;">Student Lookup</a>
            </li>
            <li class="u-nav-item"><a
                class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="Add-Student.php" style="padding: 10px 20px;">Add Student</a>
            </li>
          </ul>
        </div>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-inner-container-layout u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Student-Lookup.php">Student Lookup</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Add-Student.php">Add Student</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav>
    </div>
  </header>
  <section class="u-clearfix u-section-1" id="sec-11c0">
    <div class="u-clearfix u-sheet u-sheet-1">
      <p class="u-text u-text-default u-text-1">Add Attendance</p>
      <div style="padding-left: 70px;"
        class="u-carousel u-carousel-duration-250 u-carousel-fade u-form u-progress-text-hidden-sm u-progress-text-hidden-xs u-form-1"
        data-interval="0" data-u-ride="false">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
          class="u-clearfix u-form-spacing-10 custom-form u-inner-form" source="" name="form">
          <div class="u-carousel-inner" role="listbox">
            <div class="u-carousel-item u-form-step u-slide u-active">
              <div class="u-form-group u-form-name u-form-partition-factor-2"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="name-883e" class="u-label">Term 1</label>
                <input type="text" placeholder="Number of Days Absent" value="<?php echo $T1; ?>"
                  name="T1" class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-group-2"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-acc6" class="u-label">Term 2</label>
                <input type="text" placeholder="Number of Days Absent" value="<?php echo $T2; ?>"
                  name="T2" class="u-input u-input-rectangle">
              </div>
              <div class="u-form-email u-form-group"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="email-883e" class="u-label">Term 3</label>
                <input type="email" placeholder="Number of Days Absent" value="<?php echo $T3; ?>" name="T3"
                  class="u-input u-input-rectangle">
              </div>
              <div class="u-form-date u-form-group u-form-partition-factor-3 u-form-group-4"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="date-a19e" class="u-label">Term 4</label>
                <input type="text" name="T4" value="<?php echo $T4; ?>" placeholder="Number of Days Absent"
                  class="u-input u-input-rectangle" >
              </div>
              <div
                class="u-form-group u-form-number u-form-number-layout-number u-form-partition-factor-3 u-form-group-5"
                style="text-align:left; padding-top: 10px; padding-right: 5px; padding-bottom: 10px;">
                <label for="number-0b03" class="u-label">Year Level</label>
                <div class="u-input-row" data-value="0">
                  <input value="0" min="7" max="12" step="1" type="number" value="<?php echo $StuYear; ?>"
                    placeholder="" name="StuYear" class="u-input u-input-rectangle u-text-black">
                </div>
              </div>
              
              <div class="u-form-group u-form-group-21"
                style="text-align:left; padding-top: 0px; padding-right: 0px; padding-bottom:0px; padding-left: 55px;">
                <input type="submit" value="Submit" name="Submit" class="u-btn u-button-style"
                  style="background-color: # ;">
              </div>

            </div>

          </div>
          <div class="u-align-left u-form-group u-form-submit">
            <a href="#" class="u-btn u-btn-step u-btn-step-prev u-button-style u-hidden">Back</a>
            <a href="#" class="u-btn u-btn-step u-btn-step-next u-button-style">Next</a>


            <input type="hidden" value="" name="recaptchaResponse">
            <input type="hidden" value="" name="recaptchaResponse">
        </form>
      </div>
    </div>
  </section>



  <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-3fdc">
    <div class="u-clearfix u-sheet u-sheet-1">
      <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the Text Element.</p>
    </div>
  </footer>
  <section class="u-backlink u-clearfix u-grey-80">
    <p class="u-text">
      <span>This site was created with the </span>
      <a class="u-link" href="https://nicepage.com/" target="_blank" rel="nofollow">
        <span>Nicepage</span>
      </a>
    </p>
  </section>

</body>

</html>