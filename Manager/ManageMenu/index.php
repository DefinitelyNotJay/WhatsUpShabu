<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="http://10.0.15.21/lab/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://10.0.15.21/lab/bootstrap/js/bootstrap.min.js"></script>
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
        .menu-bar {
            height: 5rem;
            padding: 10px;
            cursor: pointer;
            border-radius: 1cap;
        }
        .menu-bar:hover {
            background-color: #bba83b79; /* Change background color on hover */
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
            width: 12rem;
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
            width: 31.5%;
            height: 125px;
            margin-left: 20px;
            margin-top: 20px;
            border-radius: 1cap;
            color: #000000;
            background-color: #EEE8C8;
        }
        .menu-option {
            width: 7rem;
            height: 2.5rem;
            cursor: pointer;
            margin-top: 20px;
            margin-left: 15px;
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
                    <div class="menu-bar d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bar-chart-3 mr-2"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
                        <h5 class="fw-bold">สถิติ</h5>
                    </div>
                    <div class="menu-bar d-flex align-items-center selectbar">
                        <svg width="40" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                            <path d="M31.2176 6.66699H6.83668C5.15353 6.66699 3.78906 8.15938 3.78906 10.0003V30.0003C3.78906 31.8413 5.15353 33.3337 6.83668 33.3337H31.2176C32.9008 33.3337 34.2653 31.8413 34.2653 30.0003V10.0003C34.2653 8.15938 32.9008 6.66699 31.2176 6.66699Z" stroke="#6A311D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.9805 6.66699V13.3337" stroke="#6A311D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3.78906 13.333H34.2653" stroke="#6A311D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.88477 6.66699V13.3337" stroke="#6A311D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h5 class="fw-bold">จัดการเมนูอาหาร</h5>
                    </div>  
                    <div class="menu-bar d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ticket-plus mr-2"><path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M9 12h6"/><path d="M12 9v6"/></svg>
                        <h5 class="fw-bold">จัดการโปรโมชั่น</h5>
                    </div>
                    <div class="menu-bar d-flex align-items-center log-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                        <h5 class="fw-bold">ออกจากระบบ</h5>
                    </div>
                </div>
            </div>

            <!-- Main content area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
                <!-- Option Bar -->
                <div class="custom-div1 d-flex">
                    <button class="option-bar d-flex align-items-center shadow p-3 mb-5 bg-body-tertiary rounded btn" data-bs-toggle="modal" data-bs-target="#addMenuModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-circle mr-2"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                        <h5 class="fw-bold">เพิ่มเมนู</h5>
                    </button>
                    <div class="role d-flex align-items-center ms-auto me-3">
                        <svg width="24" height="24" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-1">
                            <path d="M20.0006 36.6663C29.2054 36.6663 36.6673 29.2044 36.6673 19.9997C36.6673 10.7949 29.2054 3.33301 20.0006 3.33301C10.7959 3.33301 3.33398 10.7949 3.33398 19.9997C3.33398 29.2044 10.7959 36.6663 20.0006 36.6663Z" fill="#F6851F" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M30 33.333C30 30.6808 28.9464 28.1373 27.0711 26.2619C25.1957 24.3866 22.6522 23.333 20 23.333C17.3478 23.333 14.8043 24.3866 12.9289 26.2619C11.0536 28.1373 10 30.6808 10 33.333" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20.0007 23.3333C23.6826 23.3333 26.6673 20.3486 26.6673 16.6667C26.6673 12.9848 23.6826 10 20.0007 10C16.3188 10 13.334 12.9848 13.334 16.6667C13.334 20.3486 16.3188 23.3333 20.0007 23.3333Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>                            
                        <h6 class="fw-bold">ผู้จัดการ</h6>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_136_173)"><path d="M8.75 12.5L15 18.75L21.25 12.5H8.75Z" fill="black"/></g>
                            <defs><clipPath id="clip0_136_173"><rect width="30" height="30" fill="white"/></clipPath></defs>
                        </svg>                            
                    </div>
                </div>
                <!-- Content -->
                <div class="custom-div2 shadow p-3 mb-5 bg-body-tertiary rounded overflow-auto">
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
                                'image' => $row['image'],
                                'description' => $row['description'],
                                'type' => $row['type']
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
                            echo "<h2>$type</h2>";
                            echo "<div class='container-menu d-flex flex-wrap'>";
                            foreach ($menus as $menu) {
                                echo "<div class='menu d-flex align-items-center shadow bg-body-tertiary rounded'>";
                                echo "<img src='" . $menu["image"] ."' width='35%' height='100%' class='mr-2 rounded'>";
                                echo "<div><h5 class='fw-bold'>" . $menu["name"] . "</h5>";
                                echo "<div class='menu-edit d-flex'>";
                                echo "<div class='menu-option d-flex align-items-center shadow bg-body-tertiary rounded mr-1 button-edit' data-toggle='modal' data-target='#editMenuModal' data-menu-id='" . $menu["ID"] . "'>"; 
                                echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-settings-2 mr-1'><path d='M20 7h-9'/><path d='M14 17H5'/><circle cx='17' cy='17' r='3'/><circle cx='7' cy='7' r='3'/></svg>";
                                echo "<h6 class='fw-bold mt-2'>แก้ไข</h6></div>";
                                echo '<div class="menu-option d-flex align-items-center shadow bg-body-tertiary rounded button-delete">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2 mr-1"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>';
                                echo "<h6 class='fw-bold mt-2'>ลบ</h6></div>";
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
                            <div class="menu d-flex align-items-center shadow bg-body-tertiary rounded">
                                <img src="./image/เสื้อร้องไห้.jpg" width="35%" height="100%" class="mr-2 rounded">
                                <div>
                                    <h5 class="fw-bold">เสื้อร้องไห้</h5>
                                    <div class="menu-edit d-flex">
                                        <button class="menu-option d-flex align-items-center shadow bg-body-tertiary rounded mr-1 button-edit btn" data-toggle="modal" data-target="#editMenuModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings-2 mr-1"><path d="M20 7h-9"/><path d="M14 17H5"/><circle cx="17" cy="17" r="3"/><circle cx="7" cy="7" r="3"/></svg>
                                            <h6 class="fw-bold">แก้ไข</h6>
                                        </button>
                                        <button class="menu-option d-flex align-items-center shadow bg-body-tertiary rounded button-delete btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2 mr-1"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                            <h6 class="fw-bold">ลบ</h6>
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
    <!-- Modal Add Menu -->
    <div class="modal" id="addMenuModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">เพิ่มเมนู</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Add your form or content for adding a menu here -->
                    <form id="form1" action="" method="post">
                        <p>
                            <label for="Name" class="form-label">ชื่อ :</label>
                            <input type="text" class="form-control required" id="Name" name="Name" value="" />
                        </p>
                        <p>
                            <label for="Type" class="form-label">ประเภท : </label>
                            <select id="Type" name="Type" class="form-control">
                                <option value="" selected>เลือกประเภท</option>
                                <option value="เนื้อ">เนื้อ</option>
                                <option value="หมู">หมู</option>
                                <option value="ไก่">ไก่</option>
                                <!-- Add more options as needed -->
                            </select>
                        </p>
                        <p>
                            <label for="Image" class="form-label">รูปภาพ (URL) : </label>
                            <input type="text" class="form-control" id="Image" name="Image" value="" />
                            <div class="text-center">
                                <img id="imagePreview" src="" alt="Image Preview" class="mx-auto align-items-center imagePreview">
                            </div>
                        </p>
                        <p>
                            <label for="Description" class="form-label">คำอธิบาย : </label>
                            <textarea type="text" class="form-control" id="Description" name="Description" rows="3" value=""></textarea>
                        </p>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="add-menu-option d-flex align-items-center shadow bg-body-tertiary rounded btn-cancle" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban mr-1"><circle cx="12" cy="12" r="10"/><path d="m4.9 4.9 14.2 14.2"/></svg>
                            <h6 class="fw-bold mt-2">ยกเลิก</h6>
                        </button>
                        <button type="submit" id="add-menu" name="add-menu" class="add-menu-option d-flex align-items-center shadow bg-body-tertiary rounded btn-confirm">
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
                    <h3 class="modal-title">แก้ไขเมนู</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Add your form or content for adding a menu here -->
                    <form id="form1" action="" method="post">

                    <!-- Add a hidden input for storing the menu ID -->
                    <input type="hidden" id="MenuID" name="MenuID" value="">

                        <p>
                            <label for="Name-edit" class="form-label">ชื่อ :</label>
                            <input type="text" class="form-control required" id="Name-edit" name="Name" value="" />
                        </p>
                        <p>
                            <label for="Type-edit" class="form-label">ประเภท : </label>
                            <select id="Type-edit" name="Type" class="form-control">
                                <option value="" selected>เลือกประเภท</option>
                                <option value="เนื้อ">เนื้อ</option>
                                <option value="หมู">หมู</option>
                                <option value="ไก่">ไก่</option>
                                <!-- Add more options as needed -->
                            </select>
                        </p>
                        <p>
                            <label for="Image-edit" class="form-label">รูปภาพ (URL) : </label>
                            <input type="text" class="form-control" id="Image-edit" name="Image" value="" />
                            <div class="text-center">
                                <img id="imagePreview-edit" src="" alt="Image Preview" class="mx-auto align-items-center imagePreview">
                            </div>
                        </p>
                        <p>
                            <label for="Description-edit" class="form-label">คำอธิบาย : </label>
                            <textarea type="text" class="form-control" id="Description-edit" name="Description" rows="3" value=""></textarea>
                        </p>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="add-menu-option d-flex align-items-center shadow bg-body-tertiary rounded btn-cancle" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban mr-1"><circle cx="12" cy="12" r="10"/><path d="m4.9 4.9 14.2 14.2"/></svg>
                            <h6 class="fw-bold mt-2">ยกเลิก</h6>
                        </button>
                        <button type="submit" id="edit-menu" name="edit-menu" class="add-menu-option d-flex align-items-center shadow bg-body-tertiary rounded btn-confirm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle mr-1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                            <h6 class="fw-bold mt-2">ยืนยัน</h6>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        //Add Image Preview
        document.addEventListener('DOMContentLoaded', function() {

            // Attach event listener to the Image input
            document.getElementById('Image').addEventListener('input', function(event) {
                // Get the entered URL
                var imageUrl = event.target.value;

                // Get the image preview element
                var imagePreview = document.getElementById('imagePreview');

                // Update the image preview
                if (imageUrl.trim() !== '') {
                    imagePreview.src = imageUrl;
                    imagePreview.style.display = 'block';
                } else {
                    imagePreview.src = '';
                    imagePreview.style.display = 'none';
                }
            });

            // Attach event listener to all edit buttons
            var editButtons = document.querySelectorAll('.button-edit');
            editButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    // Get the menu ID from the data attribute
                    var menuId = button.getAttribute('data-menu-id');

                    // Fetch menu details using AJAX or use the data already available on the page
                    // For simplicity, assuming the menu details are already available in PHP
                    var menuDetails = <?php echo json_encode($menuDetails); ?>;

                    // Populate the modal content with the selected menu information
                    document.getElementById('MenuID').value = menuId;
                    document.getElementById('Image-edit').value = menuDetails[menuId]['image'];
                    document.getElementById('Name-edit').value = menuDetails[menuId]['name'];
                    document.getElementById('Description-edit').value = menuDetails[menuId]['description'];
                    document.getElementById('Type-edit').value = menuDetails[menuId]['type'];

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
                    var editModal = new bootstrap.Modal(document.getElementById('editMenuModal'));
                    editModal.show();
                });
            });
        });
    </script>

    <?php
    //Add Menu
    if(isset($_POST['add-menu'])){
        $name= $_POST['Name'];
        $type = $_POST['Type'];
        $image = $_POST['Image'];
        $description = $_POST['Description'];

        $sql = "INSERT INTO menu (name, image, description, status, type) VALUES ('$name', '$image', '$description', 'instock', '$type');";
        if (mysqli_query($conn, $sql)) {
            echo "Record added successfully";
        } else {
            echo "Error added record: " . mysqli_error($conn);
        }
    }
    if(isset($_POST['edit-menu'])){
        $menuId= $_POST['MenuID'];
        $name= $_POST['Name'];
        $type = $_POST['Type'];
        $image = $_POST['Image'];
        $description = $_POST['Description'];

        $sql = "UPDATE menu SET name = '$name', type = '$type', image = '$image', description = '$description' WHERE ID = $menuId";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
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