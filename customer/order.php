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
    <!-- Display order items here -->
    <div id="orderList" class="order-items-container container-menu d-flex flex-wrap p-3"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showOrders();
        });t

        function showOrders() {
            let orderItems = localStorage.getItem('orderItems');
            let orderList = document.getElementById('orderList');

            if (orderItems) {
                orderItems = JSON.parse(orderItems);

                orderItems.forEach((orderItem, index) => {
                    let menuID = orderItem.menuID;
                    let quantity = orderItem.quantity;

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
            } else {
                let emptyDiv = document.createElement('div');
                emptyDiv.innerHTML = '';
                orderList.appendChild(emptyDiv);
            }
        }

        function clearLocalStorage() {
            localStorage.removeItem('orderItems');
            document.getElementById('orderList').innerHTML = '';
            window.location.href = 'menu.php';
        }
    </script>
</section>


    <section class="bottom_section">
        <button class="btn btn-accept" onclick="clearLocalStorage()">
            <label>ยืนยัน</label>
        </button>
        <button class="btn btn-cancel" onclick="window.location.href='menu.php'">
            <label>ยกเลิก</label>
        </button>
    </section>

    <?php
    // close connection
    mysqli_close($conn);
    ?>
</body>

</html>