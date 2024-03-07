<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>พนักงานเสิร์ฟ</title>
  <link rel="stylesheet" href="../../css&js/alomastyles.css">
  <script src="script.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

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



  <div class="back">

    <div class="function">
      <img src="../../pic/logo.png" alt="Company Logo" class="logo">
      <button class="func_menu" id="ordermanage" style="background-color: #fff; color: #6A311D;" onclick="window.location.href = '../ordermanage.php'">
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
        จัดการรายการ
      </button>
      <button class="func_menu" id="menumanage" onclick="window.location.href = '../menumanage.php'">
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
        จัดการเมนู
      </button>
    </div>


    <div class="main">

      <div class="header">
        <div class="empName">
          <div class="dropdown">
            <img src="../../pic/emp.jpg" class="emp_img">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              นายสมปอง สมปราถนา
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">โปรไฟล์</a>
              <a class="dropdown-item" href="#">ตั้งค่า</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">ออกจากระบบ</a>
            </div>
          </div>
        </div>
      </div>

      <div class="outline">
        <div class="Orderlist_bar">
        <?php
    // คำสั่ง SQL เพื่อดึงข้อมูลจากตาราง orders
    $sql1 = "SELECT id, table_id FROM orders WHERE status='sent';";
    $sql2 = "SELECT id, table_id FROM orders WHERE status='process';";
    $sql3 = "SELECT id, table_id FROM orders WHERE status='done';";


    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    $result3 = mysqli_query($conn, $sql3);
    $sent_orders_count1 = mysqli_num_rows($result1);
    $sent_orders_count2 = mysqli_num_rows($result2);
    $sent_orders_count3 = mysqli_num_rows($result3);
    // ตรวจสอบว่ามีข้อมูลในตารางหรือไม่
    if (mysqli_num_rows($result1) > 0) {
        // วนลูปแสดงผลข้อมูล
        while($row = mysqli_fetch_assoc($result1)) {
?>
          <!-- สร้าง Orderlist_item -->
          <button class="Orderlist_item" onclick="window.location.href = 'order/recorder.php?order_id=<?php echo $row['id']; ?>'">
            <div class="line l1 s1">
              <h4>รายการที่ <?php echo $row["id"]; ?></h4>
              <a class="date_time">03/03/2024 20:10:44 น.</a>
            </div>
            <div class="line l2">
              <a class="status_order" id="rec">ยังไม่ได้รับ</a>
            </div>
            <div class="line l3">
              <a class="key">โต๊ะที่:</a>
              <a class="Table_Number value"><?php echo $row["table_id"]; ?></a>
            </div>
            <div class="line"></div>
            <div style="width: 99%; height: 0.5px; background-color: #aaa; margin-left: 0.5%;"></div>
            <div class="line l4">
              <div class="amount_list">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="lucide lucide-shopping-basket">
                  <path d="m15 11-1 9" />
                  <path d="m19 11-4-7" />
                  <path d="M2 11h20" />
                  <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8a2 2 0 0 0 2-1.6l1.7-7.4" />
                  <path d="M4.5 15.5h15" />
                  <path d="m5 11 4-7" />
                  <path d="m9 11 1 9" />
                </svg>
                <a>99</a>
              </div>
            </div>
          </button>
<?php
        }
    } else {
        echo "ไม่พบข้อมูล";
    }

    // ปิดการเชื่อมต่อ
    mysqli_close($conn);
?>
        </div>
      </div>
      <div class="status_bar">
        <div class="status" id="receive">
          <button class="status_button" style="color: #6A311D;" onclick="window.location.href = 'Receive.php'">
            <div class="notification b1"><?php echo $sent_orders_count1 ?></div>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-concierge-bell">
              <path d="M3 20a1 1 0 0 1-1-1v-1a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1Z" />
              <path d="M20 16a8 8 0 1 0-16 0" />
              <path d="M12 4v4" />
              <path d="M10 4h4" />
            </svg>
            <div style="width: 100%; height: 5px; background-color: #FA5D2A;"></div>
          </button>
        </div>
        <div class="status" id="arranging">
          <button class="status_button" onclick="window.location.href = 'Arranging.php'">
            <div class="notification b2"><?php echo $sent_orders_count2 ?></div>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-file-clock">
              <path d="M16 22h2a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3" />
              <path d="M14 2v4a2 2 0 0 0 2 2h4" />
              <circle cx="8" cy="16" r="6" />
              <path d="M9.5 17.5 8 16.25V14" />
            </svg>

          </button>
        </div>
        <div class="status" id="finished">
          <button class="status_button" onclick="window.location.href = 'Finished.php'">
            <div class="notification b3"><?php echo $sent_orders_count3 ?></div>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-clipboard-check">
              <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
              <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
              <path d="m9 14 2 2 4-4" />
            </svg>
            
          </button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>