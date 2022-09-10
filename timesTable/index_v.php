<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        table{
            margin: 20px;
        }
        table, th, td{
            border: 1px solid;
            text-align: center;
        }
    </style>
    <title>Times Table</title>
</head>
<body>
<tr>
    
<table border='1'>
        <?php
        for($i=1; $i <= 12; $i++){
            echo '<tr>';
            for($j=1; $j <= 6; $j++){ 
                echo ('<td>'. $j. '*'. $i. '='. ($j * $i). '</td>'); 
            }
            echo '<tr>';
        } 

        echo '<tr><td colspan="6">&nbsp;</td></tr>';

        for($i=1; $i <= 12; $i++){
            echo '<tr>';
            for($j=7; $j <= 12; $j++){ 
                echo ('<td>'. $j. '*'. $i. '='. ($j * $i). '</td>'); 
            }
            echo '<tr>';
        } 
    ?>
</table>

</tr>
</body>
</html>