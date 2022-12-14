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
    <script src="https://kit.fontawesome.com/9005a12b78.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@300&display=swap" rel="stylesheet">
    <style>
        
        body{
            width: 100%;
            margin: 0;
            padding: 0;
        }
        .container{
            padding: 100px;
            margin: 0px;
            font-family: 'M PLUS Rounded 1c', sans-serif;
        }
        .contents{
            padding: 20px;
        }
        .header{
            margin-top: 30px;
            margin-bottom: 15px;
        }
        .top_title{
            font-weight: 900;
        }
        .table{
            table-layout: fixed;
        }
        .line{
            margin-top: 6px;
            color: #DEE2E6;
            border-width: 1px;
        }
        .top_img_edited{
            width: 10px;
            height: 10px;
        }
        .input-above{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .input-below{
            /* position: relative; */
            margin-bottom: 50px;
        }
        .button{
            /* position: absolute;
            bottom: 0;
            right: 0; */
        }
        .title{
            width: 65%;
            border: solid 1px #DEE2E6;
        }
        .date{
            width: 35%;
            border: solid 1px #DEE2E6;
            color: #848484;
        }
        .textarea{
            width: 100%;
            height: 50px;
            font-family: 'M PLUS Rounded 1c', sans-serif;
            border: solid 1px #DEE2E6;
        }
        .square{
            border: solid 1.5px #DEE2E6;
            width: 100%;
            height: 100px;
            margin-bottom: 50px;
        }
        th{
            text-align: center;
        }
        td{
            height: 100px;
        }
        .cell{
            position: relative;
        }
        .cell span{
            position: absolute;
            right: 10px;
            bottom: 5px;
        }
        
        .day_image{
            width: 10px;
            height: 10px;
            margin-top: 4px;
        }
        .day_title{
            margin-left: 5px;
        }
        .today{
            display: flex;
            margin-bottom: 10px;
        }
        /* ??????????????????????????? */
        @media(min-width: 880px){
        .cal-plan{
            display: flex;
            justify-content: flex-start;
            /* position: relative; */
        }
        .day{
            display: flex;
            justify-content: flex-start;
            position: relative;
        }
        .day_left {
            display: flex;
        
        }
        .day_icon{
            display: flex;
            margin-bottom: 5px;
            margin-left: 10px;
            float: right;
            /* position: absolute; */
            /* right: 0;
            top: 0; */
            
        }
    } 
        @media(max-width: 879px){
        .cal-plan{
            
        }
        .day{
            display: flex;
            justify-content: flex-start;
            
        }
        .day_icon{
            display: flex;
            margin-bottom: 5px;
            margin-left: 15px;
            margin-top: 2px;
        }
     }
        /* ??????????????????????????? */
        .top_body{
            margin-left: 10px;
        }
        .delete_btn{
            margin-left: 5px;
            margin-top: 0px;
        }
    </style>
    <title>calender</title>
</head>
<body>
    <div class="container-fluid">
        
        <div class="contents">
            <h1>September</h1>

            <h3 class="header">Today's Schedule</h3>

            <div class="t_sche">
                
                <?php 
                    $timestamp = time();
                    $day = date("Y-m-d", $timestamp);
                    reminder($day);
                ?>
                
                <hr class="line">
            </div>

            <h3 class="header">What's Your Plan?</h3>

            <?php if ($is_edit == false){ ?>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" class="submit-button" method="POST" enctype="multipart/form-data" >
                <div class="input-above">
                    <input type="text" class="title" name="form_title" required="required" placeholder="title">
                    <input type="date" class="date" name="form_date" required="required">
                </div>
                <div class="input-below">
                    <textarea class="textarea" name="form_textarea" required="required" placeholder="content"></textarea>
                    <input type="file" name="file" required="required">
                    <input type="submit" class="button" value="submit" type="submit" name="add_calendar" style="float: right;">   
                </div>
            </form>

        <?php } ?>

        <?php if ($is_edit == true){ ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" name = 'edited_button' class="submit-button" method="POST" enctype="multipart/form-data">
                <div class="input-above">
                    <input type="text" class="title" name="form_title" required="required" value = "<?php echo $edit_title ?>" placeholder="title">
                    <input type="date" class="date" name="form_date" required="required" value = "<?php echo $edit_date ?>">
                </div>
                <div class="input-below">
                    <textarea class="textarea" name="form_textarea" required="required"><?php echo $edit_body ?></textarea>
                    <input type="submit" class="button" value="submit" type="submit" name="edited_calendar" style="float: right;">    
                    <input type="hidden" value="<?php echo $edit_id ?>" name="edit_id">
                    <!-- <input type="hidden" value="<?php echo $index ?>" name="edited_calendar_index"> -->
                    <input type="hidden" value="<?php echo $edit_image_id; ?>" name="edited_image_id">
                    <input type="file"  name="edited_calendar_image" required="required">
                </div>
                
        </form>
        <?php } ?>
            
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="cell"><span class="number">1</span><?php displayEventDates("2022-09-01"); ?></td>
                            <td class="cell"><span class="number">2</span><?php displayEventDates("2022-09-02"); ?></td>
                            <td class="cell"><span class="number">3</span><?php displayEventDates("2022-09-03"); ?></td>
                        </tr>
                        <tr>
                            <td class="cell"><span class="number">4</span><?php displayEventDates("2022-09-04"); ?></td>
                            <td class="cell"><span class="number">5</span><?php displayEventDates("2022-09-05"); ?></td>
                            <td class="cell"><span class="number">6</span><?php displayEventDates("2022-09-06"); ?></td>
                            <td class="cell"><span class="number">7</span><?php displayEventDates("2022-09-07"); ?></td>
                            <td class="cell"><span class="number">8</span><?php displayEventDates("2022-09-08"); ?></td>
                            <td class="cell"><span class="number">9</span><?php displayEventDates("2022-09-09"); ?></td>
                            <td class="cell"><span class="number">10</span><?php displayEventDates("2022-09-10"); ?></td>
                        </tr>
                        <tr>
                            <td class="cell"><span class="number">11</span><?php displayEventDates("2022-09-11"); ?></td>
                            <td class="cell"><span class="number">12</span><?php displayEventDates("2022-09-12"); ?></td>
                            <td class="cell"><span class="number">13</span><?php displayEventDates("2022-09-13"); ?></td>
                            <td class="cell"><span class="number">14</span><?php displayEventDates("2022-09-14"); ?></td>
                            <td class="cell"><span class="number">15</span><?php displayEventDates("2022-09-15"); ?></td>
                            <td class="cell"><span class="number">16</span><?php displayEventDates("2022-09-16"); ?></td>
                            <td class="cell"><span class="number">17</span><?php displayEventDates("2022-09-17"); ?></td>
                        </tr>
                        <tr>
                            <td class="cell"><span class="number">18</span><?php displayEventDates("2022-09-18"); ?></td>
                            <td class="cell"><span class="number">19</span><?php displayEventDates("2022-09-19"); ?></td>
                            <td class="cell"><span class="number">20</span><?php displayEventDates("2022-09-20"); ?></td>
                            <td class="cell"><span class="number">21</span><?php displayEventDates("2022-09-21"); ?></td>
                            <td class="cell"><span class="number">22</span><?php displayEventDates("2022-09-22"); ?></td>
                            <td class="cell"><span class="number">23</span><?php displayEventDates("2022-09-23"); ?></td>
                            <td class="cell"><span class="number">24</span><?php displayEventDates("2022-09-24"); ?></td>
                        </tr>
                        <tr>
                            <td class="cell"><span class="number">25</span><?php displayEventDates("2022-09-25"); ?></td>
                            <td class="cell"><span class="number">26</span><?php displayEventDates("2022-09-26"); ?></td>
                            <td class="cell"><span class="number">27</span><?php displayEventDates("2022-09-27"); ?></td>
                            <td class="cell"><span class="number">28</span><?php displayEventDates("2022-09-28"); ?></td>
                            <td class="cell"><span class="number">29</span><?php displayEventDates("2022-09-29"); ?></td>
                            <td class="cell"><span class="number">30</span><?php displayEventDates("2022-09-30"); ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
            </table>
        </div>
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>

