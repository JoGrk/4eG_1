<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Filmy</title>
</head>
<body>
<?php 
    $link = new mysqli('localhost','root','','4eg_1');
    $sql = "SELECT * FROM movie_table";
    $result = $link -> query($sql);
    echo 'Ilosc wierszy: '.$result -> num_rows;

    echo "<table>";
    while($row=$result->fetch_row()){
        echo "<tr>";
        foreach($row as $field){
            echo "<td> $field </td>"; 
        }
        echo "</tr>";
    }
    echo "</table>";

    $result = $link -> query($sql);
    echo "<hr><ul>";
    while($row=$result->fetch_assoc()){
        $title=$row['title'];
        $category=$row['category'];
        echo "<li>$title $category</li>";
    }
    echo "</ul>";

    $link -> close();
?>
</body>
</html>