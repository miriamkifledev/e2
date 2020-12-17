
<html>
<head>
<style>
body {
  min-height: 100%;
  margin: 0;
  padding: 0;
 

}
.bottomAnim {
  border: none;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #2851A6  left repeat-x;
  background-size: auto;
  background-position: bottom;
  z-index: 1000;
}

body {
    background-color: #578c49;
    font-family: "Roboto", sans-serif;
    color: #000;
}



h1 {
    text-align: center;

  font-family: -apple-system, BlinkMacSystemFont;

}



button {
  display: inline-block;
  padding: 7px 15px;
margin:45px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

button:hover {background-color: #3e8e41}

button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}


button:focus {
    outline: none;
}

#scoreBlock {
    padding-top: 100px;
}

#quiz{
    overflow:hidden;
}


/*Media queries------------------------------*/

@media(min-width:768px) {
    .container {
        max-height: 600px;
        min-height: 600px;
    }
}

@media (min-width: 1024px){
    button:hover{
    background-color: yellow;
    border: none;
}
}    


</style>

</head>
<body>
<center>
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

    echo '<h2>You picked: '.$playerturn.'</h2>';
    echo '<br /><br />';
    echo '<h2>The computer picked: '. $Computer .'</h2>';
  echo '<br /><br />';  
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
<button type = "submit"><a href="Home.php?exit=1">EXIT</a></button>

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
<center>
<a href="Detail.php">Round History</a>
</center>
</body>

</html>