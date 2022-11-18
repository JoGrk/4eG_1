<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        $a=0;
        if (!empty($a)){
            echo "nie jest pusty empty";
        }
        else {
            echo "jest pusty empty";
        }

        if (isset($a)){
            echo "    <br>jest ustawiony";
        }
        else {
            echo "    <br> nie jest ustawiony";
        }
    ?>

</body>

</html>