<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="customer.css">
</head>

<body>

    <?php
    session_start();
    echo session_id();
    if(!isset($_SESSION["session_id"])){
        header("Location: https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExdW04cjJzcDIzeXplM3A1eHRkOGR2dmhrM3lkcTV5YWZtaDBneXMyMyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/t0virGpgSlp4mkfiXq/giphy.gif");
        exit();
    }
    require_once("../utils/config.php");
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    ?>

    <header class="header">
        <a href="menu.php">
            <img class="logo" src="img/Whatsup.png" alt="logo" width="60%" height="50%">
        </a>
    </header>

    <section class="status_section" id="status_section">
        <?php

        $table_id = $_SESSION["table_id"];

        $sql = "SELECT orders.*
        FROM orders
        INNER JOIN tables ON orders.table_id = tables.id
        WHERE orders.table_id = '$table_id' AND orders.start_time > tables.start_time;";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $orders = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $orders[$row['id']] = array(
                    'table_id' => $row['table_id'],
                    'status' => $row['status'],
                    'start_time' => $row['start_time']
                );

                // Display order details
                echo "<div class='container-menu d-flex flex-wrap mgin-10px'>";
                echo "<div class='menu d-flex align-items-center bg-body-tertiary rounded mr-1 item'>";
                echo "Order ID: " . $row['id'] . "<br>";
                echo "Table ID: " . $row['table_id'] . "<br>";
                echo "Status: " . $row['status'] . "<br>";
                echo "Start Time: " . $row['start_time'] . "<br>";
                // Add more details as needed
                echo "</div>";
                echo "<br>";
                echo "</div>";
            }
        } else {
            echo "";
        }
        ?>
    </section>

    <section class="bottom_section">
        <button class="btn btn-accept" onclick="window.location.href='menu.php'">กลับสู่หน้าหลัก</button>
    </section>

    <?php
    // close connection
    mysqli_close($conn);
    ?>
</body>

</html>
