<?php
// nie ma ciasteczka, nie ma nazwy, wyswietlamy formularz
if(!isset($_COOKIE['login']) && !isset($_GET['surname'])){
    include "header.html";
    include "form.html";
    include "footer.html";
}
else if(isset($_GET['surname'])){
    $nazwa=$_GET['surname'];
    setcookie('login', $nazwa, time()+24*31*3600);
    include "header.html";
    echo "<p> Dziękujemy za podanie danych </p>"; 
    include "footer.html"; 

}
else{
    include 'header.html';
    echo "<p>Witamy! zostałeś rozpoznany jako: ".$_COOKIE['login'];
    include 'footer.html';
}




?>