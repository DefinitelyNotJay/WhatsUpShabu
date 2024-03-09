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
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "WhatsUpShabu";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    ?>

    <header class="header">
        <a href="menu.php">
            <img class="logo" src="img/Whatsup.png" alt="logo" width="50%" height="50%">
        </a>
    </header>

    <section class="status_section" id="status_section">
        <?php
        $sql = "SELECT * FROM orders;";
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
                echo "<div class='container-menu d-flex flex-wrap'>";
                echo "<div class='menu d-flex align-items-center bg-body-tertiary rounded mr-1 item' data-toggle='modal' data-target='#addordermodal' data-menu-id='" . $row["id"] . "'>";
                echo "<div>";
                echo "Order ID: " . $row['id'] . "<br>";
                echo "Table ID: " . $row['table_id'] . "<br>";
                echo "Status: " . $row['status'] . "<br>";
                echo "Start Time: " . $row['start_time'] . "<br>";
                // Add more details as needed
                echo "</div>";
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
        <button class="btn btn-cancel" onclick="window.location.href='menu.php'">
            <label>กลับสู่หน้าหลัก</label>
        </button>
    </section>

    <?php
    // close connection
    mysqli_close($conn);
    ?>
</body>

</html>
