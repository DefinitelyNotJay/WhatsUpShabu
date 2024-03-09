<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans Thai';
            font-size: 25px;
        }
        .sidebar {
            height: 100vh;
            background-color: #EEE8C8;
            padding-top: 10px;
        }
        .unstyled-link {
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }
        .unstyled-link:hover {
            color: inherit;
        }
        .menu-bar {
            height: 5rem;
            padding: 10px;
            cursor: pointer;
            border-radius: 1cap;
        }
        .menu-bar:hover {
            background-color: #bba83b79; /* Change background color on hover */
            color: #6A311D;
        }
        .menu-bar.log-out {
            margin-top: 470px;
        }
        .selectbar {
            background-color: #FEFCF4;
            color: #6A311D;
        }
        .mr-2 {
            margin-right:  20px;
        }
        .mr-1 {
            margin-right:  10px;
        }
        .main-content {
            padding: 0;
            background-color: rgb(202, 202, 202);
        }
        .custom-div1 {
            height: 10vh;
            width: 100%;
            background-color: #ffffff; /* Add background color for the custom div */
        }
        .option-bar {
            width: 16rem;
            height: 4.5rem;
            cursor: pointer;
            padding: 20px;
            margin: 10px;
            margin-left: 20px;
            border-radius: 1cap;
            color: #ffffff;
            background-color: #976f4ab6;
        }
        .option-bar:hover {
            background-color: #976f4a; /* Change background color on hover */
        }
        .custom-div2 {
            height: 82dvh;
            width: 97%;
            background-color: #ffffff; /* Add background color for the custom div */
            margin: 1.5%;
            border-radius: 1cap;
        }
        .menu {
            width: 23.5%;
            height: 125px;
            margin-left: 20px;
            margin-top: 20px;
            border-radius: 1cap;
            color: #000000;
            background-color: #EEE8C8;
        }
        .instock {
            background-color: rgba(71, 193, 105, 0.7);
        }
        .instock:hover {
            background-color: rgba(71, 193, 105, 1);
        }
        .restocking {
            background-color: rgba(232, 156, 68, 0.7);
        }
        .restocking:hover {
            background-color: rgba(232, 156, 68, 1);
        }
        .outofstock{
            background-color: rgba(214, 82, 74, 0.7);
        }
        .outofstock:hover {
            background-color: rgba(214, 82, 74, 1);
        }
        .menu-option {
            width: 7rem;
            height: 2.5rem;
            cursor: pointer;
            margin-top: 20px;
            margin-left: 30px;
            padding: 10px;
            border-radius: 1cap;
        }
        .menu-option.button-edit {
            background-color: #FFF59B;
        }
        .menu-option.button-edit:hover {
            background-color: #f8e852;
        }
        .menu-option.button-delete {
            background-color: #F98E71;
        }
        .menu-option.button-delete:hover {
            background-color: #f56a43;
        }
        .modal-header{
            background-color: #EEE8C8;
        }
        .imagePreview {
            display: none; 
            width: 50%; 
            height: 200px; 
            margin-top: 10px;
        }
        .add-menu-option {
            color: #ffffff;
            width: 7rem;
            height: 2.5rem;
            cursor: pointer;
            margin-top: 20px;
            margin-left: 15px;
            padding: 10px;
            border-radius: 1cap;
            border: #000000;
        }
        .btn-cancle {
            background-color: #fa5e2abe;
        }
        .btn-cancle:hover {
            background-color: #FA5D2A;
        }
        .btn-confirm {
            background-color: #009179c2;
        }
        .btn-confirm:hover {
            background-color: #009179;
        }
        input[type="radio"]:checked {
            background-color: rgba(71, 193, 105, 1);
        }
    </style>
