<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManageMenu</title>
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
            width: 32.5%;
            height: 125px;
            overflow: hidden;
            border-radius: 1cap;
            color: #000000;
            background-color: #EEE8C8;
        }
        .button-edit {
            background-color: #FFF59B;
        }

        .button-edit:hover {
            background-color: #f8e852;
        }

        .button-delete {
            background-color: #F98E71;
        }

        .button-delete:hover {
            background-color: #f56a43;
        }

        .modal-header {
            background-color: #EEE8C8;
        }

        .imagePreview {
            display: none;
            width: 50%;
            height: 200px;
            margin-top: 10px;
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
    if(!$db) {
        echo $db->lastErrorMsg();
    } 

    if (!isset($_SESSION['username']) or $_SESSION['role'] !== "manager") {
        header("Location: /WhatsUpShabu/staff/login/index.php");
        exit();
    }

    if (isset($_POST["logout"])) {
        session_destroy();
        header("Location: /WhatsUpShabu/staff/login/index.php");
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
                <a href="../ViewStatistics/index.php" class="unstyled-link">
                    <div
                        class="flex items-center cursor-pointer px-4 py-4 hover:bg-[#6A311D] hover:text-white rounded-lg duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-bar-chart-3 mr-2">
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
                        class="flex items-center cursor-pointer px-4 py-4 bg-[#FEFCF4] text-[#6A311D] rounded-lg font-semibold">
                        <svg width="24" height="24" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                            stroke="currentColor" stroke-width="3" class="mr-2">
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
                        class="flex items-center cursor-pointer px-4 py-4 hover:bg-[#6A311D] hover:text-white rounded-lg duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-ticket-plus mr-2">
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
                    data-bs-toggle="modal" data-bs-target="#addMenuModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-plus-circle mr-2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12h8" />
                        <path d="M12 8v8" />
                    </svg>
                    เพิ่มเมนู
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
            <div class="flex hp-90 w-full bg-gray-200 px-3 py-3">
                <div
                    class="flex flex-col w-full bg-white shadow-sm  rounded-xl overflow-y-auto overflow-x-hidden pl-4 py-3 pr-1"
                    >
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
                            // catagoly
                            echo "<div class='flex flex-col mb-5 w-full'>";
                            echo "<h1 class='font-bold text-xl mb-3'>$type</h1>";
                            echo "<div class='flex w-full justify-center'>";
                            echo "<div class='flex flex-wrap gap-2 w-full'>";
                            // menu
                            foreach ($menus as $menu) {
                                echo "<div class='menu flex items-center shadow-sm rounded-lg gap-3'>";
                                echo "<div class='flex w-2/5 h-full rounded-lg bg-white'><img src='" . $menu["image"] . "' height='100%' class='rounded-lg'></div>";
                                echo "<div class='flex flex-col justify-between h-full w-3/5 py-2'><h5 class='font-bold'>" . $menu["name"] . "</h5>";
                                // menu-edit
                                echo "<div class='flex justify-center gap-3 w-full'>";
                                // menu-option
                                echo "<div class='flex h-fit w-5/12 px-3 py-2 items-center shadow-sm  rounded-xl cursor-pointer duration-500 button-edit' data-toggle='modal' data-target='#editMenuModal' data-menu-id='" . $menu["ID"] . "'>";
                                echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-settings-2 mr-1'><path d='M20 7h-9'/><path d='M14 17H5'/><circle cx='17' cy='17' r='3'/><circle cx='7' cy='7' r='3'/></svg>";
                                echo "<h6 class='font-semibold'>แก้ไข</h6></div>";
                                echo '<div class="flex flex h-fit w-5/12 px-3 py-2 items-center shadow-sm  rounded-xl cursor-pointer duration-500 button-delete" data-toggle="modal" data-target="#deleteMenuModal" data-menu-id="' . $menu["ID"] . '" >';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2 mr-1"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>';
                                echo "<h6 class='font-semibold'>ลบ</h6></div>";
                                echo "</div></div></div>";
                            }
                            echo "</div></div></div>";
                        }
                    ?>
                </div>
            </div>
        </main>

    </div>


    <!-- Modal Add Menu -->
    <div class="modal" id="addMenuModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title font-bold">เพิ่มเมนู</h3>
                    <button type="button" class="btn-close flex justify-center items-center font-bold"
                        data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Add your form or content for adding a menu here -->
                    <form id="form1" action="" method="post" class="flex flex-col gap-3 h-full w-full">
                        <div>
                            <label for="Name" class="form-label">ชื่อ :</label>
                            <input type="text" class="form-control required" id="Name" name="Name" value="" required />
                        </div>
                        <div>
                            <label for="Type" class="form-label">ประเภท : </label>
                            <select id="Type" name="Type" class="form-control required" required>
                                <option value="" selected>เลือกประเภท</option>
                                <option value="เนื้อ">เนื้อ</option>
                                <option value="หมู">หมู</option>
                                <option value="ไก่">ไก่</option>
                                <option value="ทะเล">ทะเล</option>
                                <option value="ลูกชิ้น">ลูกชิ้น</option>
                                <option value="ของกินเล่น">ของกินเล่น</option>
                                <option value="ของหวาน">ของหวาน</option>
                                <option value="ผลไม้">ผลไม้</option>
                            </select>
                        </div>
                        <div>
                            <label for="Image" class="form-label">รูปภาพ (URL) : </label>
                            <input type="text" class="form-control required" id="Image" name="Image" value=""
                                required />
                            <div class="text-center">
                                <img id="imagePreview" src="" alt="Image Preview"
                                    class="mx-auto align-items-center imagePreview">
                            </div>
                        </div>
                        <div>
                            <label for="Description" class="form-label">คำอธิบาย : </label>
                            <textarea type="text" class="form-control required" id="Description" name="Description"
                                rows="3" required></textarea>
                        </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button"
                        class="flex items-center shadow-sm  rounded-xl bg-[#fa5e2abe] hover:bg-[#fa5e2a] hover:text-white py-2 px-3 gap-2 duration-500"
                        data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-ban mr-1">
                            <circle cx="12" cy="12" r="10" />
                            <path d="m4.9 4.9 14.2 14.2" />
                        </svg>
                        <h6 class="font-semibold">ยกเลิก</h6>
                    </button>
                    <button type="submit" id="add-menu" name="add-menu"
                        class="flex items-center shadow-sm  rounded-xl bg-[#009179c2] hover:bg-[#009179] hover:text-white py-2 px-3 gap-2 duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-check-circle mr-1">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                            <path d="m9 11 3 3L22 4" />
                        </svg>
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
                <div class="modal-header">
                    <h3 class="modal-title font-bold">แก้ไขเมนู</h3>
                    <button type="button" class="btn-close flex justify-center items-center font-bold"
                        data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Add your form or content for adding a menu here -->
                    <form id="form2" action="" method="post" class="flex flex-col gap-3 h-full w-full">

                        <!-- Add a hidden input for storing the menu ID -->
                        <input type="hidden" id="MenuID" name="MenuID" value="">

                        <div>
                            <label for="Name-edit" class="form-label">ชื่อ :</label>
                            <input type="text" class="form-control required" id="Name-edit" name="Name" value="" />
                        </div>
                        <div>
                            <label for="Type-edit" class="form-label">ประเภท : </label>
                            <select id="Type-edit" name="Type" class="form-control">
                                <option value="" selected>เลือกประเภท</option>
                                <option value="เนื้อ">เนื้อ</option>
                                <option value="หมู">หมู</option>
                                <option value="ไก่">ไก่</option>
                                <option value="ทะเล">ทะเล</option>
                                <option value="ลูกชิ้น">ลูกชิ้น</option>
                                <option value="ของกินเล่น">ของกินเล่น</option>
                                <option value="ของหวาน">ของหวาน</option>
                                <option value="ผลไม้">ผลไม้</option>
                            </select>
                        </div>
                        <div>
                            <label for="Image-edit" class="form-label">รูปภาพ (URL) : </label>
                            <input type="text" class="form-control" id="Image-edit" name="Image" value="" />
                            <div class="text-center">
                                <img id="imagePreview-edit" src="" alt="Image Preview"
                                    class="mx-auto align-items-center imagePreview">
                            </div>
                        </div>
                        <div>
                            <label for="Description-edit" class="form-label">คำอธิบาย : </label>
                            <textarea type="text" class="form-control" id="Description-edit" name="Description" rows="3"
                                value=""></textarea>
                        </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit"
                        class="flex items-center shadow-sm  rounded-xl bg-[#fa5e2abe] hover:bg-[#fa5e2a] hover:text-white py-2 px-3 gap-2 duration-500"
                        data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-ban mr-1">
                            <circle cx="12" cy="12" r="10" />
                            <path d="m4.9 4.9 14.2 14.2" />
                        </svg>
                        <h6 class="font-semibold">ยกเลิก</h6>
                    </button>
                    <button type="submit" id="edit-menu" name="edit-menu"
                        class="flex items-center shadow-sm  rounded-xl bg-[#009179c2] hover:bg-[#009179] hover:text-white py-2 px-3 gap-2 duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-check-circle mr-1">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                            <path d="m9 11 3 3L22 4" />
                        </svg>
                        <h6 class="font-semibold">ยืนยัน</h6>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Delete Menu -->
    <div class="modal" id="deleteMenuModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title font-bold">ลบเมนู</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Add your form or content for adding a menu here -->
                    <form id="form1" action="" method="post" class="text-center">

                        <!-- Add a hidden input for storing the menu ID -->
                        <input type="hidden" id="MenuID-delete" name="MenuID" value="">
                        <h id="Name-delete"></h>

                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit"
                        class="flex items-center shadow-sm  rounded-xl bg-[#fa5e2abe] hover:bg-[#fa5e2a] hover:text-white py-2 px-3 gap-2 duration-500"
                        data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-ban mr-1">
                            <circle cx="12" cy="12" r="10" />
                            <path d="m4.9 4.9 14.2 14.2" />
                        </svg>
                        <h6 class="font-semibold">ยกเลิก</h6>
                    </button>
                    <button type="submit" id="delete-menu" name="delete-menu"
                        class="flex items-center shadow-sm  rounded-xl bg-[#009179c2] hover:bg-[#009179] hover:text-white py-2 px-3 gap-2 duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-check-circle mr-1">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                            <path d="m9 11 3 3L22 4" />
                        </svg>
                        <h6 class="font-semibold">ยืนยัน</h6>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            //Add Image Preview in Add Menu
            document.getElementById('Image').addEventListener('input', function (event) {
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

            // Edit Menu
            var editButtons = document.querySelectorAll('.button-edit');
            editButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    // Get the menu ID from the data attribute
                    var menuId = button.getAttribute('data-menu-id');

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

            // Delete Menu
            var deleteButtons = document.querySelectorAll('.button-delete');
            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    // Get the menu ID from the data attribute
                    var menuId = button.getAttribute('data-menu-id');

                    var menuDetails = <?php echo json_encode($menuDetails); ?>;

                    // Populate the modal content with the selected menu information
                    document.getElementById('MenuID-delete').value = menuId;
                    document.getElementById('Name-delete').innerHTML = "ต้องการลบเมนู<strong>" + menuDetails[menuId]['name'] + "</strong>?";

                    // Show the modal
                    var deleteModal = new bootstrap.Modal(document.getElementById('deleteMenuModal'));
                    deleteModal.show();
                });
            });
        });
    </script>

    <?php
    //Add Menu
    if (isset($_POST['add-menu'])) {
        $name = $_POST['Name'];
        $type = $_POST['Type'];
        $image = $_POST['Image'];
        $description = $_POST['Description'];

        $sql = "INSERT INTO menu (name, image, description, status, type) VALUES ('$name', '$image', '$description', 'instock', '$type');";
        if ($db->exec($sql)) {
            echo "<script>window.location.href = 'index.php';</script>";
        }
    }
    //Edit Menu
    if (isset($_POST['edit-menu'])) {
        $menuId = $_POST['MenuID'];
        $name = $_POST['Name'];
        $type = $_POST['Type'];
        $image = $_POST['Image'];
        $description = $_POST['Description'];

        $sql = "UPDATE menu SET name = '$name', type = '$type', image = '$image', description = '$description' WHERE ID = $menuId";
        if ($db->exec($sql)) {
            echo "<script>window.location.href = 'index.php';</script>";
        }
    }
    //Delete Menu
    if (isset($_POST['delete-menu'])) {
        $menuId = $_POST['MenuID'];

        $sql = "DELETE FROM menu WHERE ID = $menuId";
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