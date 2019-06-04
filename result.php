<?php
  session_start();
require("abifunktsioonid.php");
  $_SESSION['hero'] = $_GET['hero'];
  $_SESSION['situation'] = $_GET['situation'];
  $_SESSION['result1']=$_SESSION['result'];
  $_SESSION['people1']=$_SESSION['people'];

  if ($_SESSION['result1'] == '?') {
    if(is_superhero($_SESSION['hero']) != '0') {
        $_SESSION['result1'] = 'You won!';
    }
    else $_SESSION['result1'] = 'You lose!';
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script type='text/javascript'src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
      integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    




<link rel="stylesheet" href="battle.css">

<title>Kangelased</title>
 
  <title>Document</title>
</head>
<body>
    <div class="demo ">
        <div class="container result">

            <!--HEADER class WELCOME in style.css --> 
            <div class="row welcome">
                <div class="col-12 d-flex justify-content-center">Welcome to the city of heroes</div>
            </div>
            <!--END OF HEADER-->
          <!--RESULT-->
          
          <div class="row display-result">
             <?php 
  
             echo "<div class='col-12 d-flex justify-content-center'><span class='display--result'> ". $_SESSION['result1'];
                                              echo "</span></div>"; 
 
  if($_SESSION['result1']=='You won!'){

      $randomCase = rand(1,4);
      if ($randomCase == 1 || $randomCase == 2) $people_saved = $_SESSION['people'];
      else if ($randomCase == 3) $people_saved = rand($_SESSION['people1'] * 0.75, $_SESSION['people1']);
      else $people_saved = rand($_SESSION['people1'] * 0.5, $_SESSION['people1']);

      echo "<div class='col-12 d-flex justify-content-center'><span class='display--result__saved'>People saved: ".$people_saved." out of ".$_SESSION['people1'];
                                              echo "</span></div>";
    
    $kask=$yhendus->prepare("Update heroes set result=result+".$people_saved." where hero_id=?");
    $kask->bind_param("i", $_SESSION['hero']);
    $kask->execute();   
 }
  if($_SESSION['result1']=='You lose!') {
    echo "<div class='col-12 d-flex justify-content-center'><span class='display--result__lost'>People lost: ".$_SESSION['people1'];
                                              echo "</span></div>"; 
 
  }
  session_destroy(); 

?>
          </div>

            <!--SITUATION-->
            <div class="row random-situation">
              <div class="col-6 situation--image d-flex justify-content-end">
              <?php 
              $kask=$yhendus->prepare("Select hero_id, superhero, name, city, description, image from heroes
where hero_id=".$_SESSION['hero']."");
              $kask->bind_result($id, $super, $name ,$city, $description, $image);
              $kask->execute();
              while($kask->fetch()){
                  echo "<div class='testimonial'>";

                  echo "<div class='testimonial-content'>";
                  echo "<div class='pic'>"; echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'"/></div>';
                  echo "<h3 class='title'>" .htmlspecialchars($name)."</h3>";
                  if($super==true){
                      echo "<span class='post'>Superhero</span>";}
                      else {echo "<span class='post'>Hero</span>";}
                      echo "</div>";
                  echo "</div>";
             
              }
              ?>
              <?php
              $kask = $yhendus->prepare("Select situation_id, name, description, people_number, image from situations where situation_id=".$_SESSION['situation']);
              $kask->bind_result($id, $name, $description, $people_number, $image);
              $kask->execute();
              while($kask->fetch()){
                  echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'"/>';
                  echo "</div>
                    <div class='col-6 situation--description'>
                    <span class='situation--name'>
                    ".$name."
                    </span>
                    <span class='situation--description'>
                    ".$description."
                    </span>
                    </span>";
                }?>
              </div>
            </div>
          
          <div class="row p-5 situation">
              <div class="col-12 start-adventure d-flex justify-content-center">
                  <button type="button" class="btn-adventure" name="submit_btn"
                          onclick="location.href = 'proov.php';">
                          Try Again!
                  </button>

              </div>

          </div>

                <!--MODAL WINDOW-->

               

                   <!--FOOTER ADDED (.footer in style.CSS)-->   
                <div class="row footer">
                    <div class="col-12 pt-5 pr-2 pb-4 foot d-flex justify-content-center">&copy; TTHK 2019</div>
                </div>
                <!--END OF FOOTER-->   

            </div> 
            </div>

 
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    
     
    

<script src="main.js"></script>
</body>
</html>