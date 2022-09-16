<?php

session_start();

if(isset($_POST['submit']) && !empty($_POST['submit'])){
    $title = $_POST['title'];
    $date = $_POST['date'];
    $textarea = $_POST['textarea'];

    if(!empty($date)){

        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tpm_name'];
        $fileSize = $_FILE['file']['size'];
        $fileError = $_FILE['file']['error'];
        $fileType = $_FILE['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strlower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 500000) {
                    $fileNameNew = uniqid('', true). '.' . $fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    
                    move_upload_file($fileTpmName, $fileDestination);

                    if(!isset($_SESSION["cal"])){
                        $_SESSION["cal"] = [];
                    }
                
                    $_SESSION["cal"] = [
                        'title' => $title,
                        'date' => $date,
                        'textarea' => $textarea,
                    ];
                
                    header('Location: ./');
                    exit;

                } else{
                    $test_alert = "<script type='text/javascript'>alert('You cannot upload files of this type!')</script>";
                }
            } else {
                $test_alert = "<script type='text/javascript'>alert('There was an error uoloading your file!')</script>";
            }
        } else {
            $test_alert = "<script type='text/javascript'>alert('You cannot upload files of this type!')</script>";
        }
        }

  }

?>

<?php
  function displayEventDates ($date) {
        if(!isset($_SESSION[$date])){
            return false;
        }

        if(empty($_SESSION[$date])){
            return false;
        }

        for($i = 0; $i < count($_SESSION[$date]); $i++)
        {
            $event = $_SESSION[$date][$i];
        }
  ?>
        <div class="cal_plan">
            <div class="day_left">
                <img src="" alt="">
                <div class="day_title"></div>
            </div>
            <div class="day_right">
                <form action="">
                    
                </form>
            </div>
            
        </div>

  <?php
    }
?>