<?php
require("abifunktsioonid.php");?>
<!DOCTYPE html>
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
    
<link rel="stylesheet" href="css/style.css">

<title>Kangelased</title>
 
  <title>Document</title>
</head>
<body>
    <div class="demo">
        <div class="container">
          
            <!--HEADER class WELCOME in style.css --> 
            <div class="row welcome">
                <div class="col-12 d-flex justify-content-center">Welcome to the city of heroes</div>
            </div>
            <!--END OF HEADER-->
          
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
          
           <?php       
        
        $kask=$yhendus->prepare("Select situation_id from situations");
        $kask->bind_result($id);
        $kask->execute();
        while($kask->fetch()){
          echo "<div style='color:white;'>".$id;
          echo "</div>"; 
          }
  ?>
  <?php
  $res=mysqli_query($yhendus, 'Select * from situations');
  $result=array();
  while($row=$res->fetch_array()){
        $result[]=$row[0];
 // echo "<div style='color:white;'>". $row[0];
 // echo "</div>"; 
}
    //echo "<div style='color:white;'>". $result[0];
  //echo "</div>";
  
  // echo "<br";
 // echo "<br>";
  
  
      $randomSituation = $result[array_rand($result, 1)];
      //echo "<div style='color:white;'> random ". $randomSituation;
 // echo "</div>";
  
  
  $kask=$yhendus->prepare("Select name from situations where situation_id=".$randomSituation);
  $kask->bind_result($name);
    $kask->execute();
    while($kask->fetch()){
    //echo "<div style='color:white;'>".$name;
 // echo "</div>";
    
    }
        ?>


<!--MODAL WINDOW-->

                <div class="row p-5 m-5 situation">
                    <div class="col-12 start-adventure d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" name="start">
                                Start the adventure
                        </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog  mw-100 w-50 h-50" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="situation--text">
                                             There is the <?php echo "<span class='situation--text__red'>" .$name; echo"</span>";?> in the city!
                                        </div>
                                        <?php $_SESSION['situation'] = $randomSituation; ?>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                    <a href=battle.php">Save the day!</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        

                    </div>

                </div>
                <!--FOOTER ADDED (.footer in style.CSS)-->   
                <div class="row footer">
                    <div class="col-12 pt-5 pr-2 pb-4 foot d-flex justify-content-center">&copy; TTHK 2019</div>
                </div>
                <!--END OF FOOTER-->   
                  
                  
                    </div>
                </div>
            </div>
        </div>

 
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
     


<script src="main.js"></script>
</body>
</html>