<?php

  require("abifunktsioonid.php");
             if(isSet($_REQUEST["delete"])){
  $hero_id = $_REQUEST["delete"];
    
  $query = "DELETE FROM heroes WHERE hero_id='". $hero_id ."'";
  $kask = $yhendus->prepare($query);
  $kask->execute();
  }
  ?>
<!DOCTYPE HTML>
<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="addform.css">    
    <title>Delete hero</title>
  </head>
  <body>
<form id="form" method="post" enctype="multipart/form-data">
    <legend><?= $data['page_title'] ?></legend>

    
    <div class="row">
      <h1> Hero delete form </h1>
      
           <table style="width:60%; 
  border: 1px solid black;">
           <tr>
        <th>Name</th>
        <th>City</th>
        <th width='200px'>Description</th>
    </tr>
           
           <?php
            $kask = showAllheroes();
            foreach($kask as $hero){
                echo "
                    <tr align='center' >
                    <td class='f' width='100'>$hero->name</td>
                    <td class='f' width='100'>$hero->city</td>
                    <td width='800' class='f'> $hero->description</td>
                    <td>
                    <form name='form".$hero->id."'>
                    <button type='submit' value='".$hero->id."' name='delete'>Delete</button>
                    </form>
                    </td>
                    </tr>
                ";
            }
            $yhendus->close();
          ?>
           </table>

        
    
    <div class="form-group">
        <a onclick="window.location.href = 'proov.php'" class="btn btn-default">Cancel</a>
    </div>
    </div>   
</form>

</body>
</html>