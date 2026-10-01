<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP Learning</title>
</head>
<body>
<h2>Simple Calculator</h2>
<form method="POST">
    <input type="number" name="num1" placeholder="First Number" required><br>
    <select name="operation" id="">
        <option value="add">Add</option>
        <option value="subtract">Subtract</option>
        <option value="multiply">Multiply</option>
        <option value="divide">Divide</option>
    </select><br>
    <input type="number" name="num2" placeholder="Second Number" required>
    <button type="submit">Calculate</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $operation = $_POST['operation'];
    $num2 = $_POST['num2'];
   if ($operation == 'add'){
      $price = $num1 + $num2;
   }elseif ($operation == 'subtract'){
      $price = $num1 - $num2 ;
   }elseif ($operation == 'multiply'){
      $price = $num1 * $num2 ;
   }elseif ($operation == 'divide'){
        if ($num2 != 0) {
            $price = $num1 / $num2 ;
        } else {
            $price = "Error: Division by zero";
        }
   }
}

//unset($price);
echo $price;
?>


</html>
