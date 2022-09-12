<?php require_once 'cal.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='style.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>cal_practice</title>
</head>
<body>
    <div class="container">
        <h2>Sepetember</h2>
        <div class="schedule">
            <h2>Today's Schedule</h2>
        </div>
        <div class="plan">
            <h2>What's Your Plan?</h2>
            <form action="cal.php" method="POST" enctype="multipart/form-data">
                <div class="plan_above">
                    <input type="text" name='title' class='title'>
                    <input type="date" name='date' class='date'>
                </div>
                
                <input type="textarea" name='textarea' class='textarea'>
                <input type="file" name='file'>
                <input type="submit" name='submit' class='submit'>
            </form>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="cal_td"><span class="day">1</span></td>
                <td class="cal_td"><span class="day">2</span></td>
                <td class="cal_td"><span class="day">3</span></td>
            </tr>
            <tr>
                <td class="cal_td"><span class="day">4</span></td>
                <td class="cal_td"><span class="day">5</span></td>
                <td class="cal_td"><span class="day">6</span></td>
                <td class="cal_td"><span class="day">7</span></td>
                <td class="cal_td"><span class="day">8</span></td>
                <td class="cal_td"><span class="day">9</span></td>
                <td class="cal_td"><span class="day">10</span></td>
            </tr>
            <tr>
                <td class="cal_td"><span class="day">11</span></td>
                <td class="cal_td"><span class="day">12</span></td>
                <td class="cal_td"><span class="day">13</span></td>
                <td class="cal_td"><span class="day">14</span></td>
                <td class="cal_td"><span class="day">15</span></td>
                <td class="cal_td"><span class="day">16</span></td>
                <td class="cal_td"><span class="day">17</span></td>
            </tr>
            <tr>
                <td class="cal_td"><span class="day">18</span></td>
                <td class="cal_td"><span class="day">19</span></td>
                <td class="cal_td"><span class="day">20</span></td>
                <td class="cal_td"><span class="day">21</span></td>
                <td class="cal_td"><span class="day">22</span></td>
                <td class="cal_td"><span class="day">23</span></td>
                <td class="cal_td"><span class="day">24</span></td>
            </tr>
            <tr>
                <td class="cal_td"><span class="day">25</span></td>
                <td class="cal_td"><span class="day">26</span></td>
                <td class="cal_td"><span class="day">27</span></td>
                <td class="cal_td"><span class="day">28</span></td>
                <td class="cal_td"><span class="day">29</span></td>
                <td class="cal_td"><span class="day">30</span></td>
                <td></td>
            </tr>
        </div>
        
    </div>
    
</body>
</html>