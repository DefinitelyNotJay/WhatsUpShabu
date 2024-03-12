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
    class MyDB extends SQLite3
        {
            function __construct()
            {
                $this->open('../utils/WhatsUpShabu.db');
            }
        }
        $db = new MyDB();

    if (!isset($_SESSION["session_id"])) {
        $id = $_GET["session_id"];
        $sql_check_query = "SELECT * FROM tables WHERE session_id = '$id' AND `status` = 'busy'";
        $result =  $db->query($sql_check_query);
        $row_count = 0;
        while($row = $result->fetchArray(SQLITE3_ASSOC)){
            $row_count++;
        }
        if ($row_count <= 0) {
            header("Location: https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExdW04cjJzcDIzeXplM3A1eHRkOGR2dmhrM3lkcTV5YWZtaDBneXMyMyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/t0virGpgSlp4mkfiXq/giphy.gif");
            exit();
        } else {
            $_SESSION["table_id"] = $_GET["table_id"];
            $_SESSION["sessionS_id"] = $_GET["session_id"];
        };
    } else {
        // check 2 states -> if table_status = paid || session_id != latest table session_id
        $table_id = $_SESSION["table_id"];
        $sql_check_table_status = "SELECT * FROM tables WHERE id = '$table_id' AND `status` = 'free'";
        $result = $db->query($sql_check_table_status);
        $row = $result -> fetchArray(SQLITE3_ASSOC);
        echo $row["id"];
        $row_count = 0;
        while($row = $result->fetchArray(SQLITE3_ASSOC)){
            $row_count;
        }
        if ($row_count > 0) {
            session_unset();
            session_destroy();
            header("Location: https://www.google.com/");
            exit();
        }
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

    <section class="search_section" id="search_section">
        <input type="text" id="search" class="form-control" placeholder="ค้นหาเมนู">
    </section>

    <section class="select_section" id="select_section">
        <p>เมนู</p>
        <div class="btn-container">
            <button class="btn btn_select meat" id="meat">เนื้อ</button>
            <button class="btn btn_select pork" id="pork">หมู</button>
            <button class="btn btn_select chicken" id="chicken">ไก่</button>
            <button class="btn btn_select seafood" id="seafood">ทะเล</button>
            <button class="btn btn_select meatball" id="meatball">ลูกชิ้น</button>
            <button class="btn btn_select other" id="other">ของกินเล่น</button>
            <button class="btn btn_select desert" id="desert">ของหวาน</button>
            <button class="btn btn_select fruit" id="fruit">ผลไม้</button>
        </div>
    </section>

    <section class="menu_section" id="menu_section">
        <?php


        $sql = "SELECT * FROM menu WHERE status='restocking'OR status='instock';";
        $result = $db->query($sql);

        $row_count = 0;
        while($row = $result->fetchArray(SQLITE3_ASSOC)){
            $row_count++;
        }

        if ($row_count > 0) {
            $menusByType = array();
            $menuDetails = array();

            while ($row = $result -> fetchArray(SQLITE3_ASSOC)) {
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

            foreach ($menusByType as $type => $menus) {
                echo '<p id="' . $type . '">' . $type . '</p>';
                echo "<div class='container-menu d-flex flex-wrap mgin-10px'>";
                foreach ($menus as $menu) {
                    if ($menu["status"] == "restocking") {
                        echo "<div class='menu d-flex align-items-center bg-body-tertiary rounded mr-1 restockitem color'>";
                        echo "<img src='" . $menu["image"] . "' width='110px' height='80px' class='mr-2 restock'>";
                        echo "<div class='restock'id='" . $menu["name"] . "'>" . $menu["name"] . "";
                        echo "<div class='item_description'>" . $menu["description"] . "";
                        echo "</div></div><div class='restockstatus'>กำลังเติม</div></div>";
                        echo "<br>";
                    } else {
                        echo "<div class='menu d-flex align-items-center bg-body-tertiary rounded mr-1 item' data-toggle='modal' data-target='#menumodal' data-menu-id='" . $menu["ID"] . "'>";
                        echo "<img src='" . $menu["image"] . "' width='110px' height='80px' class='mr-2'>";
                        echo "<div id='" . $menu["name"] . "'>" . $menu["name"] . "";
                        echo "<div class='item_description'>" . $menu["description"] . "";
                        echo "</div></div></div>";
                        echo "<br>";
                    }
                }
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </section>

    <section class="bottom_section">
        <button class="btn btn-button" onclick="window.location.href='order.php'">
            รายการอาหาร
            <div class="btn-button-num ordercount">0</div>
        </button>
        <button class="btn btn-button" onclick="window.location.href='status_order.php'">
            สถานะอาหาร
            <div class="btn-button-num statuscount">0</div>
        </button>
        <?php
        // $table_id = $_SESSION["table_id"];
        $table_id = 'A-01';
        $sql = "SELECT COUNT(*) as total_rows FROM orders
        INNER JOIN tables ON orders.table_id = tables.id
        WHERE orders.table_id = '$table_id' AND orders.start_time > tables.start_time;";
         $result = $db->query($sql);

        if ($result) {
            $row = $result -> fetchArray(SQLITE3_ASSOC);
            $totalRows = $row['total_rows'];

            // แสดงผลใน HTML
            echo "<script>document.querySelector('.statuscount').innerHTML = $totalRows;</script>";
        } 
            
        ?>
    </section>

    <section class="modal_section">
        <!-- Modal Edit Menu -->
        <div class="modal" id="menumodal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Rest of your modal content -->
                        <form id="form1" action="" method="post">
                            <!-- Add a hidden input for storing the menu ID -->
                            <input type="hidden" id="MenuID" name="MenuID" value="">

                            <div class="form-group text-center">
                                <label id="Name-label" class="label-content"></label>
                            </div>
                            <div class="form-group text-center">
                                <img id="imagePreview-edit" src="" alt="Image Preview" class="mx-auto align-items-center imagePreview" style="border: 2px solid #FA5D2A; max-width: 100%; max-height: 100%;">
                            </div>
                            <div class="form-group text-center">
                                <label id="Description-label" class="label-content"></label>
                                <div class="input-group input-group-sm mb-3">
                                    <button class="btn btn-decrease" type="button" onclick="decrementValue()">-</button>
                                    <input type="number" class="form-control" aria-label="Quantity" id="quantity" value="1" min="0" max="10">
                                    <button class="btn btn-add" type="button" onclick="incrementValue()">+</button>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-cancel">ยกเลิก</button>
                                <button class="btn btn-accept" onclick="SaveOrderItem()">ยืนยัน</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let orderCount = 0;

        function updateOrderCount() {
            let orderItems = localStorage.getItem('orderItems');
            if (orderItems) {
                orderItems = JSON.parse(orderItems);
                orderCount = orderItems.length;
            } else {
                orderCount = 0;
            }

            document.querySelector('.ordercount').innerHTML = orderCount;
        }

        updateOrderCount();
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('search');
            searchInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();

                    // Get the entered value
                    var searchValue = searchInput.value.trim();

                    // Scroll to the div with an ID similar to the entered value
                    var targetElement = document.getElementById(searchValue);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    } else {
                        console.log('Element not found for search value: ' + searchValue);
                    }
                }
            });
            
            var menuItems = [{
                    buttonId: 'meat',
                    elementId: 'เนื้อ'
                },
                {
                    buttonId: 'chicken',
                    elementId: 'ไก่'
                },
                {
                    buttonId: 'pork',
                    elementId: 'หมู'
                },
                {
                    buttonId: 'seafood',
                    elementId: 'ทะเล'
                },
                {
                    buttonId: 'meatball',
                    elementId: 'ลูกชิ้น'
                },
                {
                    buttonId: 'other',
                    elementId: 'ของกินเล่น'
                },
                {
                    buttonId: 'desert',
                    elementId: 'ของหวาน'
                },
                {
                    buttonId: 'fruit',
                    elementId: 'ผลไม้'
                }
            ];

            // Loop through the menuItems array to create event listeners
            menuItems.forEach(function(menuItem) {
                var button = document.getElementById(menuItem.buttonId);
                var element = document.getElementById(menuItem.elementId);

                if (button && element) {
                    button.addEventListener('click', function() {
                        element.scrollIntoView({
                            behavior: 'smooth'
                        });
                    });
                }
            });

            // Attach event listener to all items
            var items = document.querySelectorAll('.item');
            items.forEach(function(item) {
                item.addEventListener('click', function() {
                    // Get the menu ID from the data attribute
                    var menuId = item.getAttribute('data-menu-id');

                    var menuDetails = <?php echo json_encode($menuDetails); ?>;

                    // Populate the labels with the selected menu information
                    document.getElementById('MenuID').value = menuId;
                    document.getElementById('Name-label').innerText = menuDetails[menuId]['name'];
                    document.getElementById('Description-label').innerText = menuDetails[menuId]['description'];

                    // Update the image preview
                    var imagePreview = document.getElementById('imagePreview-edit');
                    if (menuDetails[menuId]['image'].trim() !== '') {
                        imagePreview.src = menuDetails[menuId]['image'];
                        imagePreview.style.display = 'block';
                    } else {
                        imagePreview.src = '';
                        imagePreview.style.display = 'none';
                    }

                    // Show the modal
                    var editModal = new bootstrap.Modal(document.getElementById('menumodal'));
                    editModal.show();

                });
            });

        });

        function incrementValue() {
            var input = document.getElementById('quantity');
            var value = parseInt(input.value, 10);
            if (value < 10) {
                input.value = value + 1;
            }
        }

        function decrementValue() {
            var input = document.getElementById('quantity');
            var value = parseInt(input.value, 10);
            if (value > 0) {
                input.value = value - 1;
            }
        }

        function SaveOrderItem() {
            let menuID = document.forms.form1.MenuID.value;
            let quantity = parseInt(document.forms.form1.quantity.value);

            if (isNaN(quantity) || quantity <= 0) {
                alert('กรุณากรอกจำนวนให้ถูกต้อง');
                return;
            }

            let existingOrderItems = localStorage.getItem('orderItems') || '[]';

            existingOrderItems = JSON.parse(existingOrderItems);

            let existingItem = existingOrderItems.find(item => item.menuID === menuID);

            if (existingItem) {
                existingItem.quantity += quantity;
            } else {
                existingOrderItems.push({
                    menuID: menuID,
                    quantity: quantity
                });
            }

            localStorage.setItem('orderItems', JSON.stringify(existingOrderItems));
        }
    </script>
    <?php
    // close connection
    $db->close();
    ?>
</body>

</html>