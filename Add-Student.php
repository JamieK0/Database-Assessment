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


  /////////////////////////////
  // Code for form
/////////////////////////////
  
  // Establish form variables
  $StuFirstName = "";
  $StuLastName = "";
  $StuEmail = "";
  $StuDOB = "";
  $StuYear = "";
  $StuHouse = "";
  $StuPC = "";
  $StuNumber = "";

  $P1FirstName = $P2FirstName = $P1LastName = $P2LastName = $P1Address = $P2Address = $P1Mobile = $P2Mobile = $P1Work = $P2Work = $P1Home = $P2Home = "";

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
  <title>Add Student</title>
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
      <p class="u-text u-text-default u-text-1">Add Student</p>
      <div style="padding-left: 70px;"
        class="u-carousel u-carousel-duration-250 u-carousel-fade u-form u-progress-text-hidden-sm u-progress-text-hidden-xs u-form-1"
        data-interval="0" data-u-ride="false">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
          class="u-clearfix u-form-spacing-10 custom-form u-inner-form" source="" name="form">
          <div class="u-carousel-inner" role="listbox">
            <div class="u-carousel-item u-form-step u-slide u-active">
              <div class="u-form-group u-form-name u-form-partition-factor-2"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="name-883e" class="u-label">First Name</label>
                <input type="text" placeholder="Enter First Name of the Student" value="<?php echo $StuFirstName; ?>"
                  name="StuFirstName" class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-group-2"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-acc6" class="u-label">Last Name</label>
                <input type="text" placeholder="Enter Last name of the Student" value="<?php echo $StuLastName; ?>"
                  name="StuLastName" class="u-input u-input-rectangle">
              </div>
              <div class="u-form-email u-form-group"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="email-883e" class="u-label">Email</label>
                <input type="email" placeholder="Student's Email" value="<?php echo $StuEmail; ?>" name="StuEmail"
                  class="u-input u-input-rectangle" required="">
              </div>
              <div class="u-form-date u-form-group u-form-partition-factor-3 u-form-group-4"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="date-a19e" class="u-label">Date of Birth</label>
                <input type="text" placeholder="MM/DD/YYYY" name="StuDOB" value="<?php echo $StuDOB; ?>"
                  class="u-input u-input-rectangle" required="" data-date-format="yyyy/mm/dd">
              </div>
              <div
                class="u-form-group u-form-number u-form-number-layout-number u-form-partition-factor-3 u-form-group-5"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="number-0b03" class="u-label">Year Group</label>
                <div class="u-input-row" data-value="0">
                  <input value="0" min="7" max="12" step="1" type="number" value="<?php echo $StuYear; ?>"
                    placeholder="" name="StuYear" class="u-input u-input-rectangle u-text-black">
                </div>
              </div>
              <div class="u-form-group u-form-partition-factor-3 u-form-select u-form-group-6"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="select-15af" class="u-label">House Group</label>
                <div class="u-form-select-wrapper">
                  <select name="StuHouse" class="u-input u-input-rectangle">
                    <option value="Merici" data-calc="">Merici</option>
                    <option value="Mackillop" data-calc="">Mackillop</option>
                    <option value="Chisholm" data-calc="">Chisholm</option>
                    <option value="De Paul" data-calc="">De Paul</option>
                    <option value="La Salle" data-calc="">La Salle</option>
                    <option value="Polding" data-calc="">Polding</option>
                  </select>
                  <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px"
                    viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve">
                    <polygon class="st0" points="8,12 2,4 14,4 "></polygon>
                  </svg>
                </div>
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-group-7"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-d46f" class="u-label">PC Class</label>
                <input type="text" placeholder="" value="<?php echo $StuPC; ?>" name="StuPC"
                  class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-group-8"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-9a7c" class="u-label">Student Number</label>
                <input type="text" placeholder="" value="<?php echo $StuNumber; ?>" name="StuNumber"
                  class="u-input u-input-rectangle">
              </div>
            </div>
            <div class="u-carousel-item u-form-step u-slide">
              <div class="u-form-group u-form-partition-factor-2 u-form-group-9"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-5181" class="u-label">Parent 1 First Name</label>
                <input type="text" placeholder="" value="<?php echo $P1FirstName; ?>" name="P1FirstName"
                  class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-group-10"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-c3c2" class="u-label">Parent 2 First Name</label>
                <input type="text" placeholder="" value="<?php echo $P2FirstName; ?>" name="P2FirstName"
                  class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-group-11"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-b533" class="u-label">Parent 1 Last Name</label>
                <input type="text" placeholder="" value="<?php echo $P1LastName; ?>" name="P1LastName"
                  class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-group-12"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-40f6" class="u-label">Parent 2 Last Name</label>
                <input type="text" placeholder="" value="<?php echo $P2LastName; ?>" name="P2LastName"
                  class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-group-13"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-9af3" class="u-label">Home Address</label>
                <input type="text" placeholder="" value="<?php echo $P1Address; ?>" name="P1Address"
                  class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-group-14"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-6c73" class="u-label">Home Address (Secondary)</label>
                <input type="text" placeholder="" value="<?php echo $P2Address; ?>" name="P2Address"
                  class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-15"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="phone-c448" class="u-label">Parent 1 Mobile Phone</label>
                <input type="tel"
                  pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                  placeholder="E.g. 0412345678" value="<?php echo $P1Mobile; ?>" name="P1Mobile"
                  class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-16"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="phone-dd1c" class="u-label">Parent 2 Mobile Phone</label>
                <input type="tel"
                  pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                  placeholder="E.g. 0412345678" value="<?php echo $P2Mobile; ?>" name="P2Mobile"
                  class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-17"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="phone-11a2" class="u-label">Parent 1 Work Phone</label>
                <input type="tel"
                  pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                  placeholder="E.g. 0255504321" value="<?php echo $P1Work; ?>" name="P1Work"
                  class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-18"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="phone-1927" class="u-label">Parent 2 Work Phone</label>
                <input type="tel"
                  pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                  placeholder="E.g. 0255504321" value="<?php echo $P2Work; ?>" name="P2Work"
                  class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-19"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="phone-1531" class="u-label">Home Phone</label>
                <input type="tel"
                  pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                  placeholder="E.g. 0255504321" value="<?php echo $P1Home; ?>" name="P1Home"
                  class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-20"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="phone-9df4" class="u-label">Home Phone (Secondary)</label>
                <input type="tel"
                  pattern="\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                  placeholder="E.g. 0255504321" value="<?php echo $P2Home; ?>" name="P2Home"
                  class="u-input u-input-rectangle">
              </div>
            </div>
            <div class="u-carousel-item u-form-step u-slide">
              <div class="u-form-group u-form-group-21"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-a614" class="u-label">Subject 1</label>
                <input type="text" placeholder="" id="text-a614" name="text" class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-group-22"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-6d19" class="u-label">Subject 2</label>
                <input type="text" placeholder="" id="text-6d19" name="text-1" class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-group-23"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-9824" class="u-label">Subject 3</label>
                <input type="text" placeholder="" id="text-9824" name="text-2" class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-group-24"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-bd56" class="u-label">Subject 4</label>
                <input type="text" placeholder="" id="text-bd56" name="text-3" class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-group-25"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-60ac" class="u-label">Subject 5</label>
                <input type="text" placeholder="" id="text-60ac" name="text-4" class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-group-26"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px; ">
                <label for="text-0a0b" class="u-label">Subject 6</label>
                <input type="text" placeholder="" id="text-0a0b" name="text-5" class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-group-27"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-225e" class="u-label">Subject 7</label>
                <input type="text" placeholder="" id="text-225e" name="text-6" class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-partition-factor-2 u-form-group-28"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px;">
                <label for="text-368e" class="u-label">Subject 8</label>
                <input type="text" placeholder="" id="text-368e" name="text-7" class="u-input u-input-rectangle">
              </div>
              <div class="u-form-group u-form-group-21"
                style="text-align:left; padding-top: 10px; padding-right: 20px; padding-bottom: 10px; padding-left: 160px;">
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