<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once("../utils/config.php");
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if(isset($_GET["table_id"])){
        $table_id = $_GET["table_id"];
        $customer_amount = $_GET["customer_amount"];
        $promotion_id = $_GET["promotion"];
        $cost = 299;
        $discount = 0;
        $total = ((int)$customer_amount * $cost) - $discount;

        echo $table_id . " " . $total . " " . $customer_amount . " " . $promotion_id . "<br>";
        $date_now = date('Y-m-d');
        echo $date_now;
        $sql_insertBill = "INSERT INTO bill (table_id, total, `status`, promotion_id, `date` ) VALUES ('$table_id', '$total', 'unpaid', '$promotion_id', '$date_now');";
        $result = mysqli_query($conn, $sql_insertBill);

        header("Location: customer_login/customer_login.php?table_id=$table_id&customer_amount=$customer_amount");        
    }
    if(isset($_GET["paymentId"])){
        $table_id = $_GET["paymentId"];
        $sql_update2 = "UPDATE tables SET `start_time` = NULL, `status` = 'free', `customer_amount` = 0 WHERE id = '$table_id'";
        $result3 = mysqli_query($conn, $sql_update2);
        unset($_GET["paymentId"]);

        header("Location: ManageTable.php");
        exit();
    }


    
?>
</body>
</html>