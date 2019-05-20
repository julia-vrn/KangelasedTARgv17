<?php
require("abifunktsioonid.php");?>
<!Doctype html>
<html>
<head>
    <title>Heroes page</title>
    <meta charset="UTF-8">
</head>
<body>
<?php
  $kask=$yhendus->prepare("Select situation_id, name, description,people_number, image from situations");
  $kask->bind_result($id, $name, $description, $people_number, $image);
  $kask->execute();
      while($kask->fetch()){
        
      echo "Emergency: " .htmlspecialchars($name);
      echo "<br>";
        
      echo "Description: " .htmlspecialchars($description);
      echo "<br>";
        
      echo "People: " .htmlspecialchars($people_number);
      echo "<br>";

      echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'"/>';
      echo "<br>";
    }
  ?>
</body>
</html>