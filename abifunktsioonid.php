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
?>