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
    <link rel="stylesheet" href="styles.css">

</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION["session_id"])) {
        header("Location: https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExdW04cjJzcDIzeXplM3A1eHRkOGR2dmhrM3lkcTV5YWZtaDBneXMyMyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/t0virGpgSlp4mkfiXq/giphy.gif");
        exit();
    }

    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('../utils/WhatsUpShabu.db');
        }
    }
    $db = new MyDB();

    ?>

    <div class="table">
        <?php echo $_SESSION['table_id']; ?>
    </div>

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
        $result = $db->query($sql);

        $row_count = 0;
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $row_count++;
        }
        if ($row_count > 0) {
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                // Display order details
                echo "<form id='statusform' action='' method='post'>";
                echo "<div class='container-menu d-flex flex-wrap mgin-10px'>";
                echo "<div class='menu d-flex align-items-center bg-body-tertiary rounded mr-1 statusitem'>";
                echo "<input type='hidden' id='orderID' name='orderID' value='" . $row['id'] . "'>";
                if ($row['status'] == 'sent') {
                    echo "<div class='statussent'></div>";
                    echo "<div>" . $row['id'] . " : ยังไม่ได้รับออเดอร์</div>";
                } elseif ($row['status'] == 'process') {
                    echo "<div class='statusprocess'></div>";
                    echo "<div>" . $row['id'] . " : กำลังจัดเตรียม</div>";
                } elseif ($row['status'] == 'done') {
                    echo "<div class='statusdone'></div>";
                    echo "<div>" . $row['id'] . " : เสิร์ฟแล้ว</div>";
                }
                echo "<div class='ml-auto mr-2'></div><button type='submit' class=' mr-2 btn statusitem2'>แสดงรายการ</button></div>";
                echo "<br>";
                echo "</div></form>";
            }
        } else {
            echo "";
        }
        ?>

    </section>

    <section class="bottom_section">
        <button class="btn btn-accept" onclick="window.location.href='menu.php'">กลับสู่หน้าหลัก</button>
    </section>

    <section class="modal_section">
        <div class="modal fade" id="statusModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-menu d-flex flex-wrap mgin-10px">
                            <div class="menu d-flex align-items-center bg-body-tertiary rounded mr-1 item">
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['orderID'])) {
                            $order_id = $_POST['orderID'];
                        ?>
                            <script>
                                var order_id = document.getElementById('orderID').value;
                                $('#statusModal').modal('show');
                            </script>
                        <?php
                            // Perform your SQL query to fetch order details and menu information based on $order_id
                            $sql = "SELECT oi.*, m.image, m.name
                        FROM order_item oi
                        JOIN menu m ON oi.menu_id = m.ID
                        WHERE oi.order_id = '$order_id'";
                            $result = $db->query($sql);
                            $row_count = 0;
                            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                                $row_count++;
                            }

                            if ($row_count > 0) {
                                echo "<div class='show-order-id'>ออเดอร์ :" . $order_id . "</div>";
                                while ($result->fetchArray(SQLITE3_ASSOC)) {
                                    // Output order details and menu information
                                    echo "<div class='menu d-flex align-items-center bg-body-tertiary rounded mr-1 item'>";
                                    echo "<div class='menu-image'><img class='mr-2'src='" . $row['image'] . "' alt='Menu Image' height='80px' width='110'></div>";
                                    echo "<div class='menu-details'>";
                                    echo "<div class='menu-name'>" . $row['name'] . "</div>";
                                    echo "<div class='menu-id'>จำนวน : " . $row['quantity'] . "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<br>";
                                }
                            } else {
                                echo "No order details found.";
                            }
                        }
                        ?>
                        <div class="text-center modal-buttom">
                            <button class="btn btn-accept mt-5" onclick="window.location.href='status_order.php'">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>

    <?php
    // close connection
    $db->close();
    ?>


</body>

</html>