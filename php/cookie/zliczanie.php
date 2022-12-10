<?php
$iledni = 30;
if(!isset($_COOKIE['murzynek'])){
    $ile = 1;
} 
else 
{
    $ile = parseInt($_COOKIE['murzynek']);
    $ile ++;
}
setcookie('murzynek',$ile,3600*24*$iledni);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    
</body>
</html>