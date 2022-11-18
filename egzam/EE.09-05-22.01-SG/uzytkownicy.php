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
        <form method="post" action="./uzytkownicy.php">
            <label>
                Login<br>
                <input type="text" name="login"><br>
            </label>
            <label>
                Hasło <br>
                <input type="password" name="haslo"><br>
            </label>
            <input type="submit" value="Wyślij">
        </form>
    </section>

    <section id="sectionP">
        <h3>Wizytówka</h3>

        <?php
            $conn = new mysqli('localhost','root','','portal');

            if(!empty($_POST['login']) && !empty($_POST['haslo'])){
                $login = $_POST['login'];
                $haslo = sha1($_POST['haslo']);

                $sql = "select haslo from uzytkownicy where login='$login';";
                $result = $conn -> query($sql);
                if ($result->num_rows > 0){
                    while($row = $result ->fetch_assoc()){
                        if($row['haslo'] == $haslo){
                            $sql = "select login, rok_urodz,przyjaciol, hobby, zdjecie from uzytkownicy inner join dane on dane.id=uzytkownicy.id where login='$login';";
                            $result = $conn -> query($sql);

                            while($row = $result -> fetch_assoc()){
                                $login = $row['login'];
                                $hobby = $row['hobby'];
                                $przyjaciol = $row['przyjaciol'];
                                $wiek = DATE('Y') - $row['rok_urodz'];
                                $zdjecie = $row['zdjecie'];
                                echo "<div id='wiz'>";
                                echo "<img src='$zdjecie' alt='osoba'> <br>";
                                echo "<h4> $login ($wiek) <br>";
                                echo "<p> hobby: $hobby</p>";
                                echo "<h1><img src='icon-on.png'> $przyjaciol</h1>";
                                echo "<a href='dane.html'>";
                                echo "<input type='submit' id ='wyslij' value='Więcej informacji'>";
                                echo "</a>";
                            }
                        }
                        else {
                            echo "Hasło nieprawidłowe";
                        }
                    }
  
                }
                else{
                    echo "login nie istnieje";
                }

            }

            $conn -> close();
        ?>
    </section>

    <footer>
        <p>Stronę wykonał : 0000000000</p>
    </footer>

</body>

</html>