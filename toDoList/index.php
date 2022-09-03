<?php require_once 'memo.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        .container{
            width: 600px;
            margin: auto auto;
        }
        .header{
            width: 100%;
            text-align: center;
            background-color: gray;
            margin-top: 20px;
        }
        .table{
            width: 100%;
        }
        .check{
            width: 15%;
            text-align: center;
        }
        .content{
            width: 70%;
            text-align: center;
        }
        .remove{
            width: 15%;
            text-align: center;
        }
        .tr{
            vertical-align: middle;
        }
        .td{
            text-align: center;
            vertical-align: middle;
        }
        .input_text{
            width: 85%;
        }
        .submit_button{
            width: 15%;
            text-align: center;
        }
        .remove_button{
            height: 15px;
            width: 15px;
        }
        .input_field{
            width: 100%;
        }
        .line{
            text-decoration: line-through;
        }
        .table_bottom{
            margin-top: 30px;
            width: 100%;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="to_do header"><h2>To Do</h2></div>
        <table class="table table-striped  table-hover table-sm">
            <thead>
                <tr>
                    <th class="check">check</th>
                    <th class="content">content</th>
                    <th class="remove">remove</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($_SESSION['memo'])){
                        $arrMemoItems = $_SESSION['memo'];
                        $arrMemoItems = array_values($arrMemoItems);
                        for($i=0; $i<count($arrMemoItems); $i++) {
                            if ($arrMemoItems[$i]["status"]==0){
                ?>
                
                <tr class="tr">
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
                                <input type="submit" name="delete_indivisual_item" class="remove_button" value=' '>
                            </form>
                    </td>
                </tr>
                <?php
                        }
                    }
                    }
                ?>
            </tbody>
        </table>
        <div class="to_do header"><h2>Done</h2></div>
        <table class="table table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th class="check">check</th>
                    <th class="content">content</th>
                    <th class="remove">remove</th>
                </tr>
            </thead>
            <tbody>
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
                                <input type="submit" name="delete_indivisual_item" class="remove_button" value=' '>
                            </form>
                    </td>
                </tr>
                <?php
                        }
                    }
                    }
                ?>
            </tbody>
        </table>
        <table class="table_bottom">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>