<?php require_once 'calendar.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@300&display=swap" rel="stylesheet">
    <style>
        .container{
            font-family: 'M PLUS Rounded 1c', sans-serif;
        }
        .table{
            table-layout: fixed;
        }
        .input-above{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .title{
            width: 65%;
        }
        .date{
            width: 35%;
        }
        .input-below{
            
        }
        .textarea{
            width: 100%;
            height: 100px;
        }
        td{
            height: 100px;
        }
    </style>
    <title>calender</title>
</head>
<body>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="submit-button" method="POST" >
            <div class="input-above">
                <input type="text" class="title" name="form_title">
                <input type="date" class="date" name="form_date">
            </div>
            <div class="input-below">
                <input type="textarea" class="textarea" name="form_textarea">
                <input type="submit" class="button" value="submit" type="submit" name="add_calendar" style="float:right">    
            </div>
       </form>
        
       <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $arrCalendarItems = $_SESSION;
                ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php displayEventDates("2022-09-01"); ?></td>
                        <td><?php displayEventDates("2022-09-02"); ?></td>
                        <td><?php displayEventDates("2022-09-03"); ?></td>
                    </tr>
                    <tr>
                        <td><?php displayEventDates("2022-09-04"); ?></td>
                        <td><?php displayEventDates("2022-09-05"); ?></td>
                        <td><?php displayEventDates("2022-09-06"); ?></td>
                        <td><?php displayEventDates("2022-09-07"); ?></td>
                        <td><?php displayEventDates("2022-09-08"); ?></td>
                        <td><?php displayEventDates("2022-09-09"); ?></td>
                        <td><?php displayEventDates("2022-09-10"); ?></td>
                    </tr>
                    <tr>
                        <td><?php displayEventDates("2022-09-11"); ?></td>
                        <td><?php displayEventDates("2022-09-12"); ?></td>
                        <td><?php displayEventDates("2022-09-13"); ?></td>
                        <td><?php displayEventDates("2022-09-14"); ?></td>
                        <td><?php displayEventDates("2022-09-15"); ?></td>
                        <td><?php displayEventDates("2022-09-16"); ?></td>
                        <td><?php displayEventDates("2022-09-17"); ?></td>
                    </tr>
                    <tr>
                        <td><?php displayEventDates("2022-09-18"); ?></td>
                        <td><?php displayEventDates("2022-09-19"); ?></td>
                        <td><?php displayEventDates("2022-09-20"); ?></td>
                        <td><?php displayEventDates("2022-09-21"); ?></td>
                        <td><?php displayEventDates("2022-09-22"); ?></td>
                        <td><?php displayEventDates("2022-09-23"); ?></td>
                        <td><?php displayEventDates("2022-09-24"); ?></td>
                    </tr>
                    <tr>
                        <td><?php displayEventDates("2022-09-25"); ?></td>
                        <td><?php displayEventDates("2022-09-26"); ?></td>
                        <td><?php displayEventDates("2022-09-27"); ?></td>
                        <td><?php displayEventDates("2022-09-28"); ?></td>
                        <td><?php displayEventDates("2022-09-29"); ?></td>
                        <td><?php displayEventDates("2022-09-30"); ?></td>
                        <td></td>
                    </tr>
                </tbody>
                
        </table>
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>

