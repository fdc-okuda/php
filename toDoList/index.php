<?php require_once 'memo.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container{
            width: 600px;
            margin: auto auto;
        }
        .header{
            width: 100%;
            background-color: gray;
            text-align: center;
        }
        .table{
            width: 100%;
        }
        .check{
            width: 15%;
        }
        .content{
            width: 70%;
        }
        .remove{
            width: 15%;
        }
        .td{
            text-align: center;
        }
        .input_text{
            width: 85%;
        }
        .submit_button{
            width: 15%;
            text-align: center;
        }
        .input_field{
            width: 100%;
        }
        .line{
            text-decoration: line-through;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="to_do header"><h2>To Do</h2></div>
        <table class="table">
            <tr>
                <th class="check">check</th>
                <th class="content">content</th>
                <th class="remove">remove</th>
            </tr>
            <?php 
                if(isset($_SESSION['memo'])){
                    $arrMemoItems = $_SESSION['memo'];
                    $arrMemoItems = array_values($arrMemoItems);
                    for($i=0; $i<count($arrMemoItems); $i++) {
                        if ($arrMemoItems[$i]["status"]==0){
            ?>
            <tr>
                <td class="td">
                        <form id="form" method="post" action="">
                            <input type="hidden" name="memo_delete_id" value="<?php echo $i; ?>">
                            <input type="hidden" name="complete_indivisual_item" value="button">
                            <input type="checkbox" name="checkbox" class="checkbox"/>
                        </form> 
                </td>
                <td class="td"><p class="title"><?php echo $arrMemoItems[$i]['text'] ?></p></td>
                <td class="td">
                        <form action="" method='POST'>
                            <input type="hidden" name="memo_delete_id" value="<?php echo $i; ?>">
                            <input type="submit" name="delete_indivisual_item" class="remove_button" value='-'>
                        </form>
                </td>
            </tr>
            <?php
                    }
                }
                }
            ?>
        </table>
        <div class="to_do header"><h2>Done</h2></div>
        <table class="table">
            <tr>
                <th class="check">check</th>
                <th class="content">content</th>
                <th class="remove">remove</th>
            </tr>
            <?php 
                if(isset($_SESSION['memo'])){
                    $arrMemoItems = $_SESSION['memo'];
                    $arrMemoItems = array_values($arrMemoItems);
                    for($i=0; $i<count($arrMemoItems); $i++) {
                        if ($arrMemoItems[$i]["status"]==1){
            ?>
            <tr>
                <td class="td">
                        <form id="form" method="post" action="">
                            <input type="hidden" name="memo_delete_id_bottom" value="<?php echo $i; ?>">
                            <input type="hidden" name="complete_indivisual_item_bottom" value="button">
                            <input type="checkbox" name="checkbox" class="checkbox"/>
                        </form> 
                </td>
                <td class="td"><p class="title line"><?php echo $arrMemoItems[$i]['text'] ?></p></td>
                <td class="td">
                        <form action="" method='POST'>
                            <input type="hidden" name="memo_delete_id" value="<?php echo $i; ?>">
                            <input type="submit" name="delete_indivisual_item" class="remove_button" value='-'>
                        </form>
                </td>
            </tr>
            <?php
                    }
                }
                }
            ?>
        </table>
        <table class="table">
            <tr>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <td class="input_text"><input type="text" name="text" class="input_field"></td>
                    <td class="submit_button"><input type="submit" name="submit"></td>
                </form>
            </tr>
        </table>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>