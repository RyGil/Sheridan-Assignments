<?php
//redirecting user back to homepage if they are not signed in
session_start();
if (!isset($_SESSION["userName"])) {
    header('Location: index_public.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Members' Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
Author: 		  Ellen Bajcar
File name: 		index_members.php
Date Created:	Summer 2021
Date Updated: Summer 2021
Version: 		  21.1
Purpose: 		  learning Javascript programming (SYST10199)
Copyright: 
    This work is the intellectual property of Sheridan College. 
    Any further copying and distribution outside of class must be within 
    the copyright law. Posting to commercial sites for profit is prohibited.
References:
    [Code from Ellen Bajcar's Github: https://github.com/ebajcar/web10199_worksheets/tree/master/syst10199/projects/home2021]
    [Referenced isset() W3Schools: https://www.w3schools.com/php/func_var_isset.asp]
    [Referenced course content from Ellen Bajcar: https://ebajcar.github.io/web10199/material/material_php.html]

Description:
    Home page presented to members once they've logged in.
    See README.txt file (when it becomes available)
-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/components.css">
</head>

<body>
    <header>
        <h1>Members Start Here</h1>
    </header>
    <nav>
        <a href="#">Account</a>
        <a href="#">Blog</a>
        <a href="signout.php">Logout</a>
    </nav>
    <main>
        <div class="grid-container">
            <div class="games-container">
                <a href="game_ttt.html" class="but tic-tac-toe tooltip"><span class="tooltiptext">TIC TAC<br>TOE</span></a>
                <a href="game_rpsls.php" class="but rock-paper tooltip"><span class="tooltiptext">ROCK<br>PAPER<br>SCISSORS</span></a>
                <a href="game_cc.php" class="but casino-craps tooltip"><span class="tooltiptext">CASINO<br>CRAPS</span></a>
                <a href="#" class="but blackjack tooltip"><span class="tooltiptext">BLACKJACK</span></a>

                <a href="#" class="but sliding-puzzle tooltip"><span class="tooltiptext">SLIDING<br>PUZZLES</span></a>
                <a href="#" class="but bingo tooltip"><span class="tooltiptext">BINGO</span></a>
                <a href="#" class="but hangman tooltip"><span class="tooltiptext">HANGMAN</span> </a>
                <a href="#" class="but yahtzee tooltip"><span class="tooltiptext">YAHTZEE</span> </a>

                <a href="#" class="but num-scrabble tooltip"><span class="tooltiptext">NUMBER-SCRABBLE</span> </a>
                <a href="#" class="but pick-a-pair tooltip"><span class="tooltiptext">PICK<br>A PAIR</span> </a>
                <a href="#" class="but crypto-puzzle tooltip"><span class="tooltiptext">CRYPTO<br>PUZZLES</span> </a>
                <a href="#" class="but ultimate tooltip"><span class="tooltiptext">ULTIPMATE<br>TIC TOC TOE</span></a>

                <a href="#" class="but chess tooltip"><span class="tooltiptext">CHESS</span></a>
                <a href="#" class="but pig tooltip"><span class="tooltiptext">ONE-DICE <br>PIG</span> </a>
                <a href="#" class="but abacus tooltip"><span class="tooltiptext">MATH<br>PROBLEMS</span> </a>
                <a href="#" class="but wyvern tooltip"><span class="tooltiptext">More<br>to come...</span> </a>
            </div>
        </div>
    </main>
    <footer>
        <address>SYST10199 Web Programming &copy; Sheridan College</address>
    </footer>
</body>

</html>