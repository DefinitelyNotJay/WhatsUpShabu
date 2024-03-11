<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
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
    </style>
</head>

<body>
    <?php
    session_start();
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
                        class="flex items-center cursor-pointer px-4 py-4 bg-[#FEFCF4] text-[#6A311D] rounded-lg duration-500">
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
                        class="flex items-center cursor-pointer px-4 py-4 hover:bg-[#6A311D] hover:text-white rounded-lg font-semibold duration-500">
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
                <h1 class="font-bold text-xl">สถิติภายในร้าน</h1>
                <div class="flex items-center font-semibold">
                    <svg width="24" height="24" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="mr-1"> <path d="M20.0006 36.6663C29.2054 36.6663 36.6673 29.2044 36.6673 19.9997C36.6673 10.7949 29.2054 3.33301 20.0006 3.33301C10.7959 3.33301 3.33398 10.7949 3.33398 19.9997C3.33398 29.2044 10.7959 36.6663 20.0006 36.6663Z" fill="#F6851F" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M30 33.333C30 30.6808 28.9464 28.1373 27.0711 26.2619C25.1957 24.3866 22.6522 23.333 20 23.333C17.3478 23.333 14.8043 24.3866 12.9289 26.2619C11.0536 28.1373 10 30.6808 10 33.333" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /><path d="M20.0007 23.3333C23.6826 23.3333 26.6673 20.3486 26.6673 16.6667C26.6673 12.9848 23.6826 10 20.0007 10C16.3188 10 13.334 12.9848 13.334 16.6667C13.334 20.3486 16.3188 23.3333 20.0007 23.3333Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    ผู้จัดการ
                </div>
            </div>
            <!-- Content -->
            <div class="flex hp-90 w-full bg-gray-200 px-3 py-3">
            <div class="flex flex-col h-full w-full shadow-sm rounded-xl items-center justify-start bg-white px-3 py-3 gap-2 overflow-hidden">
                <!-- button and display chart -->
                    <form id="form1" action="" method="post" class="flex hp-10 w-full items-center px-4 gap-2">
                            <?php
                            // --- SQL SELECT statement
                            $sql = "SELECT DISTINCT substr(date, 1, 4) AS year FROM bill ORDER BY year DESC;";
                            $result = $db->query($sql);
                            while ($row = $result -> fetchArray(SQLITE3_ASSOC)) {
                                $year = $row['year'];
                                echo '<button type="submit" class="flex bg-[#fa5d2a80] hover:bg-[#fa5d2a] text-white items-center px-3 py-2 duration-500 shadow-sm rounded-lg" 
                                id="' . $year . '" name="showChart" value="' . $year . '">' . $year . '</button>';
                            }
                            ?>
                    </form>
                    <div class="flex items-center justify-center w-full h-full px-2 py-2">
                        <canvas id="incomeChart" height="135%"></canvas>
                    </div>  
            </div>
            </div>
        </main>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            // Get the canvas element
            var ctx = document.getElementById('incomeChart').getContext('2d');
            var incomeChart;

            // Function to update the chart based on the selected year
            function updateChart(selectedYear, MonthlyIncomeData) {

                var MonthlyIncomeData = MonthlyIncomeData;

                // Chart data
                var data = {
                    labels: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
                    datasets: [{
                        label: `รายได้ต่อเดือนในปี ${selectedYear}`,
                        backgroundColor: '#FA5D2A',
                        borderColor: '#FA5D2A',
                        borderWidth: 2,
                        pointBackgroundColor: '#FA5D2A',
                        pointRadius: 2,
                        data: MonthlyIncomeData,
                    }]
                };

                // Chart options
                var options = {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'รายได้ (บาท)'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'เดือน'
                            }
                        }
                    }
                };

                // Destroy the existing chart (if any) to prevent overlapping
                if (incomeChart) {
                    incomeChart.destroy();
                }

                // Create the line chart
                incomeChart = new Chart(ctx, {
                    type: 'line',
                    data: data,
                    options: options


                });

                document.getElementById(`${selectedYear}`).classList.add('bg-[#fa5d2a]');
            }

            <?php
            if (isset($_POST['showChart'])) {
                $selectedYear = $_POST['showChart'];
            } else {
                $selectedYear = 2024;
            }
            $monthlyIncomeData = array_fill(1, 12, null);
            $sql = "SELECT CAST(substr(date, 6, 2) AS INTEGER) AS month, SUM(total) AS total_income FROM bill WHERE substr(date, 1, 4) = '$selectedYear' 
            AND status != 'unpaid' GROUP BY substr(date, 6, 2)";
            $result = $db->query($sql);

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $monthlyIncomeData[(int)$row['month']] = $row['total_income'];
            }

            $jsMonthlyIncomeData = json_encode(array_values($monthlyIncomeData));

            echo "updateChart(" . $selectedYear . ", $jsMonthlyIncomeData);";
            ?>

        });

    </script>

    <?php
    // close connection
    $db->close();
    ?>
</body>

</html>