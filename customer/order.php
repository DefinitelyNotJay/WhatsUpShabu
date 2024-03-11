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
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "WhatsUpShabu";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "";
    ?>

    <div class="table">
        <?php echo $_SESSION['table_id']; ?>
    </div>

    <header class="header">
        <a href="menu.php">
            <img class="logo" src="img/Whatsup.png" alt="logo" width="60%" height="50%">
        </a>
    </header>

    <section class="order_section">
        <?php

        $sql = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $latestOrderID = $row['id'];
            echo "<div class='show-order-id'>ออเดอร์ : " . $latestOrderID + 1 . "</div>";
        } else {
            echo "No orders found.";
        }

        $sql = "SELECT * FROM menu;";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $menusByType = array();
            $menuDetails = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $menuDetails[$row['ID']] = array(
                    'name' => $row['name'],
                    'image' => $row['image'],
                    'description' => $row['description'],
                    'type' => $row['type']
                );

                $type = $row["type"];

                if (!isset($menusByType[$type])) {
                    $menusByType[$type] = array();
                }
                $menusByType[$type][] = $row;
            }
        }
        ?>

        <form action="" method="post" style="width: 100%;">
            <div id="orderList" class="order-items-container container-menu d-flex flex-wrap p-3"></div>
            <input type="hidden" id="OrderItems" name="OrderItems" value="">
    </section>

    <section class="bottom_section">
        <button type="submit" class="btn btn-accept" name="accept">ยืนยัน</button>
        <button type="submit" class="btn btn-cancel" name="cancel">ยกเลิก</button>
        </form>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showOrders();
            checkLocalStorage();
        });

        function showOrders() {
            let orderItems = localStorage.getItem('orderItems');
            let orderList = document.getElementById('orderList');
            let itemList = [];

            if (orderItems) {
                orderItems = JSON.parse(orderItems);
                console.log(orderItems);

                orderItems.forEach((orderItem, index) => {
                    let menuID = orderItem.menuID;
                    let quantity = orderItem.quantity;

                    let processedOrderItem = {
                        id: menuID,
                        qty: quantity
                    };

                    itemList.push(processedOrderItem);


                    if (menuID in <?php echo json_encode($menuDetails); ?>) {
                        let menuDetails = <?php echo json_encode($menuDetails); ?>[menuID];
                        let orderDiv = document.createElement('div');
                        orderDiv.classList.add('order-item', 'menu', 'd-flex', 'align-items-center', 'bg-body-tertiary', 'rounded', 'mr-1', 'item');
                        orderDiv.style.width = '100%';
                        orderDiv.innerHTML = `
                        <img src="${menuDetails.image}" alt="${menuDetails.name}" width="110px" height="80px">
                        <div class="ml-2">
                            <div>${menuDetails.name}</div>
                            <div class='item_description'>จำนวน : ${quantity}</div>
                        </div>
                    `;
                        orderList.appendChild(orderDiv);
                        orderList.appendChild(document.createElement('br'));
                    }
                });
                let itemListJSON = JSON.stringify(itemList);
                console.log(itemListJSON);
                document.getElementById('OrderItems').value = itemListJSON;
            } else {
                let emptyDiv = document.createElement('div');
                emptyDiv.innerHTML = '';
                orderList.appendChild(emptyDiv);
            }
        }

        function checkLocalStorage() {
            let orderItems = localStorage.getItem('orderItems');
            let acceptButton = document.querySelector('.btn-accept');

            if (!orderItems || JSON.parse(orderItems).length === 0) {
                acceptButton.disabled = true;
            } else {
                acceptButton.disabled = false;
            }
        }
    </script>

    <?php

    if (isset($_POST['accept'])) {
        $table_id = $_SESSION["table_id"];
        date_default_timezone_set('Asia/Bangkok');
        $start_time = date('Y-m-d H:i:s');

        $sql = "INSERT INTO orders (table_id, status, start_time) VALUES ('$table_id', 'sent', '$start_time');";

        if (mysqli_query($conn, $sql)) {
            $order_id = mysqli_insert_id($conn);
            $orderItemsJSON = $_POST['OrderItems'];
            $orderItems = json_decode($orderItemsJSON, true);
            if ($orderItems !== null) {
                foreach ($orderItems as $orderItem) {
                    $menuID = $orderItem['id'];
                    $quantity = $orderItem['qty'];
                    $sql = "INSERT INTO order_item (order_id, menu_id, quantity) VALUES ('$order_id', '$menuID', '$quantity');";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>localStorage.removeItem('orderItems');
                    document.getElementById('orderList').innerHTML = '';window.location.href = 'menu.php';</script>";
                    } else {
                        echo "Error adding record: " . mysqli_error($conn);
                    }
                }
            } else {
                echo 'Error decoding order items JSON';
            }
        }
    }

    if (isset($_POST['cancel'])) {
        echo "<script>window.location.href = 'menu.php';</script>";
    }
    mysqli_close($conn);
    ?>
</body>

</html>