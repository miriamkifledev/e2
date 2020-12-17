<?php
session_start();

if(isset($_GET['exit']) == 1){
session_destroy();
header('Location: Home.php');
}
?>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Rock Paper Scissors Game</title>
	   <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<div class="bottomAnim">
<body>
<center>
<h1> Rock Paper Scissors Game</h1>
<h2> Mechanics </h2>
<ul>
<li> Player 1 (you) and player 2 (computer) randomly "throw" either Rock, Paper or Scissors. </li>
<li>A tie is declared if both players throw the same move. </li>
<li> OtherWise: Rock beats Scissors, Scissors beats paper, Paper beats Rock.</li>
</ul>
<h3>  </h3>
<form action="Home.php" method="POST">
    <p>Please Choose Your Player</p>
    <h2>Rock<input type="radio" value="rock" name="playerturn"  /><br />
       Paper<input type="radio" value="paper" name="playerturn"  /><br />
       Scissors<input type="radio" value="scissors" name="playerturn" /><br />
    </h2>
	<button type="submit" value="play">Play</button>

</form>


<h1> Results </h1> 

<?php
if(empty($_SESSION['your_win'])  &&
    empty($_SESSION['cpu_win'])  && 
   empty($_SESSION['draw'])     ){
    $_SESSION['your_win'] = 0;
    $_SESSION['cpu_win'] = 0;
    $_SESSION['draw'] = 0;
    //Printing the initiation of session variables for your reference
    echo $_SESSION['your_win']; 
    echo $_SESSION['cpu_win'];
    echo $_SESSION['draw'] ;
}
    $playerturn = $_POST['playerturn'];
    $rpc= array('rock', 'paper', 'scissors');
    $rndm= rand(0,2);
    $Computer=$rpc[$rndm];

    echo '<h3>You picked: '.$playerturn.'</h3>';
  
    echo '<h3>The computer picked: '. $Computer .'</h3>';

    if ($playerturn == $Computer){
        $_SESSION['draw']+=1;
        echo "YOUR SCORE:".$_SESSION['your_win']."<br>";
        echo "CPU SCORE:".$_SESSION['cpu_win']."<br>" ;
        echo "DRAW:".$_SESSION['draw']."<br>";
    }
    else if($playerturn == 'rock' && $Computer == 'scissors'){
        $_SESSION['your_win']+=1;
        echo "YOUR SCORE:".$_SESSION['your_win']."<br>";
        echo "CPU SCORE:".$_SESSION['cpu_win']."<br>" ;
        echo "DRAW:".$_SESSION['draw']."<br>";
        echo '<h1>You Win!</h1>';
}
    else if($playerturn == 'rock' && $Computer == 'paper'){
        $_SESSION['cpu_win']+=1;
        echo "YOUR SCORE:".$_SESSION['your_win']."<br>";
        echo "CPU SCORE:".$_SESSION['cpu_win']."<br>" ;
        echo "DRAW:".$_SESSION['draw']."<br>";
        echo  '<h1>You Lose! </h1>';
}
    else if($playerturn == 'scissors' && $Computer == 'rock'){
        $_SESSION['cpu_win']+=1;
        echo "YOUR SCORE:".$_SESSION['your_win']."<br>";
        echo "CPU SCORE:".$_SESSION['cpu_win']."<br>" ; 
        echo "DRAW:".$_SESSION['draw']."<br>"; 
        echo  ' <h1>You Lose!</h1> ';
}
    else if($playerturn == 'scissors' && $Computer == 'paper'){
        $_SESSION['your_win']+=1;
        echo "YOUR SCORE:".$_SESSION['your_win']."<br>";
        echo "CPU SCORE:".$_SESSION['cpu_win']."<br>" ;
        echo "DRAW:".$_SESSION['draw']."<br>";   
        echo '<h1> You Win! </h1>';
}
    else if($playerturn == 'paper' && $Computer == 'rock'){
        $_SESSION['your_win']+=1;
        echo "YOUR SCORE:".$_SESSION['your_win']."<br>";
        echo "CPU SCORE:".$_SESSION['cpu_win']."<br>" ;
        echo "DRAW:".$_SESSION['draw']."<br>";
        echo '<h1>You Win!</h1>';
}
    else if($playerturn == 'paper' && $Computer == 'scissors'){
        $_SESSION['cpu_win']+=1;
        echo "YOUR SCORE:".$_SESSION['your_win']."<br>";
        echo "CPU SCORE:".$_SESSION['cpu_win']."<br>" ; 
        echo "DRAW:".$_SESSION['draw']."<br>";
        echo '<h1>You Lose!</h1>' ;
}


?>

<button type="submit" onclick="window.location.href='Home.php'">Play Again</button><br>


</center>
<?php
include_once 'db.php';
if(isset($_POST['save']))
{	 
	 $playerturn = $_POST['playerturn'];
	 $cpu_win = $_POST['cpu_win'];
	 $draw = $_POST['draw'];
	 $email = $_POST['email'];
	 $sql = "INSERT INTO round (your_win,cpu_win,draw,playerturn)
	 VALUES ('$your_win','$cpu_win','$draw','$playerturn')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
</body>
</div>
</html>