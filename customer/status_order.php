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
    if (!isset($_SESSION["session_id"])) {
        header("Location: https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExdW04cjJzcDIzeXplM3A1eHRkOGR2dmhrM3lkcTV5YWZtaDBneXMyMyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/t0virGpgSlp4mkfiXq/giphy.gif");
        exit();
    }
    require_once("../utils/config.php");
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

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
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Display order details
                echo "<div class='container-menu d-flex flex-wrap mgin-10px'>";
                echo "<div class='menu d-flex align-items-center bg-body-tertiary rounded mr-1 statusitem' id='{$row['id']}' data-toggle='modal' data-target='#statusModal'>";
                if ($row['status'] == 'sent') {
                    echo "<div class='statussent'></div>";
                    echo "<div>ยังไม่ได้รับออเดอร์</div>";
                } elseif ($row['status'] == 'process') {
                    echo "<div class='statusprocess'></div>";
                    echo "<div>กำลังจัดเตรียม</div>";
                } elseif ($row['status'] == 'done') {
                    echo "<div class='statusdone'></div>";
                    echo "<div>เสิร์ฟแล้ว</div>";
                }
                echo "<div class='ml-auto mr-2'>ออเดอร์ : " . $row['id'] . " >></div></div>";
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

    <section class="modal_section">
        <div class="modal fade" id="statusModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-menu d-flex flex-wrap mgin-10px">
                            <div class="menu d-flex align-items-center bg-body-tertiary rounded mr-1 item">
                                <div class="menu-id-display idorder"><span id="order_id_display"></span></div>
                            </div>
                        </div>

                        <!-- เพิ่มส่วนนี้เพื่อแสดง ID -->
                        <script>
                                $(document).ready(function() {
                                    $('.statusitem').on('click', function() {
                                        var order_id = $(this).attr('id');
                                        $('#statusModal').modal('show');
                                        $('#order_id_display').text(order_id);
                                    });
                                });
                            </script>

                        <?php
                        // get_order_details.php
                        $order_id = '182';
                        // Perform your SQL query to fetch order details and menu information based on $order_id
                        $sql = "SELECT oi.*, m.image, m.name
                    FROM order_item oi
                    JOIN menu m ON oi.menu_id = m.ID
                    WHERE oi.order_id = '$order_id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Output order details and menu information
                                echo "<div class='menu d-flex align-items-center bg-body-tertiary rounded mr-1 item'>";
                                echo "<div class='menu-image'><img src='" . $row['image'] . "' alt='Menu Image' width='80px'></div>";
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
    mysqli_close($conn);
    ?>


</body>

</html>