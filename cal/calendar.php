<?php date_default_timezone_set ('Asia/Manila'); ?>
<?php require_once 'index.php' ?>

<?php 
session_start();
$is_edit = false;

//submitを押されたら
if(isset($_POST["add_calendar"]) && !empty($_POST["add_calendar"])){
   
   //入力された内容を変数にいれる
   $form_title = $_POST['form_title'];
   $form_date = $_POST['form_date'];
   $form_textarea = $_POST['form_textarea'];
   
   
   // only process if has valid date
   if(!empty($form_date)){
    
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0){
                if($fileSize < 5000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    
                    move_uploaded_file($fileTmpName, $fileDestination);
                    // if there is no session date yet
                    if(!isset($_SESSION[$form_date])){
                        $_SESSION[$form_date] = [];
                    }

                    // セッションに情報を入れる
                    $_SESSION[$form_date][] = [
                        "title" => $form_title,
                        "body" => $form_textarea,
                        "date" => $form_date,
                        "image" => $fileNameNew,
                    ];
            
                    header('Location: ./');
                    exit;

                } else {
                    $test_alert = "<script type='text/javascript'>alert('Your file size is too big!');</script>";
                    echo $test_alert;
                    // echo "Your file is too big!";
                    // header('Location: ./');
                    // exit;
                }
            } else {
                $test_alert = "<script type='text/javascript'>alert('There was an error uploading your file!');</script>";
                echo $test_alert;
            // echo "There was an error uploading your file!";
            // header('Location: ./');
            // exit;
            }
        } else {
            $test_alert = "<script type='text/javascript'>alert('You cannot upload files of this type!');</script>";
            echo $test_alert;
            // echo "You cannot upload files of this type!";
            // header('Location: ./');
            // exit;
        }

        

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
        <div class="cal-plan">
            <div class="day">
                <img src="uploads/<?php echo $event["image"];?>" alt="" class="day_image">
                <div class="day_title"><?php echo $event["title"]; ?></div>
            </div>
            <div class="day_icon">   
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="edit_button">
                    <input type="submit" name="form_edit" value="&#xf044;" class="fa" style="height: 15px; padding-top: 0px; font-size: 80%; width: 15px; padding-left: 1px;">
                    <input type="hidden" name="form_edit_id" value="<?php echo $i; ?>">
                    <input type="hidden" name="form_edit_date" value="<?php echo $date; ?>">
                    <input type="hidden" name="form_edit_image " value="<?php echo $image; ?>">
                </form>


                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="delete_btn">
                    <input type="submit" name="form_delete" value="&#xf1f8;" class="fa" style="height: 15px; padding-top: 0px; font-size: 80%; width: 15px; padding-left: 1px;">
                    <input type="hidden" name="form_delete_id" value="<?php echo $i; ?>">
                    <input type="hidden" name="form_delete_date" value="<?php echo $date; ?>">
                    <input type="hidden" name="form_edit_date" value="<?php echo $image; ?>">
                </form>
            </div>
        </div>
<?php
    }
}

// 当日の予定表示部分
function reminder ($date) {
    
    if(!empty($_SESSION[$date])){
        //同じ日付にある予定の数だけforをくりかえす。
    for ($i = 0; $i < count($_SESSION[$date]); $i++) {
        $event = $_SESSION[$date][$i];
?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="today">
            <div class="today_left">   
                <!-- その日のうちの一つの予定のタイトルを取得し、表示する。 -->
                <?php 
                $top_img = $event["image"]; 
                $top_img_edited = 'uploads/'.$top_img;
                ?>
                <img src="<?php echo $top_img_edited; ?>" alt="" class="top_img_edited">
                
                <img src="uploads/. <?php $top_img ?>" alt=""> 
                <span class="top_title"><?php echo $event["title"]; ?> </span>
                <span class="top_body"><?php echo $event["body"]; ?></span>
            </div>
        </form>
<?php
    }
} else {
    echo "No Plans Yet.";
}
} 

