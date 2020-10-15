<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Rock Paper or Scissors</title>        
    </head>
    <body>
        <div id="rules">
            <h1>Rock Paper Scissors Game Simulator</h1>
            <h2>Mechanics</h2>
            <ul>
                <li>
                    Player 1(Computer) and Player 2 (Computer) randomly "throw" either Rock, Paper or Scissors.
                </li>
                <li>
                    A tie is declared if both players throw the same move. 
                </li>
                <li>
                   Otherwise: Rock beats Scissors, Scissors beats Paper, Paper beats Rock.
                </li>
            </ul>

        </div>
      
        
        <div id="options">
            <form method="post">           
            <input type="submit" value="Play" id="play" name="play">   
            </form>

        </div>
        <div id = "game">            
        
        <?php
        //if button is clicked
        if(isset($_POST["play"])) {
            //array of options
            $options=['Rock','Paper','Scissors'];
            //get 2 random options
            $player1 = $options[array_rand($options, 1)];
            $player2 = $options[array_rand($options, 1)];            
            //assign appropriate pronouns
            $p1="Computer 1";
            $p2="Computer 2";
            $win="wins";
            
            //display choices
            echo "<h2>Results</h2>";
            echo "<ul>";
            echo "<li> $p1 chose: ".$player1."</li>";
            echo "<li>$p2 chose: ".$player2."</li><li>";
            
            //determne who wins
            if($player1==$player2) {
                echo "It is a tie !";
            } else if ($player1=='Rock' && $player2=='Paper'){
                echo "$p2 wins ! Paper covers Rock.";
            } else if ($player2=='Rock' && $player1=='Paper'){
                echo "$p1 $win ! Paper covers Rock.";
            } else if ($player1=='Rock' && $player2=='Scissors'){
                echo "$p1 $win ! Rock crushes Scissors.";
            } else if ($player2=='Rock' && $player1=='Scissors'){
                echo "$p2 wins ! Rock crushes Scissors.";
            } else if ($player1=='Paper' && $player2=='Scissors'){
                echo "$p1 $win ! Scissors cut Paper.";
            } else if ($player2=='Paper' && $player1=='Scissors'){
                echo "$p2 wins ! Scissors cut Paper.";
            }
            echo "</li><ul>";
        }
        ?>
            <br>
        </div>
    </body>
</html>
