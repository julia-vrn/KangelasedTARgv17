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
	$kask=$yhendus->prepare("Select hero_id, superhero, name, city, image from heroes");
	$kask->bind_result($id, $super, $name ,$city, $image);
	$kask->execute();
      while($kask->fetch()){
		  if($super==true){
			  echo "is superheroe" .$super; 
		  }
		  echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'"/>';
		  echo "<br>";
		  echo "Name: " .htmlspecialchars($name);
		  echo "<br>";
        echo "City: " .htmlspecialchars($city);
		echo "<br>";
		echo "<br>";
    }
  ?>
</body>
</html>