<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../output.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <title>Receptionist</title>
    <style>
        * {
            font-family: "Noto Sans Thai", sans-serif;
        }
    </style>

</head>

<body class="w-screen h-screen flex flex-1">


    <?php
    require_once('../utils/config.php');


    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    ?>

    <nav class="flex flex-col w-2/12 h-full bg-[#EEE8C8]">
        <img src="../images/icon.png" class="w-[90%] h-[10%]" alt="">
        <div class="h-full flex flex-col justify-between font-semibold text-lg">
            <div class="px-6 py-4">
                <button class="flex gap-2 w-full px-4 py-6 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    <span>หน้าหลัก</span></button>
                <button class="flex gap-2 bg-[#FEFCF4] w-full px-4 py-6 rounded-lg items-center"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-settings-2">
                        <path d="M20 7h-9" />
                        <path d="M14 17H5" />
                        <circle cx="17" cy="17" r="3" />
                        <circle cx="7" cy="7" r="3" />
                    </svg>
                    การจัดการโต๊ะ</button>
            </div>
            <div class="px-6 py-4">
                <button class="flex gap-2 w-full px-4 py-6 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                    ออกจากระบบ</button>
            </div>

        </div>
    </nav>
    <div class="flex flex-col w-10/12 h-screen">
        <nav class="flex justify-between w-full h-[10%] bg-white py-4 px-4 items-center">
            <p class="text-3xl font-semibold">การจัดการโต๊ะ</p>
            <div class="flex gap-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-circle-user-round">
                    <path d="M18 20a6 6 0 0 0-12 0" />
                    <circle cx="12" cy="10" r="4" />
                    <circle cx="12" cy="12" r="10" />
                </svg>
                <p class="text-xl font-semibold">พนักงานต้อนรับ</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-down">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </div>
        </nav>

        <!-- main content -->
        <div class="flex h-full bg-[#D9D9D9] items-center py-6 px-4 shadow-lg">
            <div
                class="grid gap-x-4 gap-y-6 grid-cols-4 grid-rows-3 w-full h-full py-6 px-4 bg-white rounded-3xl overflow-hidden">
                <!-- 1 card -->
                <?php
                $select_tables = "SELECT * FROM tables;";
                $result = mysqli_query($conn, $select_tables);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    $customer_amount = $row["customer_amount"];
                    $status = $row["status"];
                    $start_time = $row["start_time"];

                    $table_status = $status == "free" ? "โต๊ะว่าง" : "โต๊ะกำลังใช้งาน";

                    if ($status === "free") {
                        echo <<<HTML
                            <div>
                        <div
                            class="w-full h-1/6 text-center text-xl bg-[#EEE8C8] rounded-t-xl flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="#6A311D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-utensils">
                                <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2" />
                                <path d="M7 2v20" />
                                <path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7" />
                            </svg>
                            <p class="text-2xl font-semibold text-[#6A311D] table-number">$id</p>
                        </div>
                        <div class="flex flex-col justify-between rounded-b-xl w-full h-5/6 bg-[#009179] p-2">
                            <div class="top text-white flex flex-col gap-2">
                                <p class="text-xl font-semibold text-center">ข้อมูล</p>
                                <div class="flex gap-2 ml-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-bar-chart-big">
                                        <path d="M3 3v18h18" />
                                        <rect width="4" height="7" x="7" y="10" rx="1" />
                                        <rect width="4" height="12" x="15" y="5" rx="1" />
                                    </svg>
                                    <p class="font-semibold text-lg">$table_status</p>
                                </div>
                                <div class="flex gap-2 ml-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-users">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                    <p class="font-semibold text-lg">4/4</p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <hr>
                                <div class="bottom flex flex-col items-end w-full">
                                    <form action="AddCustomer.php">
                                    <button type="submit" name="add"
                                        class="openModal flex gap-2 font-semibold px-3 py-1 bg-[#EBFFF3] border-black border-[1px] rounded-xl"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="lucide lucide-user-plus">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                            <circle cx="9" cy="7" r="4" />
                                            <line x1="19" x2="19" y1="8" y2="14" />
                                            <line x1="22" x2="16" y1="11" y2="11" />
                                        </svg> เพิ่มลูกค้า
                                        <span class="hidden">$id</span>
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    HTML;
                    
                    } else {
                        echo <<<HTML
                            <div>
                                <div
                                    class="w-full h-1/6 text-center text-xl bg-[#EEE8C8] rounded-t-xl flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                                        stroke="#6A311D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-armchair">
                                        <path d="M19 9V6a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3" />
                                        <path d="M3 16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v2H7v-2a2 2 0 0 0-4 0Z" />
                                        <path d="M5 18v2" />
                                        <path d="M19 18v2" />
                                    </svg>
                                    <p class="text-2xl font-semibold text-[#6A311D] table-number">$id</p>
                                </div>
                                <div class="bg-[#FA5D2A] flex flex-col justify-between rounded-b-xl w-full h-5/6  p-2">
                                    <div class="top text-white flex flex-col gap-2">
                                        <p class="text-xl font-semibold text-center">ข้อมูล</p>
                                        <div class="flex gap-2 ml-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-bar-chart-big">
                                                <path d="M3 3v18h18" />
                                                <rect width="4" height="7" x="7" y="10" rx="1" />
                                                <rect width="4" height="12" x="15" y="5" rx="1" />
                                            </svg>
                                            <p class="font-semibold text-lg">$table_status</p>
                                        </div>
                                        <div class="flex gap-2 ml-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-users">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                            </svg>
                                            <p class="font-semibold text-lg">$customer_amount/4</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <hr>
                                        <div class="bottom flex justify-between items-end w-full ">
                                            <div class="flex gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="lucide lucide-clock">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <polyline points="12 6 12 12 16 14" />
                                                </svg>
                                                <p class="text-lg font-semibold text-white">$start_time</p>
                                            </div>
                                            <button
                                                class="openPayments flex gap-2 font-semibold px-3 py-1 bg-[#EBFFF3] border-black border-[1px] rounded-xl ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="#333" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="lucide lucide-credit-card">
                                                    <rect width="20" height="14" x="2" y="5" rx="2" />
                                                    <line x1="2" x2="22" y1="10" y2="10" />
                                                </svg>
                                                <span>ชำระเงิน</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            HTML;
                    }

                }
                if(isset($_GET["add"])) {
                    
                }
                ?>


            </div>
        </div>
    </div>
    <div>

        <!-- hidden -->
        <?php
        echo <<<HTML
             <div id="modal"
            class="fixed flex items-center justify-center top-0 right-0 left-0 z-50 inset-0 overflow-y-auto bg-[#ffffff6f] hidden">
            <div class="w-[30%] h-fit bg-white  rounded-lg shadow-lg p-6">
                <div class="w-full grid grid-cols-3 grid-rows-1 border-b-2 border-gray-200 pb-4">
                    <div></div>
                    <h1 class="text-xl font-bold justify-self-center">เพิ่มลูกค้า</h1>
                    <button id="closeModal"
                        class="text-gray-400 hover:text-gray-600 focus:outline-none justify-self-end">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="pt-4">
                    <form class="max-w-sm mx-auto flex flex-col justify-between text-lg gap-2">
                        <div class="flex justify-between">
                            <p>โต๊ะ</p>
                            <p id="table-no">$currentId</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <label for="customer_amount" class="block mb-2 text-gray-900">จำนวนลูกค้า</label>
                            <select id="customer_amount"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-1.5">
                                <option selected value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="flex justify-between text-black items-center text-center">
                            <label for="underline_select">โปรโมชั่น</label>
                            <select id="underline_select"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-1.5">
                                <option value="none" selected>ไม่มี</option>
                                <option value="2">โปรโมชั่น 1</option>
                                <option value="3">โปรโมชั่น 2</option>
                                <option value="4">โปรโมชั่น 3</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="mt-4 flex justify-end gap-2">
            <button
                class="closeBtn flex gap-1 bg-[#FA5D2A] hover:bg-[#fa6d3f] text-white font-bold py-2 px-4 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-ban">
                    <circle cx="12" cy="12" r="10" />
                    <path d="m4.9 4.9 14.2 14.2" />
                </svg>
                ยกเลิก
            </button>
            <button
                class="closeBtn flex gap-1 bg-[#009179] hover:bg-[#199c86] text-white font-bold py-2 px-4  rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-check-circle">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                    <path d="m9 11 3 3L22 4" />
                </svg>ยืนยัน
            </button>
        </div>
        HTML;
        ?>
    </div>
    </div>
    <!-- hidden -->
    <div id="payment"
        class="fixed flex items-center justify-center top-0 right-0 left-0 z-50 inset-0 overflow-y-auto hidden bg-[#ffffff6f]">
        <div class="w-[30%] h-fit bg-white  rounded-lg shadow-lg p-6">
            <div class="w-full grid grid-cols-3 grid-rows-1 border-b-2 border-gray-200 pb-4">
                <div></div>
                <h1 class="text-xl font-bold justify-self-center">เลขที่ใบเสร็จ</h1>
                <button class="closePayment text-gray-400 hover:text-gray-600 focus:outline-none justify-self-end">
                    <svg class="w-6 h-6 closePay" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="pt-4">
                <div class="grid grid-cols-2 grid-rows-5">
                    <p>โต๊ะ</p>
                    <p class="justify-self-end"><span>4</span> คน</p>
                    <p>จำนวนคน</p>
                    <p class="justify-self-end"><span>4</span> คน</p>
                    <p>ราคาต่อหัว</p>
                    <p class="justify-self-end"><span>4</span> คน</p>
                    <p>ราคารวม</p>
                    <p class="justify-self-end"><span>4</span> คน</p>
                    <p>ส่วนลดจากโปรโมชั่น</p>
                    <p class="justify-self-end"><span>4</span> คน</p>
                </div>
                <div>

                </div>

                <div class="mt-4 flex justify-end gap-2">
                    <button
                        class="closePayment flex gap-1 bg-[#FA5D2A] hover:bg-[#fa6d3f] text-white font-bold py-2 px-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-ban">
                            <circle cx="12" cy="12" r="10" />
                            <path d="m4.9 4.9 14.2 14.2" />
                        </svg>
                        ยกเลิก
                    </button>
                    <button
                        class="closePayment flex gap-1 bg-[#009179] hover:bg-[#199c86] text-white font-bold py-2 px-4  rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-check-circle">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                            <path d="m9 11 3 3L22 4" />
                        </svg>ยืนยัน

                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="./ManageTable2.js"></script>
<script>

</script>

</html>