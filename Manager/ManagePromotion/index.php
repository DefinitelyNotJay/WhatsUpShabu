<!DOCStatus html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Promotion</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap"
            rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            * {
                font-family: "Noto Sans Thai", sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .hp-10 {
                height: 10%;
            }

            .hp-90 {
                height: 90%;
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
                background-color: #bba83b79;
                /* Change background color on hover */
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
                margin-right: 20px;
            }

            .mr-1 {
                margin-right: 10px;
            }

            .main-content {
                padding: 0;
                background-color: rgb(202, 202, 202);
            }

            .custom-div1 {
                height: 10vh;
                width: 100%;
                background-color: #ffffff;
                /* Add background color for the custom div */
            }


            .menu {
                width: 31%;
                height: 120px;
                border-radius: 1cap;
                color: #ffffff;
                background-color: #009179d8;
            }

            .menu:hover {
                background-color: #009179;
            }

            .menu.not {
                background-color: #fa5e2ad0;
            }

            .menu.not:hover {
                background-color: #fa5e2a;
            }

            .menu-option {
                width: 7rem;
                height: 2.5rem;
                cursor: pointer;
                border-radius: 1cap;
                color: #000000;
            }

            .menu-option.button-edit {
                background-color: #F1DC6B;
            }

            .menu-option.button-edit:hover {
                background-color: #ecd138;
            }

            .menu-option.button-delete {
                background-color: #F07777;
            }

            .menu-option.button-delete:hover {
                background-color: #ec4949;
            }

            .modal-header {
                background-color: #EEE8C8;
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
        <div class="flex w-screen h-screen">

            <!-- Sidebar -->
            <div class="flex flex-col w-2/12 h-full bg-[#EEE8C8] px-2 py-2 justify-between items-center">
                <div class="flex flex-col gap-2">
                    <!-- Loco -->
                    <img src="./image/icon.png" width="100%">
                    <!-- MenuBar -->
                    <a href="../ViewStatistics/index.php" class="unstyled-link">
                        <div
                            class="flex items-center cursor-pointer px-4 py-4 hover:bg-[#6A311D] hover:text-white rounded-lg duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-bar-chart-3 mr-2">
                                <path d="M3 3v18h18" />
                                <path d="M18 17V9" />
                                <path d="M13 17V5" />
                                <path d="M8 17v-3" />
                            </svg>
                            <p class="font-semibold">สถิติ</p>
                        </div>
                    </a>
                    <a href="../ManageMenu/index.php" class="unstyled-link">
                        <div
                            class="flex items-center cursor-pointer px-4 py-4 hover:bg-[#6A311D] hover:text-white rounded-lg font-semibold duration-500">
                            <svg width="24" height="24" viewBox="0 0 38 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="3" class="mr-2">
                                <path
                                    d="M31.2176 6.66699H6.83668C5.15353 6.66699 3.78906 8.15938 3.78906 10.0003V30.0003C3.78906 31.8413 5.15353 33.3337 6.83668 33.3337H31.2176C32.9008 33.3337 34.2653 31.8413 34.2653 30.0003V10.0003C34.2653 8.15938 32.9008 6.66699 31.2176 6.66699Z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M15.9805 6.66699V13.3337" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3.78906 13.333H34.2653" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.88477 6.66699V13.3337" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="font-semibold">จัดการเมนูอาหาร</p>
                        </div>
                    </a>
                    <a href="../ManagePromotion/index.php" class="unstyled-link">
                        <div
                            class="flex items-center cursor-pointer px-4 py-4 bg-[#FEFCF4] text-[#6A311D] rounded-lg duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-ticket-plus mr-2">
                                <path
                                    d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z" />
                                <path d="M9 12h6" />
                                <path d="M12 9v6" />
                            </svg>
                            <h5 class="font-semibold">จัดการโปรโมชั่น</h5>
                        </div>
                    </a>
                </div>
                <div class="w-full flex justify-center">
                    <form action="ManageTable.php" method="post" class="w-full">
                        <button type="submit" name="logout"
                            class="w-full logout bg-[#EEE8C8] hover:bg-[#f3efd9] duration-500">
                            <p class="text-normal flex gap-2  px-4 py-6 font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    <polyline points="16 17 21 12 16 7" />
                                    <line x1="21" x2="9" y1="12" y2="12" />
                                </svg>
                                ออกจากระบบ
                            </p>
                        </button>
                    </form>
                </div>

            </div>

            <!-- Main content area -->
            <main class="flex flex-col w-10/12 h-full">
                <!-- Option Bar -->
                <div class="flex hp-10 px-3 py-4 bg-white justify-between items-center">
                    <button
                        class="text-white bg-[#976f4ab6] hover:bg-[#976f4a] flex items-center shadow-sm px-2.5 py-2.5  rounded-lg cursor-pointer font-bold text-xl duration-500"
                        data-bs-toggle="modal" data-bs-target="#addProModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-plus-circle mr-2">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M8 12h8" />
                            <path d="M12 8v8" />
                        </svg>
                        เพิ่มโปรโมชั่น
                    </button>
                    <div class="flex items-center font-semibold">
                        <svg width="24" height="24" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="mr-1">
                            <path
                                d="M20.0006 36.6663C29.2054 36.6663 36.6673 29.2044 36.6673 19.9997C36.6673 10.7949 29.2054 3.33301 20.0006 3.33301C10.7959 3.33301 3.33398 10.7949 3.33398 19.9997C3.33398 29.2044 10.7959 36.6663 20.0006 36.6663Z"
                                fill="#F6851F" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M30 33.333C30 30.6808 28.9464 28.1373 27.0711 26.2619C25.1957 24.3866 22.6522 23.333 20 23.333C17.3478 23.333 14.8043 24.3866 12.9289 26.2619C11.0536 28.1373 10 30.6808 10 33.333"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M20.0007 23.3333C23.6826 23.3333 26.6673 20.3486 26.6673 16.6667C26.6673 12.9848 23.6826 10 20.0007 10C16.3188 10 13.334 12.9848 13.334 16.6667C13.334 20.3486 16.3188 23.3333 20.0007 23.3333Z"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        ผู้จัดการ
                    </div>
                </div>
                <!-- Content -->
                <!-- custom-div2 -->
                <div class="flex hp-90 w-full bg-gray-200 px-3 py-3">
                    <div
                        class="flex flex-col w-full bg-white shadow-sm  rounded-xl overflow-y-auto overflow-x-hidden pl-4 py-3 pr-1">
                        <?php
                        // --- SQL SELECT statement  
                        $sql = "SELECT * FROM promotion ORDER BY CASE WHEN status = 'active' THEN 0 ELSE 1 END, end_date;";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // Initialize an associative array to organize promotions by Status
                            $promotionByStatus = array();
                            $promotionDetails = array();

                            // Organize promotions by Status
                            while ($row = mysqli_fetch_assoc($result)) {

                                //detail
                                $promotionDetails[$row['ID']] = array(
                                    'name' => $row['name'],
                                    'discount' => $row['discount'],
                                    'status' => $row['status'],
                                    'end_date' => $row['end_date']
                                );

                                // Update Status
                                $today = date('Y-m-d');
                                if ($row['end_date'] >= $today) {
                                    $row['status'] = 'active';
                                    $updateSql = "UPDATE promotion SET status = 'active' WHERE ID = " . $row['ID'];
                                    mysqli_query($conn, $updateSql);
                                } else {
                                    $row['status'] = 'inactive';
                                    $updateSql = "UPDATE promotion SET status = 'inactive' WHERE ID = " . $row['ID'];
                                    mysqli_query($conn, $updateSql);
                                }


                                //Status
                                $Status = $row["status"];

                                if (!isset($promotionByStatus[$Status])) {
                                    $promotionByStatus[$Status] = array();
                                }

                                $promotionByStatus[$Status][] = $row;
                            }

                            // Output promotions by Status
                            foreach ($promotionByStatus as $Status => $promotions) {
                                // catagoly
                                echo "<div class='flex flex-col mb-4 w-full'>";
                                $status_pro = ($Status == 'active') ? 'ใช้งาน' : 'ไม่ใช้งาน';
                                echo "<h1 class='font-bold text-xl'>$status_pro</h1>";
                                // promotion
                                echo "<div class='flex flex-wrap gap-4 w-full pr-1 pl-8 py-3'>";
                                foreach ($promotions as $promotion) {
                                    $inactive = ($Status == 'inactive') ? ' not' : '';
                                    echo '<div class="menu flex items-center px-3 py-3 shadow-sm rounded-lg duration-500' . $inactive . '">';
                                    echo '<div class="flex flex-col justify-between items-center h-full w-full">';
                                    echo '<h1 class="font-bold text-center text-lg">' . $promotion["name"] . '</h1>';
                                    echo '<div class="menu-edit flex justify-between w-9/12 px-2">';
                                    echo '<div class="duration-500 menu-option flex items-center justify-center px-3 py-2 shadow-sm rounded-lg button-edit data-toggle="modal" data-target="#editProModal" data-pro-id="' . $promotion["ID"] . '">';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings-2 mr-1"><path d="M20 7h-9"/><path d="M14 17H5"/><circle cx="17" cy="17" r="3"/><circle cx="7" cy="7" r="3"/></svg>
                                        <h6 class="font-semibold">แก้ไข</h6></div>';
                                    echo '<div class="duration-500 menu-option flex items-center justify-center px-3 py-2 shadow-sm rounded-lg button-delete data-toggle="modal" data-target="#deleteProModal" data-pro-id="' . $promotion["ID"] . '">';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2 mr-1"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                        <h6 class="font-semibold">ลบ</h6></div>';
                                    echo "</div></div></div>";
                                }
                                echo "</div></div>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </div>
                </div>
            </main>

        </div>


        <!-- Modal Add Promotion -->
        <div class="modal" id="addProModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title font-bold">เพิ่มโปรโมชั่น</h3>
                        <button type="button" class="btn-close font-bold flex items-center justify-center" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Add your form or content for adding a menu here -->
                        <form id="form1" action="" method="post" class="flex flex-col gap-3 h-full w-full">
                            <p>
                                <label for="Name" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control required" id="Name" name="Name" value=""
                                    required />
                            </p>
                            <p>
                                <label for="Discount" class="form-label">ส่วนลด (%)</label>
                                <input type="number" class="form-control required" id="Discount" name="Discount"
                                    value="" required />
                            </p>
                            <p>
                                <label for="Date" class="form-label">วันที่หมด</label>
                                <input type="date" class="form-control" id="Date" name="Date" required />
                            </p>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button"
                            class="add-menu-option flex items-center shadow-sm rounded-lg font-semibold gap-2 bg-[#fa5e2abe] hover:bg-[#fa5e2a] duration-500"
                            data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-ban mr-1">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m4.9 4.9 14.2 14.2" />
                            </svg>
                            ยกเลิก
                        </button>
                        <button type="submit" id="add-pro" name="add-pro"
                            class="add-menu-option flex items-center shadow-sm rounded-lg font-semibold gap-2 bg-[#009179c2] hover:bg-[#009179] duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-check-circle mr-1">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="m9 11 3 3L22 4" />
                            </svg>
                            ยืนยัน
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal Edit Promotion -->
        <div class="modal" id="editProModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title font-bold">แก้ไขโปรโมชั่น</h3>
                        <button type="button" class="btn-close font-bold flex items-center justify-center" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Add your form or content for adding a menu here -->
                        <form id="form1" action="" method="post" class="flex flex-col gap-3 h-full w-full">

                            <!-- Add a hidden input for storing the menu ID -->
                            <input type="hidden" id="ProID" name="ProID" value="">
                            <p>
                                <label for="Name-edit" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control required" id="Name-edit" name="Name" value=""
                                    required />
                            </p>
                            <p>
                                <label for="Discount-edit" class="form-label">ส่วนลด (%)</label>
                                <input type="number" class="form-control required" id="Discount-edit" name="Discount"
                                    value="" required />
                            </p>
                            <p>
                                <label for="Date-edit" class="form-label">วันที่หมด</label>
                                <input type="date" class="form-control" id="Date-edit" name="Date" required />
                            </p>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button"
                            class="add-menu-option flex items-center shadow-sm rounded-lg font-semibold gap-2 bg-[#fa5e2abe] hover:bg-[#fa5e2a] duration-500"
                            data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-ban mr-1">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m4.9 4.9 14.2 14.2" />
                            </svg>
                            ยกเลิก
                        </button>
                        <button type="submit" id="edit-pro" name="edit-pro"
                            class="add-menu-option flex items-center shadow-sm rounded-lg font-semibold gap-2 bg-[#009179c2] hover:bg-[#009179] duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-check-circle mr-1">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="m9 11 3 3L22 4" />
                            </svg>
                            ยืนยัน
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal Delete Menu -->
        <div class="modal" id="deleteProModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title font-bold">ลบโปรโมชั่น</h3>
                        <button type="button" class="btn-close flex items-center justify-center font-bold" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!-- Add your form or content for adding a menu here -->
                        <form id="form1" action="" method="post" class="text-center">

                            <!-- Add a hidden input for storing the menu ID -->
                            <input type="hidden" id="ProID-delete" name="ProID" value="">
                            <h id="Pro-delete"></h>

                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit"
                            class="add-menu-option flex items-center shadow-sm rounded-lg font-semibold gap-2 bg-[#fa5e2abe] hover:bg-[#fa5e2a] duration-500"
                            data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-ban mr-1">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m4.9 4.9 14.2 14.2" />
                            </svg>
                            ยกเลิก
                        </button>
                        <button type="submit" id="delete-pro" name="delete-pro"
                            class="add-menu-option flex items-center shadow-sm rounded-lg font-semibold gap-2 bg-[#009179c2] hover:bg-[#009179] duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-check-circle mr-1">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="m9 11 3 3L22 4" />
                            </svg>
                            ยืนยัน]
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <script>

            document.addEventListener('DOMContentLoaded', function () {

                // Edit Menu
                var editButtons = document.querySelectorAll('.button-edit');
                editButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        // Get the menu ID from the data attribute
                        var proId = button.getAttribute('data-pro-id');

                        // Fetch menu details using AJAX or use the data already available on the page
                        // For simplicity, assuming the menu details are already available in PHP
                        var promotionDetails = <?php echo json_encode($promotionDetails); ?>;

                        // Populate the modal content with the selected menu information
                        document.getElementById('ProID').value = proId;
                        document.getElementById('Name-edit').value = promotionDetails[proId]['name'];
                        document.getElementById('Discount-edit').value = promotionDetails[proId]['discount'];
                        document.getElementById('Date-edit').value = promotionDetails[proId]['end_date'];

                        // Show the modal
                        var editModal = new bootstrap.Modal(document.getElementById('editProModal'));
                        editModal.show();
                    });
                });

                // Delete Promotion
                var deleteButtons = document.querySelectorAll('.button-delete');
                deleteButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        // Get the menu ID from the data attribute
                        var proId = button.getAttribute('data-pro-id');

                        // Fetch menu details using AJAX or use the data already available on the page
                        // For simplicity, assuming the menu details are already available in PHP
                        var promotionDetails = <?php echo json_encode($promotionDetails); ?>;

                        // Populate the modal content with the selected menu information
                        document.getElementById('ProID-delete').value = proId;
                        document.getElementById('Pro-delete').innerHTML = "ต้องการลบโปรโมชั่น <strong>" + promotionDetails[proId]['name'] + "</strong> ?";

                        // Show the modal
                        var deleteModal = new bootstrap.Modal(document.getElementById('deleteProModal'));
                        deleteModal.show();
                    });
                });

            });
        </script>

        <?php
        //Add Promotion
        if (isset($_POST['add-pro'])) {
            $name = $_POST['Name'];
            $discount = $_POST['Discount'];
            $date = $_POST['Date'];

            $sql = "INSERT INTO promotion (name, discount, status, end_date) VALUES ('$name', $discount, 'active', '$date');";
            if (mysqli_query($conn, $sql)) {
                echo "<script>window.location.href = 'index.php';</script>";
            } else {
                echo "Error added record: " . mysqli_error($conn);
            }
        }
        //Edit Promotion
        if (isset($_POST['edit-pro'])) {
            $proId = $_POST['ProID'];
            $name = $_POST['Name'];
            $discount = $_POST['Discount'];
            $date = $_POST['Date'];

            $sql = "UPDATE promotion SET name = '$name', discount = '$discount', end_date = '$date' WHERE ID = $proId";
            if (mysqli_query($conn, $sql)) {
                // Refresh the status after updating end_date
                $updateStatusSql = "UPDATE promotion SET status = CASE WHEN end_date >= '$today' THEN 'active' ELSE 'inactive' END WHERE ID = $proId";
                mysqli_query($conn, $updateStatusSql);

                echo "<script>window.location.href = 'index.php';</script>";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
        //Delete Promotion
        if (isset($_POST['delete-pro'])) {
            $proId = $_POST['ProID'];

            $sql = "DELETE FROM promotion WHERE ID = $proId";
            if (mysqli_query($conn, $sql)) {
                // Refresh the status after updating end_date
                $updateStatusSql = "UPDATE promotion SET status = CASE WHEN end_date >= '$today' THEN 'active' ELSE 'inactive' END WHERE ID = $proId";
                mysqli_query($conn, $updateStatusSql);

                echo "<script>window.location.href = 'index.php';</script>";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
        ?>

        <?php
        // close connection
        mysqli_close($conn);
        ?>
    </body>

    </html>