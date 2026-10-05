<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Checking Variable Data Types</title>
</head>
<body>
<h2>Sum</h2>

<form method="post">
    <input type="number" step="any" name="num1" placeholder="Input First number" required>
    <input type="number" step="any" name ="num2" placeholder="Input Second Number" required>
    <input type="submit" name="submit" value="Submit">
</form>




</html>-->
<?php
$result = '';
$error  = '';

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $num1 = $_POST['num1'] ?? '';
    $num2 = $_POST['num2'] ?? '';
    $op   = $_POST['operation'] ?? '';

    // Validate
    if ( ! is_numeric( $num1 ) || ! is_numeric( $num2 ) ) {
        $error = 'Please enter valid numbers.';
    } else {
        $num1 = (float) $num1;
        $num2 = (float) $num2;

        switch ( $op ) {
            case 'add':      $result = $num1 + $num2; break;
            case 'subtract': $result = $num1 - $num2; break;
            case 'multiply': $result = $num1 * $num2; break;
            case 'divide':
                if ( $num2 == 0 ) {
                    $error = 'Cannot divide by zero.';
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default:
                $error = 'Please choose an operation.';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
    <style>
        body { font-family: sans-serif; max-width: 400px; margin: 50px auto; }
        input, select, button { padding: 8px; margin: 5px 0; width: 100%; }
        .result { background: #eef; padding: 10px; margin-top: 15px; }
        .error  { background: #fee; padding: 10px; margin-top: 15px; color: #900; }
    </style>
</head>
<body>
    <h1>Simple Calculator</h1>

    <form method="post">
        <input type="text" name="num1" placeholder="First number"
               value="<?php echo htmlspecialchars( $_POST['num1'] ?? '' ); ?>">

        <select name="operation">
            <option value="add">+</option>
            <option value="subtract">−</option>
            <option value="multiply">×</option>
            <option value="divide">÷</option>
        </select>

        <input type="text" name="num2" placeholder="Second number"
               value="<?php echo htmlspecialchars( $_POST['num2'] ?? '' ); ?>">

        <button type="submit">Calculate</button>
    </form>

    <?php if ( $error ) : ?>
        <div class="error"><?php echo htmlspecialchars( $error ); ?></div>
    <?php elseif ( $result !== '' ) : ?>
        <div class="result">Result: <strong><?php echo htmlspecialchars( $result ); ?></strong></div>
    <?php endif; ?>
</body>
</html>