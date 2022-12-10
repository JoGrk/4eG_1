<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styl4.css">
    <title>Forum o psach</title>
</head>
<body>
   <header>
    <h1>Forum wielbicieli psów</h1>
   </header>
   <section id="left">
    <img src="obraz.jpg" alt="foksterier" height="500px">
   </section> 
   <section id="r1">
    <h2>Zapisz się</h2>
    <form action="logowanie.php" method="POST">
        Login : <input type="text" name="login"><br>
        Haslo : <input type="password" name="password"><br>
        Powtórz hasło : <input type="password" name="passwordC"><br>
        <input type="submit" value="Zapisz">
    </form> 
    <?php 
        $conn = new mysqli('localhost','root','','4eg_1_psy');
        if(empty($_POST['login']) || empty($_POST['password']) || empty($_POST['passwordC'])){
            echo "<p>Wypełnij wszystkie pola</p>";
        }
        else 
        {
            $login = $_POST['login'];
            $password=$_POST['password'];
            $passwordC=$_POST['passwordC'];
            $sql= "SELECT login FROM uzytkownicy
            where login = '$login';";
            $result = $conn ->query($sql);
            if($result -> num_rows > 0)
            {
                echo "<p>Konto nie zostało dodane</p>";
            }
            else 
            {
               //Loginu nie ma w bazie sprawdzamy haslo
               if($password!=$passwordC){
                echo "<p>Hasła nie są takie same</p>";
               }
               else{
                $szyfr =sha1($password);
                $sql2 ="insert into uzytkownicy (login, haslo) VALUES ('$login','$szyfr');";
                if($conn ->query($sql2)){
                    echo "<p>Konto zostało dodane</p>";
                }
               }
            }
        }

        



        $conn ->close();


    ?>
    </section>
   <section id="r2">
    <h2>Zapraszamy wszystkich</h2>
    <ol>
        <li>Właścicieli psów</li>
        <li>Weterynarzy</li>
        <li>Tych, co chcą kupić psa</li>
        <li>Tych , co lubią psy</li>
    </ol>
    <a href="regulamin.html">Przeczytaj regulamin forum</a>
   </section>
   <footer>
    Strone Wykonał: 000000000
   </footer>
</body>
</html>