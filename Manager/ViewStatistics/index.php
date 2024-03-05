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
            color: #6A311D;
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
            width: 16rem;
            height: 4.5rem;
            padding: 20px;
            margin: 10px;
            margin-left: 20px;
            border-radius: 1cap;
            color: #000000;
            background-color: #ffffffb6;
        }
        .custom-div2 {
            height: 82dvh;
            width: 97%;
            background-color: #ffffff; /* Add background color for the custom div */
            margin: 1.5%;
            border-radius: 1cap;
        }
        .btn-selectyear {
            color: #ffffff;
            width: 10%;
            margin-right: 10px;
            background-color: rgba(250, 93, 42, 0.5);
        }
        .btn-selectyear:hover {
            color: #ffffff;
            background-color: rgba(250, 93, 42, 0.8);
        }
        .selectyear {
            background-color: rgba(250, 93, 42, 0.8);
        }
        .menu {
            width: 31.5%;
            height: auto;
            margin-left: 20px;
            margin-top: 20px;
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
        .content-menu {
            margin-left: 90px;
        }
        .menu-option {
            width: 7rem;
            height: 2.5rem;
            cursor: pointer;
            margin-top: 20px;
            margin-left: 15px;
            padding: 10px;
            border-radius: 1cap;
            color: #000000;
        }
        .menu-option.button-edit {
            background-color: #F1DC6B;
            margin-right: 35px;
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
                        <div class="menu-bar d-flex align-items-center selectbar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bar-chart-3 mr-2"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
                            <h5 class="fw-bold">สถิติ</h5>
                        </div>
                    </a>
                    <a href="../ManageMenu/index.php" class="unstyled-link">
                        <div class="menu-bar d-flex align-items-center">
                            <svg width="40" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="3" class="mr-2"><path d="M31.2176 6.66699H6.83668C5.15353 6.66699 3.78906 8.15938 3.78906 10.0003V30.0003C3.78906 31.8413 5.15353 33.3337 6.83668 33.3337H31.2176C32.9008 33.3337 34.2653 31.8413 34.2653 30.0003V10.0003C34.2653 8.15938 32.9008 6.66699 31.2176 6.66699Z" stroke-linecap="round" stroke-linejoin="round"/><path d="M15.9805 6.66699V13.3337"  stroke-linecap="round" stroke-linejoin="round"/><path d="M3.78906 13.333H34.2653"  stroke-linecap="round" stroke-linejoin="round"/><path d="M9.88477 6.66699V13.3337"  stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <h5 class="fw-bold">จัดการเมนูอาหาร</h5>
                        </div>
                    </a>
                    <a href="../ManagePromotion/index.php" class="unstyled-link">
                        <div class="menu-bar d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ticket-plus mr-2"><path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M9 12h6"/><path d="M12 9v6"/></svg>
                            <h5 class="fw-bold">จัดการโปรโมชั่น</h5>
                        </div>
                    </a>
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
                    <div class="option-bar d-flex align-items-center">
                        <h4 class="fw-bold">รายได้</h4>
                    </div>
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
                    <!-- 1 Category -->
                    <div class="container-fuild category mb-4">
                        <form id="form1" action="" method="post">
                            <div class="form-group">
                                <?php
                                // --- SQL SELECT statement  
                                $sql = "SELECT DISTINCT YEAR(date) AS year FROM bill ORDER BY year DESC;";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $year = $row['year'];
                                        echo '<button type="submit" class="btn btn-selectyear shadow bg-body-tertiary rounded" id="' .$year . '" name="showChart" value="' .$year . '">' .$year . '</button>';
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </div>
                        </form>
                        <canvas id="incomeChart" class="mt-2" height="132"></canvas>
                    </div>
                </div>
            </main>
        </div>
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

            document.getElementById(`${selectedYear}`).classList.add('selectyear');
        }

        <?php
            if(isset($_POST['showChart'])){
                $selectedYear = $_POST['showChart'];
            }else {
                $selectedYear = 2024;
            }
            $sql = "SELECT MONTH(date) AS month, SUM(total) AS total_income FROM bill WHERE YEAR(date) = $selectedYear and status != 'unpaid' GROUP BY MONTH(date)";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $monthlyIncomeData[$row['month']] = $row['total_income'];
                }
            }
            $jsMonthlyIncomeData = json_encode(array_values($monthlyIncomeData));

            echo "updateChart(" . $selectedYear . ", $jsMonthlyIncomeData);";
        ?>

        });

  </script>


  <?php
        // close connection
        mysqli_close($conn);
    ?>
</body>
</html>