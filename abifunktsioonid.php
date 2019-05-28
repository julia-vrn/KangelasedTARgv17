<?php
$serverinimi="localhost";
$kasutajanimi="OlgaMaruta";
$parool="123456";
$andmebaas="heroes";
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
    $number = rand(1,6);

    if ($number % 2 != 0) return "You lose!";
    else return "Yow won!";
}
?>

