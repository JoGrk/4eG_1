<?php

$link = new mysqli('localhost','root','','4eg_1');

$data=$_POST['data'];
$osoby=$_POST['osoby'];
$numer=$_POST['telefon'];

$sql = "INSERT INTO stolik(data,osoby,numer) VALUES ('$data',$osoby,'$numer');";
if($link->query($sql))
{
    echo "Dodano rezerwację do bazy!";
}


$link->close();

?>