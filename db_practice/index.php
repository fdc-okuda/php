<!-- <?php
    include_once 'includes/dbh.inc.php';
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB</title>
</head>
<body>
    <?php
try{
    $pdo = new PDO(
        'mysql:host=localhost;dbname=practice0913;',
        'root',
        '',
        [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ],
    );

    $stmt = $pdo->prepare('INSERT INTO cars (id, price, color) VALUES(:id, :price, :color)');

    $stmt->bindValue(':id', 2);
    $stmt->bindValue(':price', 150);
    $stmt->bindValue(':color', 'purple');
    

    $stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
} finally {
    $pdo = null;
}


?>
</body>
</html>