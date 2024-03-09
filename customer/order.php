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
    // session_start();
    // if(!isset($_SESSION["session_id"])){
    //     header("Location: https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExdW04cjJzcDIzeXplM3A1eHRkOGR2dmhrM3lkcTV5YWZtaDBneXMyMyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/t0virGpgSlp4mkfiXq/giphy.gif");
    //     exit();
    // }
    // echo $_SESSION["session_id"];
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

    <header class="header">
        <a href="menu.php">
            <img class="logo" src="img/Whatsup.png" alt="logo" width="50%" height="50%">
        </a>
    </header>

    <section class="order_section">
        <?php
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
                // Convert the itemList array to a JSON string
                let itemListJSON = JSON.stringify(itemList);
                console.log(itemListJSON);
                // Set the JSON string as the value of the hidden input field
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
                // Disable the Accept button if orderItems is empty
                acceptButton.disabled = true;
            } else {
                // Enable the Accept button if orderItems is not empty
                acceptButton.disabled = false;
            }
        }
    </script>

    <?php

    if (isset($_POST['accept'])) {
        $table_id = 'A-01';
        date_default_timezone_set('Asia/Bangkok');
        $start_time = date('H:i:s');
        
        //Test
        // Retrieve the order items JSON string from the form
        $orderItemsJSON = $_POST['OrderItems'];

        // Decode the JSON string into an array
        $orderItems = json_decode($orderItemsJSON, true);
        if ($orderItems !== null) {
            // Process each order item
            foreach ($orderItems as $orderItem) {
                $menuID = $orderItem['id'];
                $quantity = $orderItem['qty'];
                echo $menuID;
                echo $quantity;
            }
            echo 'Order processed successfully';
        } else {
            // Handle JSON decoding error
            echo 'Error decoding order items JSON';
        }


        $sql = "INSERT INTO orders (table_id, status, start_time) VALUES ('$table_id', 'sent', '$start_time');";

        if (mysqli_query($conn, $sql)) {
            $sql = "SELECT * FROM order_item";
            if (mysqli_query($conn, $sql)) {
                echo "<script>localStorage.removeItem('orderItems');
                    document.getElementById('orderList').innerHTML = '';window.location.href = 'menu.php';</script>";
            }
        } else {
            echo "Error adding record: " . mysqli_error($conn);
        }
    }

    if (isset($_POST['cancel'])) {
        echo "<script>window.location.href = 'menu.php';</script>";
    }
    // close connection
    mysqli_close($conn);
    ?>
</body>

</html>