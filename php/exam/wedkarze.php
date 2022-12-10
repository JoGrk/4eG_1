<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
     <title>Document</title>
</head>
<body>
    <h3>Ryby zamieszkujące rzeki</h3>
    <ol>
        <?php
            $conn = new mysqli('localhost', 'root' , '', '4eG_1');
            $sql="SELECT nazwa,akwen,wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE rodzaj = 3";
            $result=$conn->query($sql);

            while($row=$result->fetch_assoc()){
                $nazwa=$row['nazwa'];
                $akwen=$row['akwen'];
                $wojewodztwo=$row['wojewodztwo'];

                echo "<li> $nazwa pływa w rzece $akwen, $wojewodztwo </li>"; 


            }
            

            $conn -> close();
        ?>
    </ol>
    <h3>Ryby drapieżne naszych wód</h3>
    <table>
        <tr>
            <th>L.p.</th>
            <th>Gatunek</th>
            <th>Występowanie</th>
        </tr>
        <?php
            $conn = new mysqli('localhost', 'root', '', '4eG_1');
            $sql = "select id, nazwa , wystepowanie from ryby where styl_zycia = 1;";
            $result = $conn->query($sql);
            while ($row = $result -> fetch_row()){
                echo "<tr>";
                foreach($row as $el){
                    echo "<td> $el </td>";
                }
                echo "</tr>";
            }
            $conn -> close();
        ?>
    </table>
</body>
</html>