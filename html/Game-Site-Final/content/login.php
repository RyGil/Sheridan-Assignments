<?php
session_start();
$uMsg = "";

$userName = $_POST["userName"];
$userPassword = $_POST["userPassword"];

//Match password with Database
require 'db.php';

//Checking if username exists in members table and if the username + password combination match
$sql = "select username from members where username = '$userName' and userpassword = '$userPassword'";
$result = $conn->query($sql);
if ($result->num_rows != 0) {
    $_SESSION['userName'] = $userName;
    $uMsg = '<section class="grid-container">
        <br><p>Sign In Successful!.</p> 
        <br><form method="post" action="index_members.php">
                <input type="submit" value="Continue" class="btn-long" id="continue">
            </form>
            </section>';
} else {
    $uMsg = '<section class="grid-container">
        <br><p>Sign In Failed.</p> 
        <br><form method="post" action="index_public.html">
                <input type="submit" value="Try Again" class="btn-long" id="tryAgain">
            </form>
            </section>';
    session_destroy();
}
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
Author: 		  Ryan Gilchrist
File name: 		login.php
Date Created:	Summer 2021
Date Updated: Summer 2021
Version: 		  1.0
Purpose: 		  learning Javascript programming (SYST10199)
Copyright: 
    This work is the intellectual property of Sheridan College. 
    Any further copying and distribution outside of class must be within 
    the copyright law. Posting to commercial sites for profit is prohibited.
References:
    [Modified code from W3Schools: https://www.w3schools.com/php/php_mysql_select_where.asp]
    [Referenced course content from Ellen Bajcar: https://ebajcar.github.io/web10199/material/material_php.html]
    [Referenced assignment video from: https://garrulous-meteoroid-c74.notion.site/Assignment-8-information-2f80f16a71df44bfbe9def5996dedb56#a1e45addbb1a4784bcbfe079435b5900]


Description:
    Page the handles PHP for form POST from index_public.html.
    Presents the user with success/fail message
    See README.txt file (when it becomes available)
-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../css/style.css">

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
        <h1>Non-members Start Here</h1>
    </header>
    <nav>
        <a href="index_public.html">Back</a>
    </nav>
    <main>
        <div>
            <?php echo $uMsg; ?><br>
        </div>
    </main>
    <footer>
        <address>SYST10199 Web Programming &copy; Sheridan College</address>
    </footer>

</body>

</html>