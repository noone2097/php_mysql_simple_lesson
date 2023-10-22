<?php
include '../php_practice/conn.php';

//! For display
$stmt = $connection->prepare(" SELECT * FROM users ");
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

//! For delete
if (isset($_GET['idNumbertoDelete'])) {
    $idNum = $_GET['idNumbertoDelete'];
    $stmt = $connection->prepare(" DELETE FROM users WHERE id = ? ");
    $stmt->execute([$idNum]);

    if ($stmt) {
        echo '<br> Deleted successfully';
    } else {
        echo '<br> Failed to delete';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display with Delete</title>
</head>

<body>

    <center>
        <table>
            <tr>
                <td>ID</td>
                <td>USERNAME</td>
                <td>PASSWORD</td>
                <td>ACTION</td>
            </tr>
            <?php
            foreach ($res as $rows) {
            ?>

                <tr>
                    <td> <?php echo $rows['id'] ?> </td>
                    <td> <?php echo $rows['username'] ?> </td>
                    <td> <?php echo $rows['password'] ?> </td>
                    <td> <a href="display_delete.php?idNumbertoDelete=<?php echo $rows['id'] ?>">
                        <button>Delete</button>
                        </a>
                    </td>
                </tr>

            <?php } ?>

        </table>
        <br><br>
        <a href="index.php">
            <button type="button">
                Back to HomePage
            </button>
        </a>
        <br> <br>
        <button onClick="window.location.reload();">Refresh Page</button>
    </center>

</body>

</html>