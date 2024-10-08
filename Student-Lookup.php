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
    // Code for search form
/////////////////////////////
    
    $nameErr = "";
    $name = ""; //Name entered into search box
    $select2 = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }
        if (empty($_POST["Selection"])) {
            $nameErr = "Select a student";
        } else {
            $select2 = test_input($_POST["Selection"]);

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
    <link rel="stylesheet" href="additional.css">
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
            <a href="index.php" class="u-image u-logo u-image-1">
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
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="Student-Lookup.php">Student
                                        Lookup</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Add-Student.php">Add
                                        Student</a>
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
        <div style="padding: 40px 100px;">
        </div>
        <div class="">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div style="padding: 0 550px;">
                    <div class="u-form-group u-form-partition-factor-3 u-label-top u-form-group-1">
                        Search: <input class="u-input u-input-rectangle" type="text" name="name"
                            placeholder="Enter first name, last name or student number" value="<?php echo $name; ?>">
                    </div>

                    <div class="u-align-center u-form-group u-form-submit u-label-top">
                        <input type="submit" value="Submit" class="u-btn u-btn-submit u-button-style">
                    </div>
                    <input type="hidden" value="" name="recaptchaResponse">
            </form>
        </div>
        </div>
    </section>
    <div class="u-clearfix u-sheet u-sheet-1"></div>

    <div class="scrolling-wrapper" style="text-align:left;
    padding-top: 50px;
    padding-right: 30px;
    padding-bottom: 410px;
    padding-left: 80px;">

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <?php
            $postName = $_POST["name"];
            $studentInfo = mysqli_query($con, "SELECT * FROM Student_Info WHERE First_Name LIKE '%$postName%' OR Last_Name LIKE '%$postName%' OR Student_Number LIKE '%$postName%' ");

            while ($row = mysqli_fetch_array($studentInfo)) {
                $showimage = $row['Image'];
                echo ' 
                <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                <html>
                <div class="card">
                <img src="images/';
                echo $row['First_Name'];
                echo $row['Last_Name'];
                echo '.jpg " width="150" height="220"" />';
                echo '<br>';
                echo $row['First_Name'];
                echo " ";
                echo $row['Last_Name'];
                echo "<br>";
                echo "Year ";
                echo $row['Grade'];
                echo '<br>';
                echo $row['Student_Number'];
                echo '<br>';
                echo '<input type="radio" name="Selection" value="';
                echo $row['Student_Number'];
                echo '"> <label for="html">Select</label><br>
                </html> </div>';
            }
            ?>
    </div>
    <div class="u-align-center">
        <input type="submit" value="Submit" class="u-btn u-btn-submit u-button-style">
    </div>
    </form>


    <section class="u-align-center u-clearfix u-section-3" id="sec-9c5e">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="u-expanded-width u-tab-links-align-left u-tabs u-tabs-1">
                <ul class="u-border-2 u-border-palette-1-base u-spacing-10 u-tab-list u-unstyled" role="tablist">
                    <li class="u-tab-item" role="presentation"><a
                            class="active u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-1"
                            id="link-tab-0da5" href="#tab-0da5" role="tab" aria-controls="tab-0da5"
                            aria-selected="true">Student
                            Details</a>
                    </li>
                    <li class="u-tab-item" role="presentation"><a
                            class="u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-2"
                            id="link-tab-14b7" href="#tab-14b7" role="tab" aria-controls="tab-14b7"
                            aria-selected="false">Contact Infomation</a>
                    </li>
                    <li class="u-tab-item" role="presentation"><a
                            class="u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-3"
                            id="link-tab-2917" href="#tab-2917" role="tab" aria-controls="tab-2917"
                            aria-selected="false">Grades </a>
                    </li>
                    <li class="u-tab-item u-tab-item-4" role="presentation"><a
                            class="u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-4"
                            id="tab-93fc" href="#link-tab-93fc" role="tab" aria-controls="link-tab-93fc"
                            aria-selected="false">Attendance</a>
                    </li>
                </ul>
                <div class="u-tab-content">
                    <div class="u-container-style u-tab-active u-tab-pane u-white u-tab-pane-1" id="tab-0da5"
                        role="tabpanel" aria-labelledby="link-tab-0da5">
                        <div class="u-container-layout u-valign-top u-container-layout-1">
                            <div class="u-expanded-width u-table u-table-responsive u-table-1">
                                <table class="u-table-entity">
                                    <colgroup>
                                        <col width="25%">
                                        <col width="25%">
                                        <col width="25%">
                                        <col width="25%">
                                    </colgroup>
                                    <tbody class="u-table-alt-grey-5 u-table-body">
                                        <tr style="height: 104px;">
                                            <td class="u-table-cell">
                                                <h4>Student Details</h4>
                                                </j>
                                            </td>

                                            <td class="u-table-cell"></td>
                                            <td class="u-table-cell"><?php
                                            $studentInfo = mysqli_query($con, "SELECT * FROM Student_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($studentInfo)) {
                                                $showimage = $row['Image'];
                                                echo ' 
                <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                <html>
                <div class="card">
                <img src="images/';
                                                echo $row['First_Name'];
                                                echo $row['Last_Name'];
                                                echo '.jpg " width="225" height="330"" />';
                                            } ?></td>
                                        </tr>
                                        <tr style="height: 51px;">
                                            <td class="u-table-cell">Name</td>
                                            <td class="u-table-cell"><?php
                                            $studentInfo = mysqli_query($con, "SELECT * FROM Student_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($studentInfo)) {
                                                echo $row['First_Name'];
                                                echo " ";
                                                echo $row['Last_Name'];
                                            } ?></td>
                                        </tr>
                                        <tr style="height: 51px;">
                                            <td class="u-table-cell">Year Group</td>
                                            <td class="u-table-cell"><?php
                                            $studentInfo = mysqli_query($con, "SELECT * FROM Student_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($studentInfo)) {
                                                echo $row['Grade'];
                                            } ?></td>
                                        </tr>
                                        <tr style="height: 52px;">
                                            <td class="u-table-cell">Email</td>
                                            <td class="u-table-cell"><?php
                                            $contactInfo = mysqli_query($con, "SELECT * FROM Contact_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($contactInfo)) {
                                                echo $row['Email'];
                                            } ?></td>
                                        </tr>
                                        <tr style="height: 52px;">
                                            <td class="u-table-cell">PC Class</td>
                                            <td class="u-table-cell"><?php
                                            $studentInfo = mysqli_query($con, "SELECT * FROM Student_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($studentInfo)) {
                                                echo $row['PC_Class'];
                                            } ?></td>
                                        </tr>
                                        <tr style="height: 51px;">
                                            <td class="u-table-cell">Student Number</td>
                                            <td class="u-table-cell"><?php
                                            $studentInfo = mysqli_query($con, "SELECT * FROM Student_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($studentInfo)) {
                                                echo $row['Student_Number'];
                                            } ?></td>
                                        </tr>
                                        <tr style="height: 52px;">
                                            <td class="u-table-cell">House Team</td>
                                            <td class="u-table-cell"><?php
                                            $studentInfo = mysqli_query($con, "SELECT * FROM Student_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($studentInfo)) {
                                                echo $row['House_Team'];
                                            } ?></td>
                                        </tr>
                                        <tr style="height: 52px;">
                                            <td class="u-table-cell">Date of Birth</td>
                                            <td class="u-table-cell"><?php
                                            $studentInfo = mysqli_query($con, "SELECT * FROM Student_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($studentInfo)) {
                                                echo $row['DOB'];
                                            } ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="u-align-left u-container-style u-tab-pane u-white u-tab-pane-2" id="tab-14b7"
                        role="tabpanel" aria-labelledby="link-tab-14b7">
                        <div class="u-container-layout u-valign-top u-container-layout-1">
                            <div class="u-expanded-width u-table u-table-responsive u-table-1">
                                <table class="u-table-entity">
                                    <colgroup>
                                        <col width="20%">
                                        <col width="40">
                                        <col width="40%">
                                    </colgroup>
                                    <tbody class="u-table-alt-grey-5 u-table-body">
                                        <tr style="height: 54px;">
                                            <td class="u-table-cell">
                                                <h4>Contact Infomation</h4>
                                            </td>
                                            <td class="u-table-cell">Parent 1</td>
                                            <td class="u-table-cell">Parent 2</td>
                                        </tr>
                                        <tr style="height: 57px;">
                                            <td class="u-table-cell">Name</td>
                                            <td class="u-table-cell"><?php
                                            $contactInfo = mysqli_query($con, "SELECT * FROM Contact_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($contactInfo)) {
                                                echo $row['First_Name_1'];
                                                echo " ";
                                                echo $row['Last_Name_1'];
                                            } ?></td>
                                            <td class="u-table-cell"><?php
                                            $contactInfo = mysqli_query($con, "SELECT * FROM Contact_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($contactInfo)) {
                                                echo $row['First_Name_2'];
                                                echo " ";
                                                echo $row['Last_Name_2'];
                                            } ?></td>
                                        </tr>
                                        <tr style="height: 57px;">
                                            <td class="u-table-cell">Address</td>
                                            <td class="u-table-cell"><?php
                                            $contactInfo = mysqli_query($con, "SELECT * FROM Contact_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($contactInfo)) {
                                                echo $row['Home_Address_1'];
                                            } ?></td>
                                            <td class="u-table-cell"><?php
                                            $contactInfo = mysqli_query($con, "SELECT * FROM Contact_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($contactInfo)) {
                                                echo $row['Home_Address_2'];
                                            } ?></td>
                                        </tr>
                                        <tr style="height: 57px;">
                                            <td class="u-table-cell">Home Phone</td>
                                            <td class="u-table-cell"><?php
                                            $contactInfo = mysqli_query($con, "SELECT * FROM Contact_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($contactInfo)) {
                                                echo $row['Home_Phone_1'];
                                            } ?></td>
                                            <td class="u-table-cell"><?php
                                            $contactInfo = mysqli_query($con, "SELECT * FROM Contact_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($contactInfo)) {
                                                echo $row['Home_Phone_2'];
                                            } ?></td>
                                        </tr>
                                        <tr style="height: 57px;">
                                            <td class="u-table-cell">Mobile Phone</td>
                                            <td class="u-table-cell"><?php
                                            $contactInfo = mysqli_query($con, "SELECT * FROM Contact_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($contactInfo)) {
                                                echo $row['Mobile_Phone_1'];
                                            } ?></td>
                                            <td class="u-table-cell"><?php
                                            $contactInfo = mysqli_query($con, "SELECT * FROM Contact_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($contactInfo)) {
                                                echo $row['Mobile_Phone_2'];
                                            } ?></td>
                                        </tr>
                                        <tr style="height: 57px;">
                                            <td class="u-table-cell">Work Phone</td>
                                            <td class="u-table-cell"><?php
                                            $contactInfo = mysqli_query($con, "SELECT * FROM Contact_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($contactInfo)) {
                                                echo $row['Work_Phone_1'];
                                            } ?></td>
                                            <td class="u-table-cell"><?php
                                            $contactInfo = mysqli_query($con, "SELECT * FROM Contact_Info WHERE Student_Number ='$select2' ");
                                            while ($row = mysqli_fetch_array($contactInfo)) {
                                                echo $row['Work_Phone_2'];
                                            } ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="u-container-style u-tab-pane u-white u-tab-pane-3" id="tab-2917" role="tabpanel"
                        aria-labelledby="link-tab-2917">
                        <div class="u-container-layout u-valign-top u-container-layout-1">
                            <div class="u-expanded-width u-table u-table-responsive u-table-1">
                                <table class="u-table-entity">
                                    <colgroup>
                                        <col width="20%">
                                        <col width="20%">
                                        <col width="20%">
                                        <col width="20%">
                                        <col width="20%">
                                    </colgroup>
                                    <tbody class="u-table-alt-grey-5 u-table-body">
                                        <tr style="height: 54px;">
                                            <td class="u-table-cell">
                                                <h4>Grades</h4>
                                            </td>
                                            <td class="u-table-cell">Term 1</td>
                                            <td class="u-table-cell">Term 2</td>
                                            <td class="u-table-cell">Term 3</td>
                                            <td class="u-table-cell">Term 4</td>
                                        </tr>

                                        <?php
                                        $Subjects = mysqli_query($con, "SELECT * FROM Subjects WHERE Student_Number ='$select2' "); // Returns the selected student's subjects
                                        $T1Grades = mysqli_query($con, "SELECT * FROM Student_Grades WHERE Student_Number ='$select2' AND Term = '1' "); // Returns the student's grade in term 1 for the subjects
                                        $T2Grades = mysqli_query($con, "SELECT * FROM Student_Grades WHERE Student_Number ='$select2' AND Term = '2' "); // Returns the student's grade in term 2 for the subjects
                                        $T3Grades = mysqli_query($con, "SELECT * FROM Student_Grades WHERE Student_Number ='$select2' AND Term = '3' "); // Returns the student's grade in term 3 for the subjects
                                        $T4Grades = mysqli_query($con, "SELECT * FROM Student_Grades WHERE Student_Number ='$select2' AND Term = '4' "); // Returns the student's grade in term 4 for the subjects
                                        // Checks if there are this many subjects, if it is null, this row is not displayed
                                        while ($subjectList = mysqli_fetch_array($Subjects)) {
                                            $T1gradeList = mysqli_fetch_array($T1Grades);
                                            $T2gradeList = mysqli_fetch_array($T2Grades);
                                            $T3gradeList = mysqli_fetch_array($T3Grades);
                                            $T4gradeList = mysqli_fetch_array($T4Grades);
                                            if (is_null($subjectList['Subject_1']) != 1) { // If row has an entered subject, then it will display the results. Otherwise it will end the table
                                                echo '<tr style="height: 57px;"><td class="u-table-cell">';
                                                echo $subjectList['Subject_1'];
                                                echo '<td class="u-table-cell">';
                                                echo $T1gradeList['Subject_1'];
                                                echo '</td>';
                                                echo '<td class="u-table-cell">';
                                                echo $T2gradeList['Subject_1'];
                                                echo '</td>';
                                                echo '<td class="u-table-cell">';
                                                echo $T3gradeList['Subject_1'];
                                                echo '</td>';
                                                echo '<td class="u-table-cell">';
                                                echo $T4gradeList['Subject_1'];
                                                echo '</td>';
                                                echo '</tr>';
                                                if (is_null($subjectList['Subject_2']) != 1) { // If row has an entered subject, then it will display the results. Otherwise it will end the table
                                                    echo '<tr style="height: 57px;"><td class="u-table-cell">';
                                                    echo $subjectList['Subject_2'];
                                                    echo '<td class="u-table-cell">';
                                                    echo $T1gradeList['Subject_2'];
                                                    echo '</td>';
                                                    echo '<td class="u-table-cell">';
                                                    echo $T2gradeList['Subject_2'];
                                                    echo '</td>';
                                                    echo '<td class="u-table-cell">';
                                                    echo $T3gradeList['Subject_2'];
                                                    echo '</td>';
                                                    echo '<td class="u-table-cell">';
                                                    echo $T4gradeList['Subject_2'];
                                                    echo '</td>';
                                                    echo '</tr>';
                                                    if (is_null($subjectList['Subject_3']) != 1) { // If row has an entered subject, then it will display the results. Otherwise it will end the table
                                                        echo '<tr style="height: 57px;"><td class="u-table-cell">';
                                                        echo $subjectList['Subject_3'];
                                                        echo '<td class="u-table-cell">';
                                                        echo $T1gradeList['Subject_3'];
                                                        echo '</td>';
                                                        echo '<td class="u-table-cell">';
                                                        echo $T2gradeList['Subject_3'];
                                                        echo '</td>';
                                                        echo '<td class="u-table-cell">';
                                                        echo $T3gradeList['Subject_3'];
                                                        echo '</td>';
                                                        echo '<td class="u-table-cell">';
                                                        echo $T4gradeList['Subject_3'];
                                                        echo '</td>';
                                                        echo '</tr>';
                                                        if (is_null($subjectList['Subject_4']) != 1) { // If row has an entered subject, then it will display the results. Otherwise it will end the table
                                                            echo '<tr style="height: 57px;"><td class="u-table-cell">';
                                                            echo $subjectList['Subject_4'];
                                                            echo '<td class="u-table-cell">';
                                                            echo $T1gradeList['Subject_4'];
                                                            echo '</td>';
                                                            echo '<td class="u-table-cell">';
                                                            echo $T2gradeList['Subject_4'];
                                                            echo '</td>';
                                                            echo '<td class="u-table-cell">';
                                                            echo $T3gradeList['Subject_4'];
                                                            echo '</td>';
                                                            echo '<td class="u-table-cell">';
                                                            echo $T4gradeList['Subject_4'];
                                                            echo '</td>';
                                                            echo '</tr>';
                                                            if (is_null($subjectList['Subject_5']) != 1) { // If row has an entered subject, then it will display the results. Otherwise it will end the table
                                                                echo '<tr style="height: 57px;"><td class="u-table-cell">';
                                                                echo $subjectList['Subject_5'];
                                                                echo '<td class="u-table-cell">';
                                                                echo $T1gradeList['Subject_5'];
                                                                echo '</td>';
                                                                echo '<td class="u-table-cell">';
                                                                echo $T2gradeList['Subject_5'];
                                                                echo '</td>';
                                                                echo '<td class="u-table-cell">';
                                                                echo $T3gradeList['Subject_5'];
                                                                echo '</td>';
                                                                echo '<td class="u-table-cell">';
                                                                echo $T4gradeList['Subject_5'];
                                                                echo '</td>';
                                                                echo '</tr>';
                                                                if (is_null($subjectList['Subject_6']) != 1) { // If row has an entered subject, then it will display the results. Otherwise it will end the table
                                                                    echo '<tr style="height: 57px;"><td class="u-table-cell">';
                                                                    echo $subjectList['Subject_6'];
                                                                    echo '<td class="u-table-cell">';
                                                                    echo $T1gradeList['Subject_6'];
                                                                    echo '</td>';
                                                                    echo '<td class="u-table-cell">';
                                                                    echo $T2gradeList['Subject_6'];
                                                                    echo '</td>';
                                                                    echo '<td class="u-table-cell">';
                                                                    echo $T3gradeList['Subject_6'];
                                                                    echo '</td>';
                                                                    echo '<td class="u-table-cell">';
                                                                    echo $T4gradeList['Subject_6'];
                                                                    echo '</td>';
                                                                    echo '</tr>';
                                                                    if (is_null($subjectList['Subject_7']) != 1) { // If row has an entered subject, then it will display the results. Otherwise it will end the table
                                                                        echo '<tr style="height: 57px;"><td class="u-table-cell">';
                                                                        echo $subjectList['Subject_7'];
                                                                        echo '<td class="u-table-cell">';
                                                                        echo $T1gradeList['Subject_7'];
                                                                        echo '</td>';
                                                                        echo '<td class="u-table-cell">';
                                                                        echo $T2gradeList['Subject_7'];
                                                                        echo '</td>';
                                                                        echo '<td class="u-table-cell">';
                                                                        echo $T3gradeList['Subject_7'];
                                                                        echo '</td>';
                                                                        echo '<td class="u-table-cell">';
                                                                        echo $T4gradeList['Subject_7'];
                                                                        echo '</td>';
                                                                        echo '</tr>';
                                                                        if (is_null($subjectList['Subject_1']) != 1) { // If row has an entered subject, then it will display the results. Otherwise it will end the table
                                                                            echo '<tr style="height: 57px;"><td class="u-table-cell">';
                                                                            echo $subjectList['Subject_8'];
                                                                            echo '<td class="u-table-cell">';
                                                                            echo $T1gradeList['Subject_8'];
                                                                            echo '</td>';
                                                                            echo '<td class="u-table-cell">';
                                                                            echo $T2gradeList['Subject_8'];
                                                                            echo '</td>';
                                                                            echo '<td class="u-table-cell">';
                                                                            echo $T3gradeList['Subject_8'];
                                                                            echo '</td>';
                                                                            echo '<td class="u-table-cell">';
                                                                            echo $T4gradeList['Subject_8'];
                                                                            echo '</td>';
                                                                            echo '</tr>';
                                                                        } else {
                                                                            echo '</tbody></table>';
                                                                        }
                                                                    } else {
                                                                        echo '</tbody></table>';
                                                                    }
                                                                } else {
                                                                    echo '</tbody></table>';
                                                                }
                                                            } else {
                                                                echo '</tbody></table>';
                                                            }
                                                        } else {
                                                            echo '</tbody></table>';
                                                        }
                                                    } else {
                                                        echo '</tbody></table>';
                                                    }
                                                } else {
                                                    echo '</tbody></table>';
                                                }
                                            } else {
                                                echo '</tbody></table>';
                                            }

                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="u-container-style u-tab-pane u-white u-tab-pane-4" id="link-tab-93fc" role="tabpanel"
                        aria-labelledby="tab-93fc">
                        <div class="u-container-layout u-valign-top u-container-layout-1">
                            <div class="u-expanded-width u-table u-table-responsive u-table-1">
                            <h4>Attendance - Days Absent</h4>
                                <table class="u-table-entity">
                                    <colgroup>
                                        <col width="20%">
                                        <col width="20%">
                                        <col width="20%">
                                        <col width="20%">
                                        <col width="20%">
                                    </colgroup>
                                    <tbody class="u-table-alt-grey-5 u-table-body">
                                        <tr style="height: 54px;">
                                            <td class="u-table-cell">
                                                <p>Year</p>
                                            </td>
                                            <td class="u-table-cell">Term 1</td>
                                            <td class="u-table-cell">Term 2</td>
                                            <td class="u-table-cell">Term 3</td>
                                            <td class="u-table-cell">Term 4</td>
                                        </tr>
                                        <?php
                                        $Year = mysqli_query($con, "SELECT * FROM Attendance WHERE Student_Number ='$select2' ORDER BY Year DESC"); // Returns the selected student's attendance for each year ordered by latest year
                                        // For each year in rows
                                        while ($yearList = mysqli_fetch_array($Year)) {

                                                echo '<tr style="height: 57px;"><td class="u-table-cell">';
                                                echo $yearList['Year'];
                                                echo '<td class="u-table-cell">';
                                                echo $yearList['Term_1'];
                                                echo '</td>';
                                                echo '<td class="u-table-cell">';
                                                echo $yearList['Term_2'];
                                                echo '</td>';
                                                echo '<td class="u-table-cell">';
                                                echo $yearList['Term_3'];
                                                echo '</td>';
                                                echo '<td class="u-table-cell">';
                                                echo $yearList['Term_4'];
                                                echo '</td>';
                                                echo '</tr>';
                                        }
                                                echo '</tbody></table>';
                                             ?>
                                    </tbody>
                                </table>
                                <div style="padding: 25px 0px 0px 0px;">
                                    <form action="add-attendance.php" method="post">
                                        <input type="hidden" name="studentNumber" value=<?php echo $select2 ?>>
                                        <input type="submit" value="Add Attendance" class="u-btn u-btn-submit u-button-style">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="u-clearfix u-section-4" id="sec-13fe">
        <div class="u-clearfix u-sheet u-sheet-1"></div>
    </section>



    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-3fdc">
        <div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-small-text u-text u-text-variant u-text-1">© Protractor Education 2024</p>
        </div>
    </footer>


</body>

</html>