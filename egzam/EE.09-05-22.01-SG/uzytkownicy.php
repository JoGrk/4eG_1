<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header id="banerL">
        <h2>Nasze osiedle</h2>
    </header>
    <header id="banerP">
        <?php
        echo "skrypt1";
        $conn = new mysqli('localhost','root','','portal');
        $sql = "select count(*) from dane;";
        $result = $conn -> query($sql);
        $row = $result -> fetch_array();
        echo "Liczba użytkowników portalu: $row[0]";
        

        $conn->close();

        ?>
    </header>

    <section id="sectionL">
        <h3>Logowanie</h3>
        <br>
        <form method="post">
            <p>Login</p><br>
            <input type="text" id="login">
            <br>
            <p>Hasło</p>
            <br>
            <input type="password" id="haslo">
            <input type="submit" id="wyslij" value="Wyślij">
            

        </form>

    </section>
    <section id="sectionP">
        <h3>Wizytówka</h3>
        <div id="wiz">
            <?php
                $conn = new mysqli('localhost','root','','portal');

                if(isset($_POST['login']) && isset($_POST['haslo'])){
                    $login = $_POST['login'];
                    $haslo = sha1($_POST['haslo']);

                    $sql = "select haslo from uzytkownicy 
                    where login='$login';";
                    if($result = $conn -> query($sql)){
                        while($row = $result ->fetch_assoc()){
                            $row['haslo'];
                        }
                        if($row['haslo'] == $haslo){
                            $sql3 = "select login, rok_urodz,przyjaciol, hobby, zdjecie from uzytkownicy inner join dane on dane.id=uzytkownicy.id where login='$login';";
                            $res = $conn -> query($sql3);
                            while($row = $res -> fetch_assoc()){
                                $login = $row['login'];
                                $hobby = $row['hobby'];
                                $przyjaciol = $row['przyjaciol'];
                                $wiek = DATE('Y') - $row['rok_urodz'];
                                echo "<img src=".$row['zdjecie']."alt='osoba'> <br>";
                                echo "<h4> $login ($wiek) <br>";
                                echo "<p> hobby: $hobby</p>";
                                echo "<h1><img src='icon-on.png'> $przyjaciol</h1>";
                                echo "<input type='submit' href='dane.html' value='Więcej informacji'>";
                            }

                            


                        }
                        else{
                            echo "Hasło nieprawidłowe";
                        }
                    
                    }
                    else{
                        echo "login nie istnieje";
                    }

                }

                $conn -> close();
            ?>
        </div>
    </section>
    <footer>
        <p>Stronę wykonał : 0000000000</p>
    </footer>
</body>
</html>