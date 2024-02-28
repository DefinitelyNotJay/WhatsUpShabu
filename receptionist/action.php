<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hey</h1>
<?php
    require_once("../utils/config.php");
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $table_id = $_GET["table_id"];
    $customer_amount = $_GET["customer_amount"];
    $promotion_id = $_GET["promotion"];
    $cost = 299;
    $discount = 0;
    $total = ((int)$customer_amount * $cost) - $discount;

    echo $table_id . " " . $customer_amount . " " . $promotion;
    $sql_insertBill = "INSERT INTO bill (table_id, total, `status`, promotion_id ) VALUES ('$table_id', '$total', 'unpaid', $promotion_id);";
    $result = mysqli_query($conn, $sql_insertBill);
    echo $result;
    
    $sql_update = "UPDATE tables SET `start_time` = NOW(), `status` = 'busy', customer_amount = '$customer_amount' WHERE id = '$table_id'";
    $result2 = mysqli_query($conn, $sql_update);

    header("Location: ManageTable.php");
    
?>
</body>
</html>