// echo "<pre>";
// var_dump($_SESSION);

?>

<!-- deleteボタンが押されたら -->
<?php
if(isset($_POST["form_delete"]) && !empty($_POST["form_delete"])){
    $index = $_POST["form_delete_id"];
    $date = $_POST["form_delete_date"];
    $cal = $_SESSION;
    
    unset($cal[$date][$index]);

    $_SESSION = ($cal);
};
?>

<!-- editボタンが押されたら -->
<?php
if(isset($_POST["form_edit"]) && !empty($_POST["form_edit"])){
    $index = $_POST["form_edit_id"];
    $date = $_POST["form_edit_date"];
    $is_edit = true;
    $cal = $_SESSION;
    $event = $cal[$date][$index];
    
    $edit_title = $event["title"];
    $edit_body = $event["body"];
    $edit_date = $event["date"];
    $edit_image = $event["image"];
    
}
?>

<!-- 編集後にsubmitボタンが押されたら -->
<?php
if(isset($_POST["edit_calendar"]) && !empty($_POST["edit_calendar"])){

        $file = $_FILES['edit_calendar_image'];

        $fileNameEdited = $_FILES['edit_calendar_image']['name'];
        $fileTmpNameEdited = $_FILES['edit_calendar_image']['tmp_name'];
        $fileSizeEdited = $_FILES['edit_calendar_image']['size'];
        $fileErrorEdited = $_FILES['edit_calendar_image']['error'];
        $fileTypeEdited = $_FILES['edit_calendar_image']['type'];

        $fileExtEdited = explode('.', $fileNameEdited);
        $fileActualExtEdited = strtolower(end($fileExtEdited));

        $allowedEdited = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExtEdited, $allowedEdited)) {
            if ($fileErrorEdited === 0){
                if($fileSizeEdited < 5000000) {
                    $fileNameNewEdited = uniqid('', true).".".$fileActualExtEdited;
                    $fileDestinationEdited = 'uploads/'.$fileNameNewEdited;
                    move_uploaded_file($fileTmpNameEdited, $fileDestinationEdited);

                    //入力欄の日付とタイトルとテキスト
                    $edited_title = $_POST["form_title"];
                    $edited_date = $_POST["form_date"];
                    $edited_textarea = $_POST["form_textarea"];

                    $edited_index = $_POST["edit_calendar_index"];
                    $edited_calendar_date = $_POST["edit_calendar_date"];

                    $cal = $_SESSION;

                    if(isset($cal[$edited_calendar_date][$edited_index])){

                        if($edited_calendar_date != $edited_date){

                            $cal[$edited_date][] = [
                                "title" => $edited_title,
                                "body" => $edited_textarea,
                                "date" => $edited_date,
                                "image" => $fileNameNewEdited,
                            ];

                            unset($cal[$edited_calendar_date][$edited_index]);

                        } else {
                            
                            $cal[$edited_calendar_date][$edited_index] = [
                                "title" => $edited_title,
                                "body" => $edited_textarea,
                                "date" => $edited_date,
                                "image" => $fileNameNewEdited,
                            ];

                        }

                        $_SESSION = ($cal);

                    }
            
                    header('Location: ./');
                    exit;

                } else {
                    $test_alert = "<script type='text/javascript'>alert('Your file size is too big!');</script>";
                    echo $test_alert;
                    // echo "Your file is too big!";
                    // header('Location: ./');
                    // exit;
                }
            } else {
                $test_alert = "<script type='text/javascript'>alert('There was an error uploading your file!');</script>";
                echo $test_alert;
            // echo "There was an error uploading your file!";
            // header('Location: ./');
            // exit;
            }
        } else {
            $test_alert = "<script type='text/javascript'>alert('You cannot upload files of this type!');</script>";
            echo $test_alert;
            // echo "You cannot upload files of this type!";
            // header('Location: ./');
            // exit;
        }

    
}
?>