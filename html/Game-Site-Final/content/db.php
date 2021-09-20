    <!--
Author: 		 Ryan Gilchrist
File name: 		db.php
Date Created:	Summer 2021
Date Updated: Summer 2021
Version: 		  1.0
Purpose: 		  learning Javascript programming & PHP (SYST10199)
Copyright: 
    This work is the intellectual property of Sheridan College. 
    Any further copying and distribution outside of class must be within 
    the copyright law. Posting to commercial sites for profit is prohibited.
References:
    [Code from worksheet 10: https://ebajcar.github.io/web10199_worksheets/syst10199/worksheets/set10.html]
    [Referenced MySqli connect function from W3Schools: https://www.w3schools.com/php/func_mysqli_connect.asp]
Description:
    Page that handles PHP form POST from Logout button
    See README.txt file (when it becomes available)
-->
    <?php
    //Server connection details
    $servername = "localhost";
    $username = "gilchrry_dba";
    $password = "Youneedaccess1!";
    $db = "gilchrry_website";


    //Create connection
    $conn = new mysqli(
        $servername,
        $username,
        $password,
        $db
    );

    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>