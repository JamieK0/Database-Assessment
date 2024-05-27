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


  $result = mysqli_query($con, "SELECT * FROM Student_Info"); //This is needed for the HSC exam
  
  while ($row = mysqli_fetch_array($result)) {
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

  /////////////////////////////
  // Code for search form
/////////////////////////////
  
  $nameErr = "";
  $name = ""; //Name entered into search box
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      echo $_POST["name"]; //debug
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
      }
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
  <title>Student Lookup</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="Student-Lookup.css" media="screen">
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
  <meta property="og:title" content="Student Lookup">
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
                href="Student-Lookup.html" style="padding: 10px 20px;">Student Lookup</a>
            </li>
            <li class="u-nav-item"><a
                class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="Add-Student.html" style="padding: 10px 20px;">Add Student</a>
            </li>
          </ul>
        </div>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-inner-container-layout u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Student-Lookup.html">Student
                    Lookup</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Add-Student.html">Add Student</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav>
    </div>
  </header>
  <section class="u-clearfix u-section-1" id="sec-c34f">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-form u-form-1">

        <div style="max-width: 300px;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="u-form-group u-form-partition-factor-2 u-form-group-7">
          Name: <input class="u-input u-input-rectangle" type="text" name="name" value="<?php echo $name; ?>">
          <span class="error">* <?php echo $nameErr; ?></span>
        </div>
      </form>
      </div>


        <form class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" method="post"
          source="text" name="name" style="padding: 10px;">

          <div class="u-form-group u-form-partition-factor-2 u-form-group-7">
                  <label for="text-d46f" class="u-label">Student Name</label>
                  <input type="text" placeholder="" id="text-d46f" name="name" class="u-input u-input-rectangle">
                </div>

          <div class="u-align-center u-form-group u-form-submit u-label-top">
            <a href="#" class="u-btn u-btn-submit u-button-style">Submit</a>
            <input type="submit" value="submit" class="u-form-control-hidden">
          </div>
        </form>
      </div>
    </div>
  </section>
  <section class="u-align-center u-clearfix u-section-2" id="sec-9c5e">

    <p style="text-align:left;
    padding-top: 50px;
    padding-right: 30px;
    padding-bottom: 50px;
    padding-left: 80px;">
      <?php
      $postName = $_POST["name"];
      echo $postName;
      $studentInfo = mysqli_query($con, "SELECT * FROM Student_Info WHERE First_Name LIKE '%$postName%'");
      while ($row = mysqli_fetch_array($studentInfo)) {
        echo $row['First_Name'];
        echo " ";
        echo $row['Last_Name'];
        echo "<br>";
        echo $row['DOB'];
      } 
      // Todo, For each row, echo a table with the first name last name and pciture of student, along iwth a button to choose this student IF query rows > 1.

      ?>
    </p>
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <div class="u-expanded-width u-tab-links-align-left u-tabs u-tabs-1">
        <ul class="u-border-2 u-border-palette-1-base u-spacing-10 u-tab-list u-unstyled" role="tablist">
          <li class="u-tab-item" role="presentation"><a
              class="active u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-1"
              id="link-tab-0da5" href="#tab-0da5" role="tab" aria-controls="tab-0da5" aria-selected="true">Student
              Details</a>
          </li>
          <li class="u-tab-item" role="presentation"><a
              class="u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-2"
              id="link-tab-14b7" href="#tab-14b7" role="tab" aria-controls="tab-14b7" aria-selected="false">Parent's
              Details</a>
          </li>
          <li class="u-tab-item" role="presentation"><a
              class="u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-3"
              id="link-tab-2917" href="#tab-2917" role="tab" aria-controls="tab-2917" aria-selected="false">Grades </a>
          </li>
          <li class="u-tab-item u-tab-item-4" role="presentation"><a
              class="u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-4"
              id="tab-93fc" href="#link-tab-93fc" role="tab" aria-controls="link-tab-93fc"
              aria-selected="false">Attendance</a>
          </li>
        </ul>
        <div class="u-tab-content">
          <div class="u-container-style u-tab-active u-tab-pane u-white u-tab-pane-1" id="tab-0da5" role="tabpanel"
            aria-labelledby="link-tab-0da5">
            <div class="u-container-layout u-valign-top u-container-layout-1">
              <h4 class="u-text u-text-default u-text-1">Basic Settings</h4>
              <div class="u-expanded-width u-table u-table-responsive u-table-1">

                <table class="u-table-entity">
                  <colgroup>
                    <col width="25%">
                    <col width="25%">
                    <col width="25%">
                    <col width="25%">
                  </colgroup>
                  <tbody class="u-table-alt-grey-5 u-table-body">
                    <tr style="height: 51px;">
                      <td class="u-table-cell">Column 1</td>
                      <td class="u-table-cell">Column 2</td>
                      <td class="u-table-cell">Column 3</td>
                      <td class="u-table-cell">Column 4</td>
                    </tr>
                    <tr style="height: 51px;">
                      <td class="u-table-cell">Row 1</td>
                      <td class="u-table-cell">Description</td>
                      <td class="u-table-cell">Description</td>
                      <td class="u-table-cell">Description</td>
                    </tr>
                    <tr style="height: 51px;">
                      <td class="u-table-cell">Row 2</td>
                      <td class="u-table-cell">Description</td>
                      <td class="u-table-cell">Description</td>
                      <td class="u-table-cell">Description</td>
                    </tr>
                    <tr style="height: 51px;">
                      <td class="u-table-cell">Row 3</td>
                      <td class="u-table-cell">Description</td>
                      <td class="u-table-cell">Description</td>
                      <td class="u-table-cell">Description</td>
                    </tr>
                    <tr style="height: 52px;">
                      <td class="u-table-cell">Row 4</td>
                      <td class="u-table-cell">Description</td>
                      <td class="u-table-cell">Description</td>
                      <td class="u-table-cell">Description</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="u-align-left u-container-style u-tab-pane u-white u-tab-pane-2" id="tab-14b7" role="tabpanel"
            aria-labelledby="link-tab-14b7">
            <div class="u-container-layout u-valign-top u-container-layout-2">
              <p class="u-text u-text-default u-text-2">Sample text. Click to select the text box. Click again or double
                click to start editing the text. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur.<br>
                <br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.&nbsp;Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur.
              </p>
            </div>
          </div>
          <div class="u-container-style u-tab-pane u-white u-tab-pane-3" id="tab-2917" role="tabpanel"
            aria-labelledby="link-tab-2917">
            <div class="u-container-layout u-container-layout-3">
              <h4 class="u-text u-text-default u-text-3">Be The First To Review This Product!</h4>
              <p class="u-text u-text-default u-text-4">Sample text. Click to select the text box. Click again or double
                click to start editing the text.</p>
              <a href="" class="u-btn u-button-style u-btn-1">write product review</a>
            </div>
          </div>
          <div class="u-container-style u-tab-pane u-white u-tab-pane-4" id="link-tab-93fc" role="tabpanel"
            aria-labelledby="tab-93fc">
            <div class="u-container-layout u-container-layout-4"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="u-clearfix u-section-3" id="sec-13fe">
    <div class="u-clearfix u-sheet u-sheet-1"></div>
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