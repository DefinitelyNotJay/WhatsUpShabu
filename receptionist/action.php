<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    // require_once("../utils/config.php");
    // $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('../utils/WhatsUpShabu.db');
        }
    }
    $db = new MyDB();


    // add customer
    if (isset($_GET["table_id"])) {
        $table_id = $_GET["table_id"];
        $customer_amount = $_GET["customer_amount"];
        $promotion_id = $_GET["promotion"];

        $sql = "SELECT * FROM promotion WHERE id = '$promotion_id'";
        $each_cost = 299;

        $total = $customer_amount * $each_cost;
        $date_now = date('Y-m-d H-i-s');
        $sql_insertBill = "INSERT INTO bill (table_id, total, `status`, promotion_id, `date` ) VALUES ('$table_id', '$total', 'unpaid', '$promotion_id', '$date_now');";
        $result = $db->exec($sql_insertBill);
        if(!$result){
            echo $db->lastErrorMsg();
        }

        header("Location: Customer_login/index.php?table_id=$table_id&customer_amount=$customer_amount");
    }
    // payment
    if (isset($_GET["paymentId"])) {
        $table_id = $_GET["paymentId"];
        $promotion_id = $_GET["promotion"];
        $sql_query = "SELECT * FROM bill WHERE table_id = '$table_id' AND `status` = 'unpaid'";

        $result = mysqli_query($conn, $sql_query);

        $row = mysqli_fetch_assoc($result);
        $id = $row["id"];

        $sql_bill_check = "UPDATE bill SET `status` = 'paid' WHERE id = $id";

        if (mysqli_query($conn, $sql_bill_check)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        $sql_update_orders = "UPDATE orders SET `status` = 'done' WHERE table_id = '$table_id' AND `status` != 'done'";
        $result = mysqli_query($conn, $sql_update_orders);

        $sql_update_table = "UPDATE tables SET `start_time` = NULL, `status` = 'free', `customer_amount` = 0, session_id = NULL WHERE id = '$table_id'";
        $result = mysqli_query($conn, $sql_update_table);

        unset($_GET["paymentId"]);
        header("Location: ManageTable");
        exit();
    }
    ?>
</body>

</html>