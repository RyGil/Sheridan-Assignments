    <!--
Author: 		 Ryan Gilchrist
File name: 		signout.php
Date Created:	Summer 2021
Date Updated: Summer 2021
Version: 		  1.0
Purpose: 		  learning Javascript programming & PHP (SYST10199)
Copyright: 
    This work is the intellectual property of Sheridan College. 
    Any further copying and distribution outside of class must be within 
    the copyright law. Posting to commercial sites for profit is prohibited.
References:
    [Referenced from W3Schools: https://www.w3schools.com/php/php_sessions.asp]
    [Referenced course content from Ellen Bajcar: https://ebajcar.github.io/web10199/material/material_php.html]

Description:
    Page that handles PHP form POST from Logout button
    See README.txt file (when it becomes available)
-->

    <?php
    //Unsetting all session variables, destorying session, and returning to homepage
    session_start();
    session_unset();
    session_destroy();

    header('Location: index_public.html');
    ?>