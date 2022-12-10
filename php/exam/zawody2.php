<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Dodaj zawody wędkarskie</h3>
    <form action="zgloszenie.php" method="POST">
    Łowisko:<input type="number" name="fish"><br>
    Data : <input type="date" name="date"><br>
    Sędzia <input type="text" name="judge"><br>
    <input type="submit" name="submit" value="DODAJ">
    <input type="reset" value="CZYŚĆ">

    </form>
</body>
</html>