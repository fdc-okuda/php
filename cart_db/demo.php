<?php require_once 'cart.php' ?>

<?php
$sql_code = 'SELECT code FROM cart';
        $sth = $conn->prepare($sql_code);
        $sth->execute();

        $arr_found_id = false;

        while($buff = $sth->fetchALL(PDO::FETCH_ASSOC)){
            for($i=1; $i<count($buff); $i++){
            $code = $buff[$i]['code'];
            var_dump($code);
            die();
        }

        ?>


    // $sql_all = "insert into cart(img, product_name, code, quantity, price, total) values ('$form_image', '$form_name', '$form_code', '$form_quantity', '$form_price', '$total')";

// $run = $conn->query($sql_all);

// if($run){


// $sql = 'UPDATE cart SET quantity = :quantity WHERE code = :code';

// $f = $conn->prepare($sql);

// $f->bindValue(':id', '$arr_found_id');
// $f->bindValue(':quantity', '$qtity');

// $f->execute();

// $stmt = $conn->prepare('UPDATE cart SET quantity = :quantity WHERE id = :id');

// $stmt->bindValue(':id', '$arr_found_id');
// $stmt->bindValue(':quantity', '$qtity');

// $stmt->execute();

// $quantity = $qtity;

// $stmt = $conn->prepare("UPDATE cart SET quantity = :quantity WHERE id = :id");

// $stmt->bindParam(':quantity', $quantity , PDO::PARAM_INT);

// $stmt->execute();

// $sql = "INSERT
// //         cart
// //         (id, quantity)
// //         VALUES
// //         ($arr_found_id, $qtity)
// //         ON DUPLICATE KEY UPDATE
// //         quantity = VALUES(quantity)";

// // $conn -> query($sql);

// // $sql = 'INSERT cart SET quantity = :quantity WHERE id = :id';

// // $stmt = $conn->prepare($sql);

// // $params = array(':quantity' => '$qtity', ':id' => '$arr_found_id');
// // $stmt->execute($params);

// <!-- 
// -- $form_image, '$form_name', '$form_code', '$form_quantity', '$form_price', '$total')")
//                 -- $sql_all = "insert into cart(img, product_name, code, quantity, price, total) values; 
//                 -- ('$form_image', '$form_name', '$form_code', '$form_quantity', '$form_price', '$total')";

//                 -- // $conn->query($sql_all); -->
