<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>พนักงานเสิร์ฟ</title>
  <link rel="stylesheet" href="../../css&js/alomastyles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
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

<body>

  <?php
  session_start();

  if (!isset($_SESSION['username']) or $_SESSION['role'] !== "waiter") {
    header("Location: ../../../index.php");
    exit();
  }

  if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: ../../../index.php");
    exit();
  }

  class MyDB extends SQLite3
  {
    function __construct()
    {
      $this->open('../../../utils/WhatsUpShabu.db');
    }
  }
  $db = new MyDB();
  ?>

  <?php
  $order_id = $_GET['order_id'];
  $order_id = intval($order_id);
  
  $order_sql = "SELECT * FROM orders WHERE id ='$order_id';";
  $result = $db->query($order_sql);
  $order = $result->fetchArray(SQLITE3_ASSOC);
  $time_only = date("H:i:s", strtotime($order["start_time"]));

  $sql1 = "SELECT * FROM order_item WHERE order_id='$order_id';";

  $result = $db->query($sql1);
  $row_count = 0;

  while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $row_count++;
  }

  ?>


  <div class="flex w-screen h-screen">
    <!-- leftbar -->
    <div class="flex flex-col w-2/12 h-full bg-[#EEE8C8] px-2 py-2 justify-between items-center">
      <div class="flex flex-col gap-2">
        <!-- Loco -->
        <img src="../image/icon.png" width="100%">
        <!-- MenuBar -->
        <a href="../../ordermanage.php" class="unstyled-link">
          <div
            class="flex items-center cursor-pointer px-4 py-4 bg-[#FEFCF4] text-[#6A311D] rounded-lg font-semibold gap-2">
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
        <a href="../../ManageStatusMenu" class="unstyled-link">
          <div
            class="flex items-center cursor-pointer px-4 py-4 hover:bg-[#6A311D] hover:text-white rounded-lg duration-500 gap-2">
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
          <button type="submit" name="logout" class="w-full logout bg-[#EEE8C8] hover:bg-[#f3efd9] duration-500">
            <p class="text-normal flex gap-2  px-4 py-6 font-semibold">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-log-out">
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
    <!-- main -->
    <div class="flex flex-col w-10/12 h-full">
      <!-- Option Bar -->
      <div class="flex hp-10 px-3 py-4 bg-white justify-between items-center">
        <p class="font-bold text-xl">
          จัดการรายการ
        </p>
        <div class="flex items-center font-semibold">
          <svg width="24" height="24" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-1">
            <path
              d="M20.0006 36.6663C29.2054 36.6663 36.6673 29.2044 36.6673 19.9997C36.6673 10.7949 29.2054 3.33301 20.0006 3.33301C10.7959 3.33301 3.33398 10.7949 3.33398 19.9997C3.33398 29.2044 10.7959 36.6663 20.0006 36.6663Z"
              fill="#F6851F" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path
              d="M30 33.333C30 30.6808 28.9464 28.1373 27.0711 26.2619C25.1957 24.3866 22.6522 23.333 20 23.333C17.3478 23.333 14.8043 24.3866 12.9289 26.2619C11.0536 28.1373 10 30.6808 10 33.333"
              stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path
              d="M20.0007 23.3333C23.6826 23.3333 26.6673 20.3486 26.6673 16.6667C26.6673 12.9848 23.6826 10 20.0007 10C16.3188 10 13.334 12.9848 13.334 16.6667C13.334 20.3486 16.3188 23.3333 20.0007 23.3333Z"
              stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <?php echo $_SESSION["name"]?>
        </div>
      </div>
      <!-- main content -->
      <div class="flex flex-col hp-90 w-full bg-gray-200">
        <div class="flex items-center bg-[#6A311D] w-full px-2 py-2 font-bold text-white text-lg">
          <div class="flex items-center gap-2">
            <button class="back_page" onclick="window.location.href = '../Sent'">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" color="#fff" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-move-left">
                <path d="M6 8L2 12L6 16" />
                <path d="M2 12H22" />
              </svg>
            </button>
            <h4>รายการที่ <?php echo $order_id; ?>
            </h4>
          </div>
        </div>
        <!-- order info -->
        <div class="flex flex-col w-full bg-white p-4 gap-2">
          <div class="flex items-center text-red-600 font-semibold">
            <a class="status_order" id="arg">ยังไม่ได้เสิร์ฟ</a>
          </div>
          <div class="flex items-center">
            โต๊ะที่ :
            <?php echo $order["table_id"]; ?>
          </div>
          <div class="flex items-center">
            เวลาที่อัพเดท :
            <?php echo $time_only; ?>
          </div>
          <div class="flex items-center">
            รายการทั้งหมด :
            <?php echo "" . $row_count . " "; ?>รายการ
          </div>
        </div>
        <!-- order list -->
        <div class="flex w-full h-1/2 px-3 pt-3 bg-gray-200">
          <!-- order items -->
          <div
            class="grid grid-cols-2 w-full h-full overflow-y-auto overflow-x-hidden bg-white gap-2 px-2 py-2 rounded-lg">
            <?php if ($row_count > 0): ?>
              <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)): ?>
                <!-- menu item -->
                <div class="flex justify-start items-center h-40 w-full bg-red-300 gap-3 rounded-lg shadow-sm">
                  <?php
                  $menu_id = $row['menu_id'];
                  $sql2 = "SELECT * FROM menu WHERE ID='$menu_id';";
                  $result2 = $db->query($sql2);
                  $row2 = $result2->fetchArray(SQLITE3_ASSOC);
                  ?>
                  <div class="flex w-4/12 h-full rounded-lg bg-white">
                    <img src="<?php echo $row2['image']; ?>" width="100%" class="rounded-lg">
                  </div>
                  <div class="flex h-full w-5/12 flex-col justify-start gap-3 px-3 py-3">
                    <div>
                      <h5 class="font-bold text-xl">
                        <?php echo $row2['name']; ?>
                      </h5>
                      <a class="oneset">
                        <?php echo $row2['description']; ?>
                      </a>
                    </div>
                    <a class="quantity">
                      จำนวน
                      <?php echo $row["quantity"] . " "; ?> ชุด
                    </a>
                  </div>
                </div>
              <?php endwhile ?>
            <?php endif ?>
          </div>
        </div>
        <!-- button -->
        <div class="flex h-full w-full items-center justify-center">
          <form id="serveForm" action="" method="post" class="flex justify-center w-full">
            <input type="hidden" id="orderID" name="orderID" value="" class="flex justify-center w-full">
            <button type="Submit" id="serveButton"
              class="arranging_button w-6/12 bg-red-400 hover:bg-red-600 hover:text-white p-3 rounded-lg text-xl font-semibold duration-500">รับออเดอร์</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  // รับค่า ID ของรายการที่ต้องการเปลี่ยนสถานะจาก URL parameter
  echo "<script>document.getElementById('orderID').value = " . $order_id . "</script>";


  if (isset($_POST['orderID'])) {
    $order_id = $_POST['orderID'];
    $sql = "UPDATE orders SET status = 'process' WHERE id = '$order_id'";
    $db->exec($sql);
    if ($db) {
      echo "Record updated successfully";
      echo "<script>window.location.href = '../Sent';</script>";
    } else {
      echo "Error added record: " . mysqli_error($conn);
    }
  }


  // ปิดการเชื่อมต่อ
  mysqli_close($conn);
  ?>

</body>

</html>