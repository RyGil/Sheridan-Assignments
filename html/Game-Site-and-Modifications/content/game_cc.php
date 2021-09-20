<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Casino Craps</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
Author: 		  Ryan Gilchrist
File name: 		game_rpsls.html
Date Created:	Summer 2021
Date Updated: Summer 2021
Version: 		  2.0
Purpose: 		  learning Javascript programming & PHP (SYST10199)
Copyright: 
    This work is the intellectual property of Sheridan College. 
    Any further copying and distribution outside of class must be within 
    the copyright law. Posting to commercial sites for profit is prohibited.
References:
    [CSS code and images from Ellen Bajcar's Github: https://github.com/ebajcar/web10199_worksheets/tree/master/syst10199/projects/home2021]
    [Die images from: https://www.geeksforgeeks.org/building-a-dice-game-using-javascript/]
    [Reference to class 4 notes: https://ebajcar.github.io/web10199/slides_by_reveal/index_w4.html#/14]
    [Initial code for Craps: https://gist.github.com/ebajcar/528556cd7ea32185cbd9f2d23d8caa24]
    [Casino Craps class video: https://ebajcar.github.io/web10199/slides_by_reveal/index_w4.html#/15]
    [Referenced week 7 slides from: https://ebajcar.github.io/web10199/slides_by_reveal/index_w7.html#/]
    [Referenced week 8 slides from: https://ebajcar.github.io/web10199/slides_by_reveal/index_php.html#/]

Description:
    Casino Craps game page presented to members when they 
    select the game from the home page.
-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/components.css">
    <style>
        /*
    * Minor styling for game page
    */
        body {
            margin: 0 auto;
            text-align: center;
        }

        main {
            min-height: 540px;
        }

        table {
            margin: 0 auto;
            background-color: transparent;
            table-layout: fixed;
            width: 650px;
            text-align: center;
        }

        td {
            background-color: transparent;
            text-align: center;
        }

        main p {
            margin: 0;
            font-size: 30px;
        }

        div.container {
            display: inline-block;
        }

        #die1 {
            width: 100px;
            height: 100px;
        }

        #die2 {
            width: 100px;
            height: 100px;
        }

        #total {
            font-size: 60px;
        }
    </style>
</head>

<body>
    <header>
        <!--Displays game title-->
        <h1>Play Casino Craps!</h1>
    </header>
    <nav>
        <!--Navigation to home page-->
        <a href="index_members.html">Home</a>
    </nav>
    <main>
        <?php

        $gameText = "To start a game, roll the dice!";
        $pointAmount = 0;
        $totalRoll = 0;
        $dieImage1 = '<img src="../images/dice_1.png">';
        $dieImage2 = '<img src="../images/dice_1.png">';
        $playerWins = 0;
        $playerLosses = 0;

        // User click determines whether dice roll or game reset
        if (isset($_POST["rollDice"])) {
            echo rollDice();
        } else if (isset($_POST["resetGame"])) {
            echo resetGame();
        }

        //Function to reset game
        function resetGame()
        {
            global $playerWins;
            global $playerLoses;
            global $pointAmount;

            $playerWins = 0;
            $playerLoses = 0;
            $pointAmount = 0;
        }

        //Function to randomize dice roll
        function roll()
        {
            return rand(1, 6);
        }

        function rollDice()
        {
            global $totalRoll;
            global $gameText;
            global $pointAmount;
            global $playerWins;
            global $playerLosses;

            //Assinging random numbers to user dice roll
            $die1 = roll();
            $die2 = roll();
            $totalRoll = $die1 + $die2;
            dieChange($die1, $die2);

            //If statement to determine results
            if ($pointAmount == 0) {
                if ($totalRoll == 7 || $totalRoll == 11) {
                    $playerWins++;
                    $gameText = "That's a <b>natural</b>. You win!<br> To start a game, roll the dice!";
                } else if ($totalRoll == 2 || $totalRoll == 3 || $totalRoll == 12) {
                    $playerLosses++;
                    $gameText = "That's <b>craps</b>. You lose!<br> To start a game, roll the dice!";
                } else {
                    $pointAmount = $totalRoll;
                    $gameText = "Your point is " . $pointAmount;
                }
            } else if ($pointAmount !== 0) {
                if ($pointAmount == $totalRoll) {
                    $playerWins++;
                    $gameText = "You made your point. You win!<br> To start a game, roll the dice!";
                    $pointAmount = 0;
                } else if ($totalRoll === 7) {
                    $playerLosses++;
                    $gameText = "That's a seven. You lose!<br> To start a game, roll the dice!";
                    $pointAmount = 0;
                }
            }
        }
        //Function to change dice images using switch statement
        function dieChange($die1, $die2)
        {
            global $dieImage1;
            global $dieImage2;
            switch ($die1) {
                case 1:
                    $dieImage1 = '<img src="../images/dice_1.png">';
                    break;
                case 2:
                    $dieImage1 = '<img src="../images/dice_2.png">';
                    break;
                case 3:
                    $dieImage1 = '<img src="../images/dice_3.png">';
                    break;
                case 4:
                    $dieImage1 = '<img src="../images/dice_4.png">';
                    break;
                case 5:
                    $dieImage1 = '<img src="../images/dice_5.png">';
                    break;
                case 6:
                    $dieImage1 = '<img src="../images/dice_6.png">';
                    break;
            }
            switch ($die2) {
                case 1:
                    $dieImage2 = '<img src="../images/dice_1.png">';
                    break;
                case 2:
                    $dieImage2 = '<img src="../images/dice_2.png">';
                    break;
                case 3:
                    $dieImage2 = '<img src="../images/dice_3.png">';
                    break;
                case 4:
                    $dieImage2 = '<img src="../images/dice_4.png">';
                    break;
                case 5:
                    $dieImage2 = '<img src="../images/dice_5.png">';
                    break;
                case 6:
                    $dieImage2 = '<img src="../images/dice_6.png">';
                    break;
            }
        }

        ?>

        <table>
            <tr>
                <td colspan="2">
                    <!--Container to place dice images side-by-side-->
                    <div class="container">
                        <div><?php echo $dieImage1 ?></div>
                    </div>
                    <div class="container">
                        <div><?php echo $dieImage2 ?></div>
                    </div>
                </td>
                <td>
                    <!--Text to display user's current roll-->
                    <p>You rolled&hellip;</p><br />
                    <p><?php print $totalRoll ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <!--Text to display scoreboard-->
                    <p>STATS</p>
                    <p>Wins: <span id="wins"><?php print $playerWins ?></span></p>
                    <p>Losses: <span id="losses"><?php echo $playerLosses ?></span></p>
                </td>
                <td colspan="2">
                    <!--Text to tell user to start game, and the win/lose/point text of each roll-->
                    <p id="show" class="show"><?php echo $gameText ?></p>
                </td>
            </tr>
            <tr>
                <!--Button that clears the scoreboard and all edited text-->
                <td>
                    <form method="POST">
                        <button id="clear" class="btn-long" type="submit" name="resetGame">Clear</button>
                    </form>
                </td>
                <td colspan="2">
                    <!--Button for rolling the dice-->
                    <form method="POST">
                        <button id="roll" class="btn-long" type="submit" name="rollDice">Roll the dice!</button>
                    </form>
                </td>
            </tr>
        </table>
    </main>
    <footer>
        <address>SYST10199 Web Programming &copy; Sheridan College</address>
    </footer>

</body>

</html>