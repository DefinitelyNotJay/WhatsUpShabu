<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen w-screen flex justify-center items-center">
<?php
    require_once("../../utils/config.php");
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $table_id = $_GET["table_id"];
    $check_status_query = "SELECT * FROM tables WHERE id = '$table_id'";
    $result = mysqli_query($conn, $check_status_query);
    $customer_amount = $_GET["customer_amount"];
    while($row = mysqli_fetch_assoc($result)){
        $status = $row['status'];
    }

    if($status === "free"){
        $sql_update = "UPDATE tables SET `start_time` = NOW(), `status` = 'busy', customer_amount = '$customer_amount' WHERE id = '$table_id'";
        $result2 = mysqli_query($conn, $sql_update);
        echo "<a href='/WhatsUpShabu/customer/menu.php'><img class='h-[200px]' src='./qr/$table_id.png'></a><br>";

    } else {
        // if(!isset($_SESSION["username"])){
        //     header("Location: /WhatsUpShabu/staff/login");
        // } else {
        //     header("Location: /WhatsUpShabu/receptionist/ManageTable.php");
        // }
    }
?>
</body>
</html>