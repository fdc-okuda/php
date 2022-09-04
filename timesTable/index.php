<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times Table</title>
</head>
<body>
    <table>
    <?php
    for($i=1; $i<=12; $i++){
        {
            echo "<tr>";
            for($j=1; $j<=6; $j++){
                echo "<td>$i * $j = ".$i*$j."</td>";
            }
            echo "</tr>";
        }
    }
    ?>

    <tr><td colspan="6"></td><tr>

    <?php
    for($i=1; $i<=12; $i++){
        {
            echo "<tr>";
            for($j=7; $j<=12; $j++){
                echo "<td>$i * $j = ".$i*$j."</td>";
            }
            echo "</tr>";
        }
    }
    ?>
    </table>
</body>
</html>

<!-- . "*" .[$j]. "=". $i*$j -->