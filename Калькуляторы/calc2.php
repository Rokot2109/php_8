<?php
if (isset($_GET['x'])) {
    $x = (int) ($_GET['x']);
} 
if (isset($_GET['y'])) {
    $y = (int) ($_GET['y']);
} 

if (isset($_GET['action'])) {
    if ($x === "" || $y === "") {
        $z = "Введите правильно значения!";
    }
    else {
    switch($_GET['action']) {
        case '+':
            $z = $x + $y;
            break;
        case '-':
            $z = $x - $y;
            break;
        case '*':
            $z = $x * $y;
            break;
        case '/':
            if($y == 0) {
                $z = "На ноль делить нельзя!";} 
            else
            $z = $x / $y;
            break; 
        default:
        $z = "Что-то не так";                        
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
</head>
<body>
<form method = "GET">
    <input type="number" name = "x" style = "width: 50px" value = "<?php echo $x ?>">
    <input type="submit" name = "action" value = "+" style = "width: 25px">
    <input type="submit" name = "action" value = "-" style = "width: 25px">
    <input type="submit" name = "action" value = "*" style = "width: 25px">
    <input type="submit" name = "action" value = "/" style = "width: 25px">
    <input type="number" name = "y" style = "width: 50px" value = "<?php echo $y ?>">
    <b><?php echo("Будет равно:  {$z}") ?></b>


</form>


</body>
</html>