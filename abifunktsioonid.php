<?php
$serverinimi="localhost";
$kasutajanimi="OlgaMaruta";
$parool="123456";
$andmebaas="heroes";
$yhendus=new mysqli($serverinimi,$kasutajanimi,$parool,$andmebaas);
$yhendus->set_charset("utf-8");
?>