<?php
require("abifunktsioonid.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


<link rel="stylesheet" href="css/style.css">

<title>Kangelased</title>
 
  <title>Document</title>
</head>
<body>
    <div class="demo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="testimonial-slider" class="owl-carousel">
          
          <?php                  
        $kask=$yhendus->prepare("Select hero_id, superhero, name, city, description, image from heroes");
        $kask->bind_result($id, $super, $name ,$city, $description, $image);
        $kask->execute();
        while($kask->fetch()){
        echo "<div class='testimonial'>";
        if($super==true){
        echo "<span class='icon fab fa-superpowers'></span>";}
        else {echo "<span class='icon fas fa-mask fa-7x;'></span>";}
        echo "<p class='description'>";
        echo "<span class='bold'>City: </span>" .htmlspecialchars($city);
        echo "<br>";
        echo "<span class='bold'>Description: </span>" .htmlspecialchars($description); 
        echo "</p>";
        
        echo "<div class='testimonial-content'>";
        echo "<div class='pic'>"; echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'"/></div>';
        echo "<h3 class='title'>" .htmlspecialchars($name)."</h3>";
        if($super==true){
        echo "<span class='post'>Superhero</span>";}
        else {echo "<span class='post'>Hero</span>";}
        echo "<div class='btn-start'><a href='#'>Start the adventure</a></div>";
        echo "</div>";
        echo "</div>";            
          }
           ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

 
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
     


<script src="main.js"></script>
</body>
</html>