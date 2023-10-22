<?php

include '../php_practice/conn.php';

if (isset($_POST['saveInfo'])) {
    $userName = $_POST['usernametf'];
    $passWord = $_POST['passwordtf'];

    $stmt = $connection->prepare(" INSERT INTO `users`(`username`, `password`) VALUES (?,?) ");
    $res = $stmt->execute([$userName, $passWord]);

    if ($res) {
        echo '<br> Successfully saved!';
    } else {
        echo 'Failed to save.';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>

<body>

    <center>
        <form action="" method="post">

            <input type="text" name="usernametf" placeholder="Username"> <br> <br>
            <input type="text" name="passwordtf" placeholder="Password"> <br> <br>
            <button type="submit" name="saveInfo">Save</button>
            <br><br>
            <a href="index.php">
                <button type="button">
                    Back to HomePage
                </button>
            </a>

        </form>
    </center>

</body>

</html>