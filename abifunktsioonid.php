<?php
$serverinimi="d76662.mysql.zonevs.eu";
$kasutajanimi="d76662sa247210";
$parool="nk5EphPE5A67S864U";
$andmebaas="d76662sd284907";
$yhendus=new mysqli($serverinimi,$kasutajanimi,$parool,$andmebaas);
$yhendus->set_charset("utf-8");
  

function showAllheroes() {
    global $yhendus;
    $kask=$yhendus->prepare("Select hero_id, superhero, name, city, description, image from heroes");
    $kask->bind_result($id, $super, $name ,$city, $description, $image);
    $kask->execute();
    $heroes=array();
    while($kask->fetch()){
        $hero=new stdClass();
        $hero->id=$id;
        $hero->super=htmlspecialchars($super);
        $hero->name=htmlspecialchars($name);
        $hero->city=htmlspecialchars($city);
        $hero->description=htmlspecialchars($description);
        $hero->image=base64_encode($image);
        array_push($heroes, $hero);
    }
    return $heroes;
}

function getSituation($situation) {
    global $yhendus;
    $kask = $yhendus->prepare("Select situation_id, name, people_number, image from situations where situation_id=".$situation);
    $kask->bind_result($id, $name, $people_number, $image);
    $kask->execute();

    $situations=array();
    while($kask->fetch()){
        $situation=new stdClass();
        $situation->id=$id;
        $situation->name=htmlspecialchars($name);
        $situation->people_number=htmlspecialchars($people_number);
        $situation->image=base64_encode($image);
        array_push($situations, $situation);
    }
    return $situations;
}

function battle() {
    $number = rand(1,3);

    if ($number == 1) return "You lose!";
    else return "You won!";
}
?>

