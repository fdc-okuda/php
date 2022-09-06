<?php 
session_start();

if(isset($_POST["add_calendar"]) && !empty($_POST["add_calendar"])){
   $form_title = $_POST['form_title'];
   $form_date = $_POST['form_date'];
   $form_textarea = $_POST['form_textarea'];
   
   // only process if has valid date
   if(!empty($form_date)){
        // if there is no session date yet
        if(!isset($_SESSION[$form_date])){
            $_SESSION[$form_date] = [];
        }

        $_SESSION[$form_date][] = [
            "title" => $form_title,
            "body" => $form_textarea,
            "date" => $form_date,
            "status" => 0,
        ];
   }

   if($_SESSION[$form_date] == '2022-09-07'){
        $_SESSION[$form_date]= [
            "status" == 7,
        ];
   }

   if($_SESSION[$form_date] == '2022-09-10'){
    $_SESSION[$form_date]= [
        "status" == 10,
    ];
}

   if($_SESSION[$form_date] == '2022-09-30'){
    $_SESSION[$form_date]= [
        "status" == 30,
    ];
    }

}

function displayEventDates ($date) {
    // if does not exist
    if (!isset($_SESSION[$date])) {
        return false;
    }

    // if empty
    if (empty($_SESSION[$date])) {
        return false;
    }

    for ($i = 0; $i < count($_SESSION[$date]); $i++) {
        $event = $_SESSION[$date][$i];
?>
        <form action="">
            <div>   
                <?php echo $event["title"]; ?>
            </div>
        </form>
<?php
    }
}

// echo "<pre>";
// var_dump($_SESSION);
?>

