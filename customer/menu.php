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
    $_SESSION["table_id"] = $_GET["table_id"];

    // if (!isset($_SERVER['HTTP_REFERER'])) {
    //     header("Location: https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExdW04cjJzcDIzeXplM3A1eHRkOGR2dmhrM3lkcTV5YWZtaDBneXMyMyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/t0virGpgSlp4mkfiXq/giphy.gif");
    //     exit();
    // }
    ?>
    
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "WhatsUpShabu";
    $conn = mysqli_connect($servername, $username, $password, $dbname);


    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo ""; // ไม่จำเป็นต้องใส่ echo แบบนี้
    ?>

    <header class="header">
        <a href="menu.php">
            <img class="logo" src="img/Whatsup.png" alt="logo" width="50%" height="50%">
        </a>
    </header>

    <section class="search_section" id="search_section">
        <input type="text" id="search" class="form-control" placeholder="ค้นหาเมนู">
    </section>

    <section class="select_section" id="select_section">
        <p>เมนู</p>
        <div class="btn-container">
            <button class="btn btn_select">เนื้อ</button>
            <button class="btn btn_select">หมู</button>
            <button class="btn btn_select">ไก่</button>
        </div>
    </section>

    <section class="menu_section" id="menu_section">
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

            foreach ($menusByType as $type => $menus) {
                echo "<p>$type</p>";
                echo "<div class='container-menu d-flex flex-wrap'>";
                foreach ($menus as $menu) {
                    echo "<div class='menu d-flex align-items-center bg-body-tertiary rounded mr-1 item' data-toggle='modal' data-target='#addordermodal' data-menu-id='" . $menu["ID"] . "'>";
                    echo "<img src='" . $menu["image"] . "' width='35%' height='100%' class='mr-2'>";
                    echo "<div>" . $menu["name"] . "";
                    echo "<div class='item_description'>" . $menu["description"] . "";
                    echo "</div></div></div>";
                    echo "<br>";
                }
                echo "</div></div>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </section>

    <section class="bottom_section">
        <button class="btn btn-button" onclick="window.location.href='order.php'">
            <label>รายการอาหาร</label>
            <div class="btn-button-num">0</div>
        </button>
        <button class="btn btn-button" onclick="window.location.href='status_order.php'">
            <label>สถานะอาหาร</label>
            <div class="btn-button-num">0</div>
        </button>
    </section>

    <section class="modal_section">
        <!-- Modal Edit Menu -->
        <div class="modal" id="addordermodal">
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
                                <img id="imagePreview-edit" src="" alt="Image Preview"
                                    class="mx-auto align-items-center imagePreview"
                                    style="border: 2px solid #FA5D2A; max-width: 100%; max-height: 100%;">
                            </div>
                            <div class="form-group text-center">
                                <label id="Description-label" class="label-content"></label>
                                <div class="input-group input-group-sm mb-3">
                                    <button class="btn btn-add" type="button" onclick="incrementValue()">+</button>
                                    <input type="number" class="form-control" aria-label="Quantity" id="quantity"
                                        value="0" min="0" max="10">
                                    <button class="btn btn-decrease" type="button" onclick="decrementValue()">-</button>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-accept">ยืนยัน</button>
                                <button class="btn btn-cancel">ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Attach event listener to all items
            var items = document.querySelectorAll('.item');
            items.forEach(function (item) {
                item.addEventListener('click', function () {
                    // Get the menu ID from the data attribute
                    var menuId = item.getAttribute('data-menu-id');

                    // Fetch menu details using AJAX or use the data already available on the page
                    // For simplicity, assuming the menu details are already available in PHP
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
                    var editModal = new bootstrap.Modal(document.getElementById('addordermodal'));
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
    </script>
    <?php
    // close connection
    mysqli_close($conn);
    ?>
</body>

</html>