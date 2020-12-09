<?php
  session_start();
  if(!isset($_SESSION["time"])){
    $_SESSION["time"] = time();
  }//else if (time() - $_SESSION['time'] > 10) {
    
//     echo("<script> alert('Time Out.");
//     endTest();
//     echo("'); window.location.href='Start.php';</script>");
//     session_destroy();
//     // header("location:Start.php");
// }
// print_r( $_SESSION["time"]);
if(!isset($_SESSION["answers"]))
$_SESSION["answers"]=array(0,0,0,0,0);
// $_SESSION["pointerlimit"]=array();
$_SESSION['question']=array(
                    array("To Declare Variable Using ?","%","&","#","$"),
                    array("To dublicate Code  Using ?","If","Switch","For","$"),
                    array("To Put Condition Code  Using ?","While","Switch","For","$"),
                    array("To Make Localhost as a Server  Using ?","VCode","neatbeans","Xammp","PHP Compiler"),
                    array("To Declare Array Multi dimention Using ?","<>","<)","[][]","[]()")
                );

if(!isset($_SESSION["pontRand"])){
    $_SESSION["pontRand"]=array();
    while(count($_SESSION["pontRand"])<5){
        do{
            $x=rand(0,4);
        }while(in_array($x, $_SESSION["pontRand"]));
        array_push($_SESSION["pontRand"],$x);
    }
}
if(!isset($_SESSION["pont"]))
$_SESSION["pont"]=$_SESSION["pontRand"][0];
// print_r($_SESSION["pontRand"]);
function noChangePoint(){
    $x=$_SESSION["pont"]+1;
        echo("Q : ".$x." ".$_SESSION['question'][$_SESSION["pont"]][0]."<br/>");
        echo("<div class='radio' style='margin-left:20px;padding:10px'>");
        echo("<input type='radio' value='{$_SESSION["question"][$_SESSION["pont"]][1]}' name='rdanswer' ");
        if(isset($_SESSION["answers"][$_SESSION["pont"]])&&$_SESSION["answers"][$_SESSION["pont"]]===$_SESSION["question"][$_SESSION["pont"]][1]){echo ' checked ';}
        echo("/>".$_SESSION["question"][$_SESSION["pont"]][1]."<br/>");

        echo("<input type='radio' value='{$_SESSION["question"][$_SESSION["pont"]][2]}' name='rdanswer' ");
        if(isset($_SESSION["answers"][$_SESSION["pont"]])&&$_SESSION["answers"][$_SESSION["pont"]]===$_SESSION["question"][$_SESSION["pont"]][2]){echo ' checked ';}
        echo("/>".$_SESSION["question"][$_SESSION["pont"]][2]."<br/>");
        
        echo("<input type='radio' value='{$_SESSION["question"][$_SESSION["pont"]][3]}' name='rdanswer' ");
        if(isset($_SESSION["answers"][$_SESSION["pont"]])&&$_SESSION["answers"][$_SESSION["pont"]]===$_SESSION["question"][$_SESSION["pont"]][3]){echo ' checked ';}
        echo("/>".$_SESSION["question"][$_SESSION["pont"]][3]."<br/>");
        
        echo("<input type='radio' value='{$_SESSION["question"][$_SESSION["pont"]][4]}' name='rdanswer' ");
        if(isset($_SESSION["answers"][$_SESSION["pont"]])&&$_SESSION["answers"][$_SESSION["pont"]]===$_SESSION["question"][$_SESSION["pont"]][4]){echo ' checked ';}
        echo("/>".$_SESSION["question"][$_SESSION["pont"]][4]."<br/>");
    
            echo("<br/><input type='submit' value='Next Question' class='btn btn-primary' name='btnnext'/>&nbsp;&nbsp;");
            echo("<input type='submit' value='Previouse Question' class='btn btn-success' name='btnprev'/>&nbsp;&nbsp;");
         echo("</div>");
         // print_r($_SESSION["answers"]);
}
function endTest(){
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
}
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
<script>
// Set the date we're counting down to
var countDownDate = new Date("dec 3, 2020 14:50:00").getTime();
// var chnow = new Date().getTime();
// var countDownDate = new Date(chnow+1000*30);
// Update the count down every 1 second
var x = setInterval(function() {

// Get today's date and time
var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
 
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  // document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";
  // If the count down is finished, write some text
  if((minutes==0)&&(seconds==0))
  {
  /*  clearInterval(x); 
    document.getElementById("btnfin").click();
    document.getElementById("demo").innerHTML="Expired";
*/
  window.open('Result.php', '_self');    
  }
  
}, 1000);
</script>
</head>
<body>
<div class="container">
<p id="demo"></p>
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
    if(isset($_POST["btnstart"])||$_SESSION["pont"]==$_SESSION["pontRand"][0]&&!isset($_POST["btnnext"])&&!isset($_POST["btnprev"])){
        noChangePoint();           
    }
        if(isset($_POST["btnnext"]))
        {
            $index=array_search($_SESSION["pont"], $_SESSION["pontRand"]);
            if($index<4)
            {
               if(isset($_POST["rdanswer"])){
                   $_SESSION["answers"][$_SESSION["pont"]]=$_POST["rdanswer"];
                   $nextIndex=$index+1;
                   $_SESSION["pont"]=$_SESSION["pontRand"][$nextIndex];
                   // if($_SESSION["pontRand"][$nextIndex]!==null){
                   //     $_SESSION["pont"]= $_SESSION["pontRand"][$nextIndex];
                   // }else{
                   // do{
                   //      $x=rand(0,4);
                   // }while(in_array ($x, $_SESSION["pontRand"]));
                   // array_push($_SESSION["pontRand"],$x);
                   // $_SESSION["pont"]=$x;
                   //  }
                   $no=$_SESSION["pont"]+1;
                   // echo $_SESSION["pont"];
                    echo("Q : ".$no."-".$_SESSION['question'][$_SESSION["pont"]][0]."<br/>");
                    echo("<div class='radio' style='margin-left:20px;padding:10px'>");
                    echo("<input type='radio' value='{$_SESSION["question"][$_SESSION["pont"]][1]}' name='rdanswer' ");
                    if(isset($_SESSION["answers"][$_SESSION["pont"]])&&$_SESSION["answers"][$_SESSION["pont"]]===$_SESSION["question"][$_SESSION["pont"]][1]){echo ' checked ';}
                    echo("/>".$_SESSION["question"][$_SESSION["pont"]][1]."<br/>");

                    echo("<input type='radio' value='{$_SESSION["question"][$_SESSION["pont"]][2]}' name='rdanswer' ");
                    if(isset($_SESSION["answers"][$_SESSION["pont"]])&&$_SESSION["answers"][$_SESSION["pont"]]===$_SESSION["question"][$_SESSION["pont"]][2]){echo ' checked ';}
                    echo("/>".$_SESSION["question"][$_SESSION["pont"]][2]."<br/>");
                    
                    echo("<input type='radio' value='{$_SESSION["question"][$_SESSION["pont"]][3]}' name='rdanswer' ");
                    if(isset($_SESSION["answers"][$_SESSION["pont"]])&&$_SESSION["answers"][$_SESSION["pont"]]===$_SESSION["question"][$_SESSION["pont"]][3]){echo ' checked ';}
                    echo("/>".$_SESSION["question"][$_SESSION["pont"]][3]."<br/>");
                    
                    echo("<input type='radio' value='{$_SESSION["question"][$_SESSION["pont"]][4]}' name='rdanswer' ");
                    if(isset($_SESSION["answers"][$_SESSION["pont"]])&&$_SESSION["answers"][$_SESSION["pont"]]===$_SESSION["question"][$_SESSION["pont"]][4]){echo ' checked ';}
                    echo("/>".$_SESSION["question"][$_SESSION["pont"]][4]."<br/>");
                    
                    echo("<br/><input type='submit' value='Next Question' class='btn btn-primary' name='btnnext'/>&nbsp;&nbsp;");
                    echo("<input type='submit' value='Previouse Question' class='btn btn-success' name='btnprev'/>&nbsp;&nbsp;");  
                    echo("</div>"); 
                    // print_r($_SESSION["answers"]);
             }
             else{
                echo("<script> alert('You have to select answer.'); </script>");
                noChangePoint();
             }   
            }
            else{ 
                if(isset($_POST["rdanswer"])){
                    $_SESSION["answers"][$_SESSION["pont"]]=$_POST["rdanswer"]; 
                    echo("This Last Question Press Finish<br/>");
                    echo("<input type='submit' value='Previouse Question' class='btn btn-success' name='btnstart'/>&nbsp;&nbsp;");
                    echo("<input type='submit' value='Finish Exam' class='btn btn-danger' name='btnfin'/>&nbsp;&nbsp;");
                    // print_r($_SESSION["answers"]);
                }else{
                    echo("<script> alert('You have to select answer.'); </script>");
                    noChangePoint();
                }
            }

        }
        if(isset($_POST["btnprev"]))
        {
            $index=array_search($_SESSION["pont"], $_SESSION["pontRand"]);
             if($index>0)
             {
                if(isset($_POST["rdanswer"])){
                    $_SESSION["answers"][$_SESSION["pont"]]=$_POST["rdanswer"];
               }
               $perIndex=$index-1;
                $_SESSION["pont"]=$_SESSION["pontRand"][$perIndex];
                $no=$_SESSION["pont"]+1;
                // echo $_SESSION["pont"];
                echo("Q : ".$no."-".$_SESSION['question'][$_SESSION["pont"]][0]."<br/>");
                echo("<div class='radio' style='margin-left:20px;padding:10px'>");

                echo("<input type='radio' value='{$_SESSION["question"][$_SESSION["pont"]][1]}' name='rdanswer' ");
                if(isset($_SESSION["answers"][$_SESSION["pont"]])&&$_SESSION["answers"][$_SESSION["pont"]]===$_SESSION["question"][$_SESSION["pont"]][1]){echo ' checked ';}
                echo("/>".$_SESSION["question"][$_SESSION["pont"]][1]."<br/>");

                echo("<input type='radio' value='{$_SESSION["question"][$_SESSION["pont"]][2]}' name='rdanswer' ");
                if(isset($_SESSION["answers"][$_SESSION["pont"]])&&$_SESSION["answers"][$_SESSION["pont"]]===$_SESSION["question"][$_SESSION["pont"]][2]){echo ' checked ';}
                echo("/>".$_SESSION["question"][$_SESSION["pont"]][2]."<br/>");
                
                echo("<input type='radio' value='{$_SESSION["question"][$_SESSION["pont"]][3]}' name='rdanswer' ");
                if(isset($_SESSION["answers"][$_SESSION["pont"]])&&$_SESSION["answers"][$_SESSION["pont"]]===$_SESSION["question"][$_SESSION["pont"]][3]){echo ' checked ';}
                echo("/>".$_SESSION["question"][$_SESSION["pont"]][3]."<br/>");
                
                echo("<input type='radio' value='{$_SESSION["question"][$_SESSION["pont"]][4]}' name='rdanswer' ");
                if(isset($_SESSION["answers"][$_SESSION["pont"]])&&$_SESSION["answers"][$_SESSION["pont"]]===$_SESSION["question"][$_SESSION["pont"]][4]){echo ' checked ';}
                echo("/>".$_SESSION["question"][$_SESSION["pont"]][4]."<br/>");
                
                echo("<br/><input type='submit' value='Next Question' class='btn btn-primary' name='btnnext' />&nbsp;&nbsp;");
                echo("<input type='submit' value='Previouse Question' class='btn btn-success' name='btnprev'/>&nbsp;&nbsp;");  
                echo("</div>"); 
                // print_r($_SESSION["answers"]);  
             }else{  
                 echo("This First Question Press Finish<br/>");
                 echo("<input type='submit' value='Next Question' class='btn btn-success' name='btnstart'/>&nbsp;&nbsp;");
                  
             }
           
        }
if(isset($_POST["btnfin"]))
{
    endTest();
}

    ?>

</h4>
    </form>
</div>
    
</body>
</html>