<?php
session_start();

$userMessage = "";
$userErrorMsg = "";
$passErrorMsg = "";

//Checking if username and password are valid before inserting into members table
if (testUsername() && testPassword()) {
    require('db.php');
    $first = $_POST["firstName"];
    $last = $_POST["lastName"];
    $phone = $_POST["phone"];
    $userName = $_POST["userName"];
    $userPassword = $_POST["userPassword"];
    $userMessage = "<br><p>Registration successful!<br><br> Click 'LOGIN' to continue to sign in page</p><br>" .
        '<br><form method="post" action="index_public.html">
                <input type="submit" value="Login" class="btn-long">
            </form>';
    //Inserting member data into members table
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO members (firstname, lastname, phone, username, userpassword)
  VALUES ('$first', '$last', '$phone', '$userName', '$userPassword')";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
} else {
    session_destroy();
}

//Function to test if username is set or if its empty
function testUsername()
{
    global $userErrorMsg;
    if (isset($_POST['userName'])) {
        if (!empty($_POST['userName'])) {
            $userErrorMsg = "";
        } else {
            $userErrorMsg = "<br><p>Error: You must choose a username.<br></p>" .
                '<br><form method="post" action="index_registration.html">
                <input type="submit" value="Try Again" class="btn-long">
            </form>';
            return false;
        }
        return true;
    }
}

//Function to test if password is set, empty, or doesn't meet password requirements
function testPassword()
{
    global $passErrorMsg;
    if (isset($_POST["userPassword"])) {
        if (!empty($_POST["userPassword"])) {
            if (strlen($_POST["userPassword"]) < 6 || strlen($_POST["userPassword"]) > 50) {
                $passErrorMsg = "<br><p>Your password must be between 6 and 50 characters" .
                    " long. The length of your password is " . strlen($_POST["userPassword"]) . "</p>" .
                    '<br><form method="post" action="index_registration.html">
                <input type="submit" value="Try Again" class="btn-long">
            </form>';
                return false;
            }
        } else {
            $passErrorMsg = "<br><p>You must choose a password!</p>" . '<br><form method="post" action="index_registration.html">
                <input type="submit" value="Try Again" class="btn-long">
            </form>';
            return false;
        }
        return true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
Author: 		  Ryan Gilchrist
File name: 		register.php
Date Created:	Summer 2021
Date Updated: Summer 2021
Version: 		  1.0
Purpose: 		  learning Javascript programming & PHP(SYST10199)
Copyright: 
    This work is the intellectual property of Sheridan College. 
    Any further copying and distribution outside of class must be within 
    the copyright law. Posting to commercial sites for profit is prohibited.
References:
    [Code from worksheet 10: https://ebajcar.github.io/web10199_worksheets/syst10199/worksheets/set10.html]
    [Modified code from W3Schools: https://www.w3schools.com/php/php_mysql_insert.asp]
    [Referenced course content from Ellen Bajcar: https://ebajcar.github.io/web10199/material/material_php.html]
    [Referenced assignment video from: https://garrulous-meteoroid-c74.notion.site/Assignment-8-information-2f80f16a71df44bfbe9def5996dedb56#a1e45addbb1a4784bcbfe079435b5900]

Description:
    Page the handles PHP for form POST from index_registration.html.
    Presents the user with success/fail message
    See README.txt file (when it becomes available)
-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/components.css">

    <style>
        .btn-long {
            width: 30%;
            height: 50%;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h1>Become A Member</h1>
    </header>
    <nav>
        <a href="index_public.html">Back</a>
    </nav>
    <main>
        <!--Echoing success/fail messages to user-->
        <div>
            <?php echo $userMessage; ?><br>
            <?php echo $userErrorMsg; ?><br>
            <?php echo $passErrorMsg; ?><br>
        </div>
    </main>
    <footer>
        <address>SYST10199 Web Programming &copy; Sheridan College</address>
    </footer>

</body>

</html>