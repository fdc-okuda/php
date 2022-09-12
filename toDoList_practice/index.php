<?php require_once 'do.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ToDoList_Practice</title>
</head>
<body>
    <div class="container">
        <h2 class="title">To Do</h2>
        <table id="table">
            <tr id="row">
                <th id="check">check</th>
                <th id="content">content</th>
                <th id="remove">remove</th>
            </tr>
            <?php
                if(isset($_SESSION['memo'])){
                    $arrMemoItems = $_SESSION['memo'];
                    $arrMemoItems = array_values($arrMemoItems);
                    for($i=0; $i<count($arrMemoItems); $i++){
                        if($arrMemoItems[$i]['status'] == 0){
                            ?>
                <tr>
                    <td id='td_above_left'>
                        <form action="" method="POST">
                            <input type="hidden" name='check_id_above' value='<?php echo $i; ?>'>
                            <input type='hidden' name='check_above' value='button' >
                            <input type="checkbox" name='check_box' class='checkbox'>
                        </form>
                    </td>
                    <td id='td_above_center'>
                        <p class="content"></p><?php echo $arrMemoItems[$i]['text']; ?></p>
                    </td>
                    <td  id='td_above_right'>
                        <form action="" method="POST">
                            <input type="hidden" name='remove_id' value='<?php echo $i; ?>'>
                            <input type="submit" name='remove' value="remove">
                        </form>
                    </td>
                </tr>
            <?php
                        }
                    }
                }
            ?>
            
        </table>
        <h2 class="title">Done</h2>
        <table id="table">
            <tr id="row">
                <th id="check">check</th>
                <th id="content">content</th>
                <th id="remove">remove</th>
            </tr>
            <?php
                if(isset($_SESSION['memo'])){
                    $arrMemoItems = $_SESSION['memo'];
                    $arrMemoItems = array_values($arrMemoItems);
                    for($i=0; $i<count($arrMemoItems); $i++){
                        if($arrMemoItems[$i]['status'] == 1){
                            ?>
                <tr>
                    <td id='td_below_left'>
                        <form action="" method="POST">
                            <input type="hidden" name='check_id_below' value='<?php echo $i; ?>'>
                            <input type='hidden' name='check_below' value='button' >
                            <input type="checkbox" name='check_box' class="checkbox">
                        </form>
                    </td>
                    <td id='td_below_center'>
                        <p class="content" style="text-decoration: line-through"><?php echo $arrMemoItems[$i]['text']; ?></p>
                    </td>
                    <td id='td_below_right'>
                        <form action="" method="POST">
                            <input type="hidden" name='remove_id' value='<?php echo $i; ?>'>
                            <input type="submit" name='remove' value="remove">
                        </form>
                    </td>
                </tr>
            <?php
                        }
                    }
                }
            ?>
        </table>
        <div class="input_part">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="text" name="input_content" class='input_content'>
                <input type="submit" name="submit_content" class="submit_content">
            </form>
        </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.6.1.js"
            integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
            crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="main.js">
    
   
    </script>

</body>
</html>