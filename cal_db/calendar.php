<?php date_default_timezone_set ('Asia/Manila'); ?>
<?php require_once 'index.php' ?>

<?php 
session_start();
$is_edit = false;

$pdo = new PDO(
    'mysql:host=localhost;dbname=Calendar;',
    'root',
    '',
    [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
);

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
        $NewFileName = uniqid('', true);

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $fileNameNew = uniqid('', true).".".$fileActualExt;

        try {
            $stmt = $pdo->prepare('INSERT INTO images (image_name, image_url, size, error, image_type) VALUES(:image_name, :image_url, :size, :error, :image_type)');
                    
            $stmt->bindValue(':image_name', $fileNameNew);
            $stmt->bindValue(':image_url', $fileTmpName);
            $stmt->bindValue(':size', $fileSize);
            $stmt->bindValue(':error', $fileError);
            $stmt->bindValue(':image_type', $fileType);

            $stmt->execute();

        } catch(PDOException $e) {
            echo $e->getMessage();
        } finally {
            $pdo = null;
        }

        

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0){
                if($fileSize < 5000000) {
                    
                    $fileDestination = 'uploads/'.$fileNameNew;
                    
                    move_uploaded_file($fileTmpName, $fileDestination);


                    try {

                        $pdo = new PDO(
                            'mysql:host=localhost;dbname=Calendar;',
                            'root',
                            '',
                            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
                        );

                        $r = "SELECT id FROM images WHERE image_name = '$fileNameNew'";
                        $s = $pdo->prepare($r);
                        $s -> execute();
                        $t = $s -> fetch(PDO::FETCH_ASSOC);
                        $u = $t['id'];

                        $p = $pdo->prepare('INSERT INTO plans (title, plan_date, plan_text, image_id) VALUES(:title, :plan_date, :plan_text, :image_id)');

                        $p->bindValue(':title', $form_title);
                        $p->bindValue(':plan_date', $form_date);
                        $p->bindValue(':plan_text', $form_textarea);
                        $p->bindValue(':image_id', (int)$u);
                        
            
                        $p->execute();
            
                    } catch(PDOException $e) {
                        echo $e->getMessage();
                    } finally {
                        $pdo = null;
                    }

                    $pdo = new PDO(
                        'mysql:host=localhost;dbname=Calendar;',
                        'root',
                        '',
                        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
                    );

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

    $pdo = new PDO(
        'mysql:host=localhost;dbname=Calendar;',
        'root',
        '',
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    $r = 'SELECT plan_date FROM plans';
    $s = $pdo->prepare($r);
    $s->execute();

    while($t = $s->fetchALL(PDO::FETCH_ASSOC)){

        for($i=0; $i < count($t); $i++){
            
            if($date == $t[$i]['plan_date']) {

                $c_date = $t[$i]['plan_date'];

                $contents = "SELECT id, title, plan_date, plan_text, image_id FROM plans WHERE plan_date = '$c_date'";
                $contents_c = $pdo->prepare($contents);
                $contents_c -> execute();

                $day_info = $contents_c->fetch(PDO::FETCH_ASSOC);
                $imd = $day_info['image_id'];

                $sth = $pdo->prepare("SELECT * FROM images WHERE id = '$imd'");
                $sth->execute();

                foreach($sth as $row){
                    
                

                ?>


                
                <div class="cal-plan">
                    <div class="day">
                        <img src="<?php echo 'uploads/' . $row["image_name"] ?>" alt="" class="day_image">
                        <div class="day_title"><?php echo $day_info["title"]; ?></div>
                    </div>
                    <div class="day_icon">   
                        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="edit_button">
                            <input type="submit" name="form_edit" value="&#xf044;" class="fa" style="height: 15px; padding-top: 0px; font-size: 80%; width: 15px; padding-left: 1px;">
                            <input type="hidden" name="form_edit_id" value="<?php echo $day_info["id"]; ?>">
                            <input type="hidden" name="form_edit_date" value="<?php echo $day_info; ?>">
                            <input type="hidden" name="form_edit_image_id " value="<?php echo $imd; ?>">
                        </form>

                        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="delete_btn">
                            <input type="submit" name="form_delete" value="&#xf1f8;" class="fa" style="height: 15px; padding-top: 0px; font-size: 80%; width: 15px; padding-left: 1px;">
                            <input type="hidden" name="form_delete_id" value="<?php echo $day_info["id"]; ?>">
                            <input type="hidden" name="form_delete_date" value="<?php echo $day_info; ?>">
                            <input type="hidden" name="form_edit_date" value="<?php echo $day_info["image_id"]; ?>">
                        </form>
                    </div>
                </div>

                <?php   
            }
            }
            
        }
        
    }
}

?>

<?
// 当日の予定表示部分
function reminder ($day) {

    $pdo = new PDO(
        'mysql:host=localhost;dbname=Calendar;',
        'root',
        '',
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    $e = "SELECT plan_date FROM plans WHERE plan_date = '$day'";
    $f = $pdo->prepare($e);
    $f->execute();

    $g[] = $f->fetchAll();

    if(isset($g[0][0])){
        
        for($i=0; $i < count($g); $i++){
            
    
        
            $con = "SELECT title, plan_text, image_id FROM plans WHERE plan_date = '$day'";
            $con_c = $pdo->prepare($con);
            $con_c -> execute();

            $day_info_top = $con_c->fetch(PDO::FETCH_ASSOC);

            $j = $day_info_top['image_id'];

            $sth = $pdo->prepare("SELECT * FROM images WHERE id = '$j'");
                $sth->execute();

                foreach($sth as $row){

            ?>
    
            <form action="<?php $_SERVER['PHP_SELF']; ?>" class="today">
                <div class="today_left">   
                    <!-- その日のうちの一つの予定のタイトルを取得し、表示する。 -->
                    <?php 
                    $top_img = $day_info_top["image_id"]; 
                    $top_img_edited = 'uploads/'.$top_img;
                    ?>
                    <img src="<?php echo 'uploads/' . $row["image_name"] ?>" alt="" class="top_img_edited">
                
                    <span class="top_title"><?php echo $day_info_top["title"]; ?> </span>
                    <span class="top_body"><?php echo $day_info_top["plan_text"]; ?></span>
                </div>
            </form>
            <?php  
                }      
        } 

    } else {

    echo 'No Plans Yet.';
   
    }  
    
}

?>

<!-- deleteボタンが押されたら -->
<?php

if(isset($_POST["form_delete"]) && !empty($_POST["form_delete"])){
    $index = $_POST["form_delete_id"];
    $del = $pdo->prepare("DELETE FROM plans WHERE id = :id");
    $del->bindParam(':id', $index, PDO::PARAM_INT);
    $del_plan = $del->execute();
    $pdo = null;
};
?>

<!-- editボタンが押されたら -->
<?php
if(isset($_POST["form_edit"]) && !empty($_POST["form_edit"])){
    $index_edit = $_POST["form_edit_id"];
    $is_edit = true;
    $edit = $pdo->prepare("SELECT id, title, plan_date, plan_text, image_id FROM plans WHERE id = :id");
    $edit->bindParam(':id', $index_edit, PDO::PARAM_INT);
    $edit->execute();
    $pdo = null;

    $edit_contents[] = $edit->fetchAll();

    $edit_title = $edit_contents[0][0]['title'];
    $edit_date = $edit_contents[0][0]['plan_date'];
    $edit_body = $edit_contents[0][0]['plan_text'];
    $edit_id = $edit_contents[0][0]['id'];
    $edit_image_id = $edit_contents[0][0]['image_id'];
}
?>

<!-- 編集後にsubmitボタンが押されたら -->

<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=Calendar;',
    'root',
    '',
    [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
);

//submitを押されたら
if(isset($_POST["edited_calendar"]) && !empty($_POST["edited_calendar"])){
   
   //入力された内容を変数にいれる
   $edited_title = $_POST["form_title"];
   $edited_date = $_POST["form_date"];
   $edited_textarea = $_POST["form_textarea"];
   $edited_id = $_POST["edit_id"];


   
   
   // only process if has valid date
   if(!empty($edited_date)){

        $fileName = $_FILES['edited_calendar_image']['name'];
        $fileTmpName = $_FILES['edited_calendar_image']['tmp_name'];
        $fileSize = $_FILES['edited_calendar_image']['size'];
        $fileError = $_FILES['edited_calendar_image']['error'];
        $fileType = $_FILES['edited_calendar_image']['type'];
        $NewFileName = uniqid('', true);

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $fileNameNew = uniqid('', true).".".$fileActualExt;

        try {
            $stmt = $pdo->prepare('INSERT INTO images (image_name, image_url, size, error, image_type) VALUES(:image_name, :image_url, :size, :error, :image_type)');
                    
            $stmt->bindValue(':image_name', $fileNameNew);
            $stmt->bindValue(':image_url', $fileTmpName);
            $stmt->bindValue(':size', $fileSize);
            $stmt->bindValue(':error', $fileError);
            $stmt->bindValue(':image_type', $fileType);

            $stmt->execute();

        } catch(PDOException $e) {
            echo $e->getMessage();
        } finally {
            $pdo = null;
        }

        

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0){
                if($fileSize < 5000000) {
                    
                    $fileDestination = 'uploads/'.$fileNameNew;
                    
                    move_uploaded_file($fileTmpName, $fileDestination);


                    try {

                        $pdo = new PDO(
                            'mysql:host=localhost;dbname=Calendar;',
                            'root',
                            '',
                            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
                        );

                        $r = "SELECT id FROM images WHERE image_name = '$fileNameNew'";
                        $s = $pdo->prepare($r);
                        $s -> execute();
                        $t = $s -> fetch(PDO::FETCH_ASSOC);
                        $u = $t['id'];

                        $p = 'UPDATE plans SET title = :title, plan_date = :plan_date, plan_text = :plan_text, image_id = :image_id WHERE id = :id';
                        $z = $pdo->prepare($p);

                        $params = array(':title' => $edited_title, ':plan_date' => $edited_date, ':plan_text' => $edited_textarea, ':image_id' => (int)$u, ':id' => $edited_id);

                        $z->execute($params);

                        header('Location: ./');
                        exit;
            
                    } catch(PDOException $e) {
                        echo $e->getMessage();
                    } finally {
                        $pdo = null;
                    }

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

?>