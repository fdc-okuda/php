<?php
$dsn = "mysql:dbname=cart;host=localhost;port=3360";
$username = "root";
$password = "";

$conn = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

if(isset($_POST["action_add_to_cart"]) && !empty($_POST["action_add_to_cart"])){

    $form_image = $_POST['form_image'];
    $form_name = $_POST['form_name'];
    $form_code = $_POST['form_code'];
    $form_quantity = $_POST['form_quantity'];
    $form_price = $_POST['form_price'];
    $total = $_POST['form_quantity'] * $_POST['form_price'];

        $sql_code = 'SELECT code, quantity, id FROM cart';
        $sth = $conn->prepare($sql_code);
        $sth->execute();

        $arr_found_id = false;

        //display all arrays(code, quantity, id)
        while($buff = $sth->fetchALL(PDO::FETCH_ASSOC)){

            //count the array and loop
            for($i=0; $i<count($buff); $i++){

                //put code into a variable one by one
                $code = $buff[$i]['code'];
                
                //if the code input and the code in the array are the same
                if($code == $form_code){
                    
                    //the id of $code is inserted into a variable
                    $arr_found_id = $buff[$i]['id'];
                
                }   
            }
        }

        if($arr_found_id !== false){

            //select the quantity of the item with the id($arr_found_id)
            $q = "SELECT quantity FROM cart WHERE id = $arr_found_id";
            $cart_quantity = $conn->prepare($q);
            $cart_quantity->execute();

            //pick up the quantity and put it into the variable(array)
            $qt = $cart_quantity->fetch(PDO::FETCH_ASSOC);

            //pick up the number of quantity from the array
            $qtity = $qt['quantity'];
            
            //add the quantiy of both
            $qtity = $qtity + $form_quantity;

            $sql = "UPDATE cart SET quantity = :quantity WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $params = array(':quantity' => $qtity, ':id' => $arr_found_id);

            $stmt->execute($params);

            header('Location: ./');
		          exit;

        } else {

            $f = $conn->prepare("INSERT INTO cart(img, product_name, code, quantity, price, total) values 
            (:img, :product_name, :code, :quantity, :price, :total)");
                
            $f->bindValue(':img', $form_image);
            $f->bindValue(':product_name', $form_name);
            $f->bindValue(':code', $form_code);
            $f->bindValue(':quantity', $form_quantity);
            $f->bindValue(':price', $form_price);
            $f->bindValue(':total', $total);

            $f->execute();

            header('Location: ./');
            exit;
        }
}           

if(isset($_POST['form_delete_session']) && !empty($_POST['form_delete_session'])){
    $conn->query($conn, 'TRUNCATE TABLE cart;');
}

if(isset($_POST['form_delete_indivisual_item']) && !empty($_POST['form_delete_indivisual_item'])){
    $id = $_POST["form_delete_id"];
    $d = $conn->prepare("DELETE FROM cart WHERE id = :id");
    $d->bindParam(':id', $id, PDO::PARAM_INT);
    $d->execute();
    // $index = $_POST["form_delete_id"];
    // $sql = "DELETE FROM cart WHERE id=$index";
    // $conn->query($sql);
}

?>


