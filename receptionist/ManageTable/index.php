<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Manage Tables</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    * {
        font-family: "Noto Sans Thai", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
</style>

<body>
    <?php
    session_start();

    if (!isset($_SESSION['username']) or $_SESSION['role'] !== "receptionist") {
        header("Location: /WhatsUpShabu/staff/login/index.php");
        exit();
    }

    if (isset($_POST["logout"])) {
        session_destroy();
        header("Location: /WhatsUpShabu/staff/login/index.php");
        exit();
    }
    
    require_once('../../utils/config.php');
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>


    <div class="flex h-screen w-screen m-0 p-0">
        <!-- Left Bar -->
        <div class="flex flex-col h-full w-2/12 bg-[#EEE8C8] pt-3">
            <div class="flex flex-col h-full w-full text-black justify-between">
                <div>
                    <!-- Logo -->
                    <img src="./img/icon.png" alt="WhatsUpShabuIcon" class="px-2 py-2">
                    <!-- Navbar -->
                    <div class="w-full pt-4">
                        <div class="nav flex-col px-3 cursor-default">
                            <a
                                class="flex text-black items-center gap-2 text-lg bg-white px-4 py-6 rounded-lg font-semibold justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-settings-2">
                                    <path d="M20 7h-9" />
                                    <path d="M14 17H5" />
                                    <circle cx="17" cy="17" r="3" />
                                    <circle cx="7" cy="7" r="3" />
                                </svg>
                                <p class="text-center">การจัดการโต๊ะ</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-center">
                    <form action="" method="post" class="w-full">
                        <button type="submit" name="logout"
                            class="w-full logout bg-[#EEE8C8] hover:bg-[#f3efd9] duration-500">
                            <p class="text-lg flex gap-2  px-4 py-6 font-semibold">
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
        </div>
        <div class="w-10/12 h-full">
            <div class="flex items-center justify-between bg-white w-full h-[10%] px-4 py-4 h-1/12">
                <h1 class="text-2xl font-semibold">การจัดการโต๊ะ</h1>
                <div class="flex gap-2 align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-circle-user-round">
                        <path d="M18 20a6 6 0 0 0-12 0" />
                        <circle cx="12" cy="10" r="4" />
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                    <p class="text-lg font-semibold">
                        <?php echo $_SESSION['name'] ?>
                    </p>

                </div>
            </div>
            <!-- tables -->
            <div class="bg-[#D9D9D9] w-full h-[90%] p-3">
                <div class="rounded-lg bg-white h-full grid grid-cols-4 grid-rows-3 py-6 px-4 gap-x-4 gap-y-6">
                    <?php
                    $select_tables = "SELECT * FROM tables;";
                    $result = mysqli_query($conn, $select_tables);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        $customer_amount = $row["customer_amount"];
                        $status = $row["status"];
                        $start_time = $row["start_time"];
                        $table_status = $status == "free" ? "โต๊ะว่าง" : "โต๊ะกำลังใช้งาน";
                        $end_time_hs = date('H:i', strtotime('+2 hours', strtotime($start_time)));

                        if ($status === "free") {
                            echo <<<HTML
                            <div>
                        <div
                            class="w-full h-1/6 text-center text-xl bg-[#EEE8C8] rounded-t-xl flex items-center justify-center gap-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="#6A311D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-utensils">
                                <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2" />
                                <path d="M7 2v20" />
                                <path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7" />
                            </svg>
                            <p class="text-2xl font-semibold text-[#6A311D] table-number">$id</p>
                        </div>
                        <div class="table-card flex flex-col justify-between rounded-b-xl w-full h-5/6 bg-[#009179] p-2">
                            <!-- top -->
                            <div class="top text-white flex flex-col gap-1">
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
                            <!-- bot -->
                            <div class="flex flex-col gap-2">
                                <hr>
                                <div class="bottom flex flex-col items-end w-full">
                                    <form action="../AddCustomer" method="get">
                                    <input type="text" value = $id class="hidden" name=id>
                                    <button
                                        type="submit" name="addCustomer"
                                        class="hover:bg-[#a5b3aa] hover:text-white flex gap-2 font-semibold px-3 py-1 bg-[#EBFFF3] rounded-xl duration-500 add-pay">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="lucide lucide-user-plus">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                            <circle cx="9" cy="7" r="4" />
                                            <line x1="19" x2="19" y1="8" y2="14" />
                                            <line x1="22" x2="16" y1="11" y2="11" />
                                        </svg> เพิ่มลูกค้า
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    HTML;
                        } 
                        else {
                            echo <<<HTML
                            <div class="cursor-default">
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
                                    <div class="top text-white flex flex-col gap-1">
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
                                                <p class="text-lg font-semibold text-white">$end_time_hs</p>
                                            </div>
                                            <form action="../Payment/index.php" method="get">
                                            <button
                                                class="hover:bg-[#a5b3aa] hover:text-white flex gap-2 font-semibold px-3 py-1 bg-[#EBFFF3] rounded-xl duration-500 add-pay">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="lucide lucide-credit-card">
                                                    <rect width="20" height="14" x="2" y="5" rx="2" />
                                                    <line x1="2" x2="22" y1="10" y2="10" />
                                                </svg>
                                                <span>ชำระเงิน</span>
                                            </button>
                                            <input type="text" value=$id name="table_id" class="hidden">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            HTML;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>