</head>
<body>
    <!-- Connect Database -->
    <?php
        $servername = "localhost";
        $username = "root"; //ตามที่กำหนดให้
        $password = ""; //ตามที่กำหนดให้
        $dbname = "WhatsUpShabu";    //ตามที่กำหนดให้
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        echo "";
    ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky">
                    <!-- Loco -->
                    <img src="./image/icon.png" width="100%">
                    <!-- MenuBar -->
                    <a href="../ViewStatistics/index.php" class="unstyled-link">
                        <div class="menu-bar d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bar-chart-3 mr-2"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
                            <h5 class="fw-bold mt-2">สถิติ</h5>
                        </div>
                    </a>
                    <a href="../ManageMenu/index.php" class="unstyled-link">
                        <div class="menu-bar d-flex align-items-center selectbar">
                            <svg width="40" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="3" class="mr-2"><path d="M31.2176 6.66699H6.83668C5.15353 6.66699 3.78906 8.15938 3.78906 10.0003V30.0003C3.78906 31.8413 5.15353 33.3337 6.83668 33.3337H31.2176C32.9008 33.3337 34.2653 31.8413 34.2653 30.0003V10.0003C34.2653 8.15938 32.9008 6.66699 31.2176 6.66699Z" stroke-linecap="round" stroke-linejoin="round"/><path d="M15.9805 6.66699V13.3337"  stroke-linecap="round" stroke-linejoin="round"/><path d="M3.78906 13.333H34.2653"  stroke-linecap="round" stroke-linejoin="round"/><path d="M9.88477 6.66699V13.3337"  stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <h5 class="fw-bold mt-2">จัดการเมนูอาหาร</h5>
                        </div>
                    </a>
                    <a href="../ManagePromotion/index.php" class="unstyled-link">
                        <div class="menu-bar d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ticket-plus mr-2"><path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M9 12h6"/><path d="M12 9v6"/></svg>
                            <h5 class="fw-bold mt-2">จัดการโปรโมชั่น</h5>
                        </div>
                    </a>
                    <div class="menu-bar d-flex align-items-center log-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                        <h5 class="fw-bold mt-2">ออกจากระบบ</h5>
                    </div>
                </div>
            </div>

            <!-- Main content area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
                <!-- Option Bar -->
                <div class="custom-div1 d-flex">
                    <button class="option-bar d-flex align-items-center shadow p-3 mb-5  rounded btn" data-bs-toggle="modal" data-bs-target="#statusMenuModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-ccw mr-1"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
                    <h5 class="fw-bold mt-2">คืนค่าสถานะทั้งหมด</h5>
                    </button>
                    <div class="role d-flex align-items-center ms-auto me-3">
                        <svg width="24" height="24" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-1">
                            <path d="M20.0006 36.6663C29.2054 36.6663 36.6673 29.2044 36.6673 19.9997C36.6673 10.7949 29.2054 3.33301 20.0006 3.33301C10.7959 3.33301 3.33398 10.7949 3.33398 19.9997C3.33398 29.2044 10.7959 36.6663 20.0006 36.6663Z" fill="#F6851F" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M30 33.333C30 30.6808 28.9464 28.1373 27.0711 26.2619C25.1957 24.3866 22.6522 23.333 20 23.333C17.3478 23.333 14.8043 24.3866 12.9289 26.2619C11.0536 28.1373 10 30.6808 10 33.333" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20.0007 23.3333C23.6826 23.3333 26.6673 20.3486 26.6673 16.6667C26.6673 12.9848 23.6826 10 20.0007 10C16.3188 10 13.334 12.9848 13.334 16.6667C13.334 20.3486 16.3188 23.3333 20.0007 23.3333Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h6 class="fw-bold mt-2">ผู้จัดการ</h6>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_136_173)"><path d="M8.75 12.5L15 18.75L21.25 12.5H8.75Z" fill="black"/></g>
                            <defs><clipPath id="clip0_136_173"><rect width="30" height="30" fill="white"/></clipPath></defs>
                        </svg>                            
                    </div>
                </div>
                <!-- Content -->
                <div class="custom-div2 shadow p-3 mb-5  rounded overflow-auto">
                <?php
                    // --- SQL SELECT statement  
                    $sql = "SELECT * FROM menu;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // Initialize an associative array to organize menus by type
                        $menusByType = array();
                        $menuDetails = array();

                        // Organize menus by type
                        while($row = mysqli_fetch_assoc($result)) {
                            //detail
                            $menuDetails[$row['ID']] = array(
                                'name' => $row['name'],
                                'status' => $row['status']
                            );
                            //type
                            $type = $row["type"];

                            if (!isset($menusByType[$type])) {
                                $menusByType[$type] = array();
                            }

                            $menusByType[$type][] = $row;
                        }

                        // Output menus by type
                        foreach ($menusByType as $type => $menus) {
                            echo "<div class='container-fuild category mb-4'>";
                            echo "<h4 class='fw-bold'>$type</h4>";
                            echo "<div class='container-menu d-flex flex-wrap'>";
                            foreach ($menus as $menu) {
                                echo "<div class='menu d-flex align-items-center shadow  rounded ". $menu['status'] ."'>";
                                echo "<img src='" . $menu["image"] ."' width='35%' height='100%' class='mr-2 rounded'>";
                                echo "<div><h5 class='fw-bold'>" . $menu["name"] . "</h5>";
                                echo "<div class='menu-edit d-flex'>";
                                echo "<div class='menu-option d-flex align-items-center shadow  rounded mr-1 button-edit' data-toggle='modal' data-target='#editMenuModal' data-menu-id='" . $menu["ID"] . "'>"; 
                                echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-settings-2 mr-1'><path d='M20 7h-9'/><path d='M14 17H5'/><circle cx='17' cy='17' r='3'/><circle cx='7' cy='7' r='3'/></svg>";
                                echo "<h6 class='fw-bold mt-2'>แก้ไข</h6></div>";
                                echo "</div></div></div>";
                            }
                            echo "</div></div>";
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
                    <!-- 1 Category -->
                    <div class="container-fuild category mb-4">
                        <h2>เนื้อ</h2>
                        <div class="container-menu d-flex flex-wrap">
                            <!-- 1 menu -->
                            <div class="menu d-flex align-items-center shadow  rounded">
                                <img src="./image/เสื้อร้องไห้.jpg" width="35%" height="100%" class="mr-2 rounded">
                                <div>
                                    <h5 class="fw-bold">เสื้อร้องไห้</h5>
                                    <div class="menu-edit d-flex">
                                        <button class="menu-option d-flex align-items-center shadow  rounded mr-1 button-edit btn" data-toggle="modal" data-target="#editMenuModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings-2 mr-1"><path d="M20 7h-9"/><path d="M14 17H5"/><circle cx="17" cy="17" r="3"/><circle cx="7" cy="7" r="3"/></svg>
                                            <h6 class="fw-bold mt-2">แก้ไข</h6>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Modal Change Status Menu -->
    <div class="modal" id="statusMenuModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Add your form or content for adding a menu here -->
                    <form id="form1" action="" method="post" class="text-center">

                    <h>คืนค่าสถานะทั้งหมดของเมนู</h>

                </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="add-menu-option d-flex align-items-center shadow  rounded btn-cancle" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban mr-1"><circle cx="12" cy="12" r="10"/><path d="m4.9 4.9 14.2 14.2"/></svg>
                            <h6 class="fw-bold mt-2">ยกเลิก</h6>
                        </button>
                        <button type="submit" id="default-status" name="default-status" class="add-menu-option d-flex align-items-center shadow  rounded btn-confirm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle mr-1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                            <h6 class="fw-bold mt-2">ยืนยัน</h6>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Edit Menu -->
    <div class="modal" id="editMenuModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 id="Name-menu" class="modal-title"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Add your form or content for adding a menu here -->
                    <form id="form2" action="" method="post">

                        <!-- Add a hidden input for storing the menu ID -->
                        <input type="hidden" id="MenuID" name="MenuID" value="">
            
                        <label class="form-label">สถานะ :</label>
                        <br>
                        <div class="form-check form-check-inline ms-5">
                            <input class="form-check-input" type="radio" id="statusOutofstock" name="showStatus" value="outofstock">
                            <label class="form-check-label" for="statusInProgress">หมด</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline ms-5">
                            <input class="form-check-input" type="radio" id="statusRestocking" name="showStatus" value="restocking">
                            <label class="form-check-label" for="statusCompleted">กำลังเติม</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline ms-5">
                            <input class="form-check-input" type="radio" id="statusInstock" name="showStatus" value="instock">
                            <label class="form-check-label" for="statusPending">มี</label>
                        </div>
 
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="add-menu-option d-flex align-items-center shadow  rounded btn-cancle" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban mr-1"><circle cx="12" cy="12" r="10"/><path d="m4.9 4.9 14.2 14.2"/></svg>
                            <h6 class="fw-bold mt-2">ยกเลิก</h6>
                        </button>
                        <button type="submit" id="edit-status" name="edit-status" class="add-menu-option d-flex align-items-center shadow  rounded btn-confirm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle mr-1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                            <h6 class="fw-bold mt-2">ยืนยัน</h6>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        
        document.addEventListener('DOMContentLoaded', function() {

            // Change Status Menu
            var editButtons = document.querySelectorAll('.button-edit');
            editButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    // Get the menu ID from the data attribute
                    var menuId = button.getAttribute('data-menu-id');

                    var menuDetails = <?php echo json_encode($menuDetails); ?>;
                    var statusMenu = menuDetails[menuId]['status'];
                    var radioButtons = document.getElementsByName('showStatus');

                    // Populate the modal content with the selected menu information
                    document.getElementById('MenuID').value = menuId;
                    document.getElementById('Name-menu').innerHTML =  menuDetails[menuId]['name'];
                    for (var i = 0; i < radioButtons.length; i++) {
                        if (radioButtons[i].value === statusMenu) {
                            radioButtons[i].checked = true;
                        }
                    }

                    // Show the modal
                    var editMenu = new bootstrap.Modal(document.getElementById('editMenuModal'));
                    editMenu.show();
                });
            });

        });
    </script>

    <?php
    //Default Status
    if(isset($_POST['default-status'])){

        $sql = "UPDATE menu SET status = 'instock'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "Error added record: " . mysqli_error($conn);
        }
    }
    //Edit Status
    if(isset($_POST['edit-status'])){
        $menuId= $_POST['MenuID'];
        $stausMenu = $_POST['showStatus'];

        $sql = "UPDATE menu SET status = '$stausMenu' WHERE ID = $menuId";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "Error added record: " . mysqli_error($conn);
        }
    }
    ?>

    <?php
        // close connection
        mysqli_close($conn);
    ?>
</body>
</html>