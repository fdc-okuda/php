<?php 

try {
    $option = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    );
    $pdo = new PDO('mysql:charset=UTF8; dbname=cart; host=localhost', 'root', '', $option);
} catch(PDOEException $e) {
    $error_message[] = $e->getMessage();
}

$stmt = $pdo->prepare("INSERT INTO cart (img, product_name, code, quantity, price, total) values (':form_image', ':form_name', ':form_code', ':form_quantiy', ':form_price', ':total')");
$res = $stmt->execute();

if($res){
    $success_message = 'success';
} else {
    $error_message[] = 'failed';
}

$stmt = null;

$pdo = null;


if(isset($_POST["action_add_to_cart"]) && !empty($_POST["action_add_to_cart"])){
    $form_image = $_POST['form_image'];
    $form_name = $_POST['form_name'];
    $form_code = $_POST['form_code'];
    $form_quantity = $_POST['form_quantity'];
    $form_price = $_POST['form_price'];
    $total = $_POST['form_quantity'] * $_POST['form_price'];

    if(mysql_query("insert into cart (img, product_name, code, quantity, price, total) values('$form_image', '$form_name', '$form_code', '$form_quantiy', '$form_price', '$total')"))
        {
            echo "Your data has been saved into database";
            header("refresh:2, url=index.php");
        } else {
            echo "Please check the query.";
        }
}

if(isset($_POST["form_delete_session"]) && !empty($_POST["form_delete_session"])){
    unset($_SESSION["shopping_cart"]);
}

if(isset($_POST["form_delete_individual_item"]) && !empty($_POST["form_delete_individual_item"])){
    $index = $_POST["form_delete_id"];  
    $arrShoppingCart = $_SESSION["shopping_cart"];
    unset($arrShoppingCart[$index]);
    $_SESSION["shopping_cart"] = array_values($arrShoppingCart);
}


?>

