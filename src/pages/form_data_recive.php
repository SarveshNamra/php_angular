<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];

    echo "Name : ". $name . "<br>";
    echo "Age : " . $age . "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label>Name : </label>
        <input type="text" name="name">

        <br><br>

        <label>Age : </label>
        <input type="number" name="age">

        <br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>