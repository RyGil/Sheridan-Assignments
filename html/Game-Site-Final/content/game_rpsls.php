<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rock Paper Scissors Lizard Spock Game</title>
    <meta charset="utf-8">
    <meta value="viewport" content="width=device-width, initial-scale=1">
    <!--
Author: 		    Ryan Gilchrist
File value: 	    game_rpsls.php
Date Created:	    Summer 2021
Date Updated:       Summer 2021
Version: 		    2.0
Purpose: 		    learning Javascript & PHP programming (SYST10199)
Copyright: 
    This work is the intellectual property of Sheridan College. 
    Any further copying and distribution outside of class must be within 
    the copyright law. Posting to commercial sites for profit is prohibited.
References:
    [Code and images from Ellen Bajcar's Github: https://github.com/ebajcar/web10199_worksheets/tree/master/syst10199/projects/home2021]
    [Referenced arrays from: https://ebajcar.github.io/web10199/material/material_js.html]
    [Referenced DOM methods and properties from: https://ebajcar.github.io/web10199/material/material_js.html]
    [Referenced week 7 slides from: https://ebajcar.github.io/web10199/slides_by_reveal/index_w7.html#/]
    [Referenced week 8 slides from: https://ebajcar.github.io/web10199/slides_by_reveal/index_php.html#/]

Description:
    Rock Paper Scissors Lizard Spock game page presented to members when they 
    select the game from the home page.
-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/components.css">
    <style>
        /*
    * Background Images
    */
        #rock, #paper, #scissors, #lizard, #spock {
            display: inline-block;
            height: 120px;
            padding: 0;
            margin: 0;
            width: 118px;
        }
    /*
    * Minor styling
    */
        #results {
            display: none;
        }

        #restart, #game-stats {
            background-color: white;
        }

        div button:active, div button:hover {
            cursor: pointer;
        }

        #score {
            display: none;
            font-size: 25px;
            font-weight: bold;
            margin: 16px 0 0;
            text-align: center;
        }

        #gameText {
            font-family: 'Kaushan Script', cursive;
        }

        #choiceText {
            font-family: 'Luckiest Guy', cursive;
            font-size: 25px;
        }
    </style>
</head>

<body>
    <header>
        <!--Displays game title-->
        <h1>Game of<br>Rock Paper Scissors Lizard Spock</h1>
    </header>
    <nav>
        <!--Navigation to home page-->
        <a href="index_members.html">Home</a>
    </nav>
    <main>
        <!--PHP-->
        <?php
        //Global variables
        $userText = "";
        $userChoice = "";
        $computerText = "";
        $computerChoice = "";
        $gameResult = "";

        // User Selection based on image click & reset button
        if (isset($_POST["rock"])) {
            $userChoice = "rock";
            echo playGame($userChoice);
        } else if (isset($_POST["paper"])) {
            $userChoice = "paper";
            echo playGame($userChoice);
        } else if (isset($_POST["scissors"])) {
            $userChoice = "scissors";
            echo playGame($userChoice);
        } else if (isset($_POST["lizard"])) {
            $userChoice = "lizard";
            echo playGame($userChoice);
        } else if (isset($_POST["spock"])) {
            $userChoice = "spock";
            echo playGame($userChoice);
        } else if (isset($_POST["resetGame"])) {
            echo resetGame();
        }

        //Reset game function
        function resetGame()
        {
            global $userText;
            global $userChoice;
            global $computerText;
            global $computerChoice;
            global $gameResult;

            $userText = "";
            $userChoice = "";
            $computerText = "";
            $computerChoice = "";
            $gameResult = "";
        }

        //Function to run game
        function playGame($userChoice)
        {
            global $computerChoice;
            global $userText;
            global $computerText;
            global $gameResult;

            //Randomizing computer selection
            $choices = ["rock", "paper", "scissors", "lizard", "spock"];
            $randomSelection = rand(0, 4);
            $computerChoice = $choices[$randomSelection];

            //Switch statement to determine results
            switch ($userChoice . " " . $computerChoice) {
                case "rock scissors":
                case "rock lizard":
                case "paper rock":
                case "paper spock":
                case "scissors paper":
                case "scissors lizard":
                case "lizard spock":
                case "lizard paper":
                case "spock scissors":
                case "spock rock":
                    $userText = "Your Board";
                    $computerText = "Computer Board";
                    $gameResult = "YOU WIN!";
                    break;
                case "scissors rock":
                case "lizard rock":
                case "rock paper":
                case "spock paper":
                case "paper scissors":
                case "lizard scissors":
                case "spock lizard":
                case "paper lizard":
                case "scissors spock":
                case "rock spock":
                    $userText = "Your Board";
                    $computerText = "Computer Board";
                    $gameResult = "COMPUTER WIN!";
                    break;
                case "rock rock":
                case "paper paper":
                case "scissors scissors":
                case "lizard lizard":
                case "spock spock":
                    $userText = "Your Board";
                    $computerText = "Computer Board";
                    $gameResult = "IT'S A DRAW!";
                    break;
            }
        }
        ?>
        <div class="grid-container">
            <div class="grid-item">
                <div id="game">
                    <br><br><br>
                    <!--Button to reset game-->
                    <form method="POST">
                        <button id="restart" type="submit" value="resetGame">Clear</button>
                    </form>
                    <br><br>
                    <!--Options for player to choose from-->
                    <form method="POST">
                        <button id="rock" type="submit" name="rock"><img src="../images/rock1.png"></button>
                        <button id="paper" type="submit" name="paper"><img src="../images/paper1.png"></button>
                        <button id="scissors" type="submit" name="scissors"><img src="../images/scissors1.png"></button>
                        <button id="lizard" type="submit" name="lizard"><img src="../images/lizard1.png"></button>
                        <button id="spock" type="submit" name="spock"><img src="../images/spock1.png"></button>
                    </form>
                    <br>
                    <!--Message to instruct player to choose move-->
                    <p id="gameText">Your move... Click on an image to choose!</p>
                    <p id="gameText"><?php echo $userText ?></p>
                    <p id="choiceText"><?php echo $userChoice ?></p>
                    <p id="gameText"><?php echo $computerText ?></p>
                    <p id="choiceText"><?php echo $computerChoice ?></p>
                    <p id="gameText"><?php echo $gameResult ?></p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <address>SYST10199 Web Programming &copy; Sheridan College</address>
    </footer>
</body>

</html>