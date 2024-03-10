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
    // add customer
    if(isset($_GET["table_id"])){
        $table_id = $_GET["table_id"];
        $customer_amount = $_GET["customer_amount"];
        $promotion_id = $_GET["promotion"];
        $sql = "SELECT * FROM promotion WHERE id = '$promotion_id'";
        $each_cost = 299;

        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $discount_percent = (int)($row["discount"]);
        }
        $total = $customer_amount * $each_cost;
        $net_price = $total * ((100 - $discount_percent) / 100);
        $date_now = date('Y-m-d H-i-s');
        $sql_insertBill = "INSERT INTO bill (table_id, total, `status`, promotion_id, `date` ) VALUES ('$table_id', '$net_price', 'unpaid', '$promotion_id', '$date_now');";
        $result = mysqli_query($conn, $sql_insertBill);

        header("Location: customer_login/customer_login.php?table_id=$table_id&customer_amount=$customer_amount");        
    }
    if(isset($_GET["paymentId"])){
        // payment
        $table_id = $_GET["paymentId"];
        $id;
        $sql_quert = "SELECT * FROM bill WHERE table_id = '$table_id' AND `status` = 'unpaid'";
    
        $result = mysqli_query($conn, $sql_quert);

        while($row = mysqli_fetch_assoc($result)){
            $id = $row["id"];
        };
        echo $id;

        $sql_bill_check = "UPDATE bill SET `status` = 'paid' WHERE id = $id";

        // update bill to paid
        if (mysqli_query($conn, $sql_bill_check)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        // set table to free state
        $sql_update_table = "UPDATE tables SET `start_time` = NULL, `status` = 'free', `customer_amount` = 0, session_id = NULL WHERE id = '$table_id'";
        $result3 = mysqli_query($conn, $sql_update_table);

       
        unset($_GET["paymentId"]);

        header("Location: ManageTable");
        exit();
    }


    
?>
</body>
</html>