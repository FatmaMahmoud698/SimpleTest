<?php
  session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <form method="post">
    <h4><center>
<?php 
    if(isset($_SESSION["name"]))
        echo("Welcome : ".$_SESSION["name"]); 
    else
        header("location:index.php");
?>
<br/><br/>
<input type="submit" name="btnex" value ="Exit From Exam"  class="btn btn-danger"/>
<br/>
</center>
<?php
    if(isset($_POST["btnex"]))
    {
        session_destroy();
        header("location:index.php");
    }
?>
</h4>
<h4>
<?php 
  $model=array("$","For","Switch","Xammp","[][]");
    $cr=0;$ci=0;
    for($i=0;$i<5;$i++){
        if($_SESSION["answers"][$i]===$model[$i])
        {
          $cr++;
        }
        else
        {
           $ci++;           
        }
    }
    // print_r($_SESSION["answers"]);  
    echo("Correct Question : ".$cr."   ");
    echo("Incorrect Question : ".$ci."   ");
?>
</h4>
    </form>
</div>
    
</body>
</html>