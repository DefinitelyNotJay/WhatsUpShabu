<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EditStatus Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
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

        .menu {
            width: 32%;
            height: 125px;
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

        .outofstock {
            background-color: rgba(214, 82, 74, 0.7);
        }

        .outofstock:hover {
            background-color: rgba(214, 82, 74, 1);
        }

        .menu-option {
            width: 7rem;
            height: 2.5rem;
            cursor: pointer;
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

        .modal-header {
            background-color: #EEE8C8;
        }

        .imagePreview {
            display: none;
            width: 50%;
            height: 200px;
        }

        .add-menu-option {
            color: #ffffff;
            width: 7rem;
            height: 2.5rem;
            cursor: pointer;
            padding: 10px;
            border-radius: 1cap;
            border: #000000;
        }

        input[type="radio"]:checked {
            background-color: rgba(71, 193, 105, 1);
        }
    </style>
</head>

<body>
    <?php
    session_start();
    // 1. Connect to Database 
    class MyDB extends SQLite3 {
    function __construct() {
       $this->open('../../utils/WhatsUpShabu.db');
        }
    }

    // 2. Open Database 
    $db = new MyDB();

    if (!isset($_SESSION['username']) or $_SESSION['role'] !== "waiter") {
        header("Location: ../../../index.php");
        exit();
    }
    
    if (isset($_POST["logout"])) {
      session_destroy();
      header("Location: ../../../index.php");
      exit();
    }
    ?>
    <div class="flex w-screen h-screen">
        <!-- Sidebar -->
        <div class="flex flex-col w-2/12 h-full bg-[#EEE8C8] px-2 py-2 justify-between items-center">
            <div class="flex flex-col gap-2">
                <!-- Loco -->
                <img src="./image/icon.png" width="100%">
                <!-- MenuBar -->
                <a href="../ManageOrder/Sent/" class="unstyled-link">
                    <div
                        class="flex items-center cursor-pointer px-4 py-4 hover:bg-[#6A311D] hover:text-white rounded-lg duration-500 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-clipboard-list">
                            <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
                            <path d="M12 11h4" />
                            <path d="M12 16h4" />
                            <path d="M8 11h.01" />
                            <path d="M8 16h.01" />
                        </svg>
                        <p class="font-semibold">จัดการรายการ</p>
                    </div>
                </a>
                <a href="index.php" class="unstyled-link">
                    <div
                        class="flex items-center cursor-pointer px-4 py-4 bg-[#FEFCF4] text-[#6A311D] rounded-lg font-semibold gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-file-sliders">
                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                            <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                            <path d="M8 12h8" />
                            <path d="M10 11v2" />
                            <path d="M8 17h8" />
                            <path d="M14 16v2" />
                        </svg>
                        <p class="font-semibold">จัดการสถานะเมนู</p>
                    </div>
                </a>
            </div>
            <div class="w-full flex justify-center">
                <form action="" method="post" class="w-full">
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
                    data-bs-toggle="modal" data-bs-target="#statusMenuModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-rotate-ccw mr-1">
                        <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                        <path d="M3 3v5h5" />
                    </svg>
                    คืนค่าสถานะทั้งหมด
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
                    พนักงานเสิร์ฟ
                </div>
            </div>

            <!-- Content -->
            <div class="flex hp-90 w-full bg-gray-200 px-3 py-3 overflow-y-auto">
                <div
                    class="flex flex-col w-full bg-white shadow-sm  rounded-xl overflow-y-auto overflow-x-hidden pl-4 py-3 pr-1">

                    <?php
                    // --- SQL SELECT statement  
                    $sql = "SELECT * FROM menu;";
                    $result = $db->query($sql);

                        // Initialize an associative array to organize menus by type
                        $menusByType = array();
                        $menuDetails = array();

                        // Organize menus by type
                        while ($row = $result -> fetchArray(SQLITE3_ASSOC)) {
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
                            // catagoly
                            echo "<div class='flex flex-col mb-5 w-full'>";
                            echo "<h1 class='font-bold text-xl mb-3'>$type</h1>";
                            echo "<div class='flex flex-wrap gap-2 w-full'>";
                            foreach ($menus as $menu) {
                                echo "<div class='menu flex items-center shadow-sm  rounded-lg gap-3 duration-500 " . $menu['status'] . "'>";
                                echo "<div class='flex w-2/5 h-full rounded-lg bg-white'><img src='" . $menu["image"] . "' height='100%' width='100%' class='rounded-lg h-full w-full'></div>";
                                echo "<div class='flex flex-col justify-between w-3/5 h-full pb-3'><h5 class='font-bold px-2 py-3'>" . $menu["name"] . "</h5>";
                                // button div
                                echo "<div class='menu-edit flex items-center justify-center'>";
                                // button
                                echo "<div class='menu-option flex items-center shadow-sm  rounded-xl cursor-pointer duration-500 button-edit font-semibold' 
                                data-toggle='modal' data-target='#editMenuModal' data-menu-id='" . $menu["ID"] . "'>";
                                echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-settings-2 mr-1'><path d='M20 7h-9'/><path d='M14 17H5'/><circle cx='17' cy='17' r='3'/><circle cx='7' cy='7' r='3'/></svg>";
                                echo "แก้ไข</div>";
                                echo "</div></div></div>";
                            }
                            echo "</div></div>";
                        }
                    ?>
                </div>
            </div>
        </main>
    </div>
    <!-- Modal Change Status Menu -->
    <div class="modal" id="statusMenuModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="btn-close font-bold flex items-center justify-center"
                        data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Add your form or content for adding a menu here -->
                    <form id="form1" action="" method="post" class="text-center">

                        <h1 class="py-2">คืนค่าสถานะทั้งหมดของเมนู</h1>

                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit"
                        class="add-menu-option flex items-center shadow-sm font-semibold rounded-lg bg-[#fa5e2abe] hover:bg-[#fa5e2a] gap-2"
                        data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban mr-1"><circle cx="12" cy="12" r="10" /><path d="m4.9 4.9 14.2 14.2" /></svg>
                        <h6 class="font-semibold">ยกเลิก</h6>
                    </button>
                    <button type="submit" id="default-status" name="default-status"
                        class="add-menu-option flex items-center shadow-sm  rounded-lg font-semibold bg-[#009179c2] hover:bg-[#009179] gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle mr-1"> <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" /> <path d="m9 11 3 3L22 4" /></svg>
                        <h6 class="font-semibold">ยืนยัน</h6>
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
                <div class="modal-header font-bold">
                    <h3 id="Name-menu" class="modal-title"></h3>
                    <button type="button" class="btn-close font-bold flex items-center justify-center"
                        data-bs-dismiss="modal" aria-label="Close">X</button>
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
                            <input class="form-check-input" type="radio" id="statusOutofstock" name="showStatus"
                                value="outofstock">
                            <label class="form-check-label" for="statusInProgress">หมด</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline ms-5">
                            <input class="form-check-input" type="radio" id="statusRestocking" name="showStatus"
                                value="restocking">
                            <label class="form-check-label" for="statusCompleted">กำลังเติม</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline ms-5">
                            <input class="form-check-input" type="radio" id="statusInstock" name="showStatus"
                                value="instock">
                            <label class="form-check-label" for="statusPending">มี</label>
                        </div>

                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit"
                        class="add-menu-option flex items-center shadow-sm font-semibold rounded-lg bg-[#fa5e2abe] hover:bg-[#fa5e2a] gap-2"
                        data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban mr-1"><circle cx="12" cy="12" r="10" /><path d="m4.9 4.9 14.2 14.2" /></svg>
                        <h6 class="font-semibold">ยกเลิก</h6>
                    </button>
                    <button type="submit" id="edit-status" name="edit-status"
                        class="add-menu-option flex items-center shadow-sm  rounded-lg font-semibold bg-[#009179c2] hover:bg-[#009179] gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle mr-1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" /><path d="m9 11 3 3L22 4" /></svg>
                        <h6 class="font-semibold">ยืนยัน</h6>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

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
                    document.getElementById('Name-menu').innerHTML = menuDetails[menuId]['name'];
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
    if (isset($_POST['default-status'])) {

        $sql = "UPDATE menu SET status = 'instock'";
        if ($db->exec($sql)) {
            echo "<script>window.location.href = 'index.php';</script>";
        }
    }
    //Edit Status
    if (isset($_POST['edit-status'])) {
        $menuId = $_POST['MenuID'];
        $stausMenu = $_POST['showStatus'];

        $sql = "UPDATE menu SET status = '$stausMenu' WHERE ID = $menuId";
        if ($db->exec($sql)) {
            echo "<script>window.location.href = 'index.php';</script>";
        }
    }
    ?>

    <?php
    // close connection
    $db->close();
    ?>
</body>

</html>