<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>พนักงานเสิร์ฟ</title>
  <link rel="stylesheet" href="../../style/alomastyles.css">
  <script src="script.js"></script>
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

  <div class="flex w-screen h-screen">

    <!-- leftbar -->
    <div class="flex flex-col w-2/12 h-full bg-[#EEE8C8] px-2 py-2 justify-between items-center">
      <div class="flex flex-col gap-2">
        <!-- Loco -->
        <img src="../image/icon.png" width="100%">
        <!-- MenuBar -->
        <a href="../ordermanage.php" class="unstyled-link">
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

    <div class="flex flex-col w-10/12 h-full">
      <div class="flex hp-10 px-3 py-4 bg-white justify-between items-center font-bold text-lg">
        <div>
          จัดการรายการ
        </div>
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

      <div class="flex flex-col hp-90 w-full bg-gray-200 px-3 py-3 gap-3">
        <div
          class="grid grid-cols-4 justify-items-center h-full w-full bg-white px-3 py-3 rounded-lg gap-2 overflow-y-auto">

          <?php
          $sql1 = "SELECT orders.*
          FROM orders
          INNER JOIN tables ON orders.table_id = tables.id
          WHERE orders.status='sent' AND orders.start_time > tables.start_time;";

          $sql2 = "SELECT orders.*
          FROM orders
          INNER JOIN tables ON orders.table_id = tables.id
          WHERE orders.status='process' AND orders.start_time > tables.start_time;";

          $sql3 = "SELECT orders.*
          FROM orders
          INNER JOIN tables ON orders.table_id = tables.id
          WHERE orders.status='done' AND orders.start_time > tables.start_time;";
          
          $result1 = $db->query($sql1);
          $result2 = $db->query($sql2);
          $result3 = $db->query($sql3);

          $sent_orders_count1 = 0;
          $sent_orders_count2 = 0;
          $sent_orders_count3 = 0;

          while ($row = $result1->fetchArray(SQLITE3_ASSOC)) {
            $sent_orders_count1++;
          }

          while ($row = $result2->fetchArray(SQLITE3_ASSOC)) {
            $sent_orders_count2++;
          }

          while ($row = $result3->fetchArray(SQLITE3_ASSOC)) {
            $sent_orders_count3++;
          }

          ?>

          <?php if ($sent_orders_count3 > 0): ?>
            <?php while ($row = $result3->fetchArray(SQLITE3_ASSOC)): ?>
              <?php
              $order_id = $row["id"];
              $time_only = date("H:i:s", strtotime($row["start_time"]));
              ?>
              <button class="flex flex-col h-fit w-full bg-[#fff6f1] hover:bg-[#F2EAE5] duration-500 rounded-lg shadow-sm"
                onclick="window.location.href = '../Order/done.php?order_id=<?php echo $row['id']; ?>'">
                <h4
                  class="flex font-bold text-xl w-full h-1/5 bg-green-600 text-white px-2 py-1 justify-center items-center rounded-t-lg">
                  รายการที่
                  <?php echo $row["id"]; ?>
                </h4>
                <div class="flex flex-col w-full px-3 py-3  gap-2">
                  <div class="flex w-full h-fit text-lg font-semibold text-emerald-600">
                    เสร็จสิ้น
                  </div>
                  <div class="flex w-full h-fit">
                    โต๊ะที่ :
                    <?php echo $row["table_id"]; ?>
                  </div>
                  <div class="flex w-full h-fit">
                    เวลาสั่งรายการ :
                    <?php echo $time_only; ?>
                  </div>
                  <hr>
                  <div
                    class="flex items-center w-full rounded-lg bg-[#EEE8C8] hover:bg-[#f3efd9] duration-500 gap-2 px-3 py-2">
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
                    <?php
                    $sql4 = "SELECT COUNT(*) FROM order_item WHERE order_id ='$order_id'";
                    $result4 = $db->querySingle($sql4);
                    ?>
                    <p>
                      <?php echo $result4; ?> รายการ
                    </p>
                  </div>
                </div>
              </button>
            <?php endwhile ?>
          <?php endif ?>


        </div>
        <!-- navbar -->
        <div class="flex items-center justify-between px-4 py-2 rounded-lg bg-[#EEE8C8] shadow-md">
          <div class="status font-bold" id="receive">
            <button class="status_button" onclick="window.location.href = '../Sent'">
              <div flex>

              </div>
              <div class="notification b1">
                <?php echo $sent_orders_count1 ?>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-concierge-bell">
                <path d="M3 20a1 1 0 0 1-1-1v-1a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1Z" />
                <path d="M20 16a8 8 0 1 0-16 0" />
                <path d="M12 4v4" />
                <path d="M10 4h4" />
              </svg>
              ออเดอร์
              <div class="h-1 w-full bg-[#EEE8C8]"></div>
            </button>
          </div>
          <div class="status" id="arranging">
            <button class="status_button font-bold" onclick="window.location.href = '../Process/'">
              <div class="notification b2">
                <?php echo $sent_orders_count2 ?>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-file-clock">
                <path d="M16 22h2a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3" />
                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                <circle cx="8" cy="16" r="6" />
                <path d="M9.5 17.5 8 16.25V14" />
              </svg>
              กำลังเตรียมออเดอร์
              <div class="h-1 w-full bg-[#EEE8C8]"></div>
            </button>
          </div>
          <div class="status" id="finished">
            <button class="status_button font-bold" style="color: #6A311D;"
              onclick="window.location.href = './index.php'">
              <div class="notification b3">
                <?php echo $sent_orders_count3 ?>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-clipboard-check">
                <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
                <path d="m9 14 2 2 4-4" />
              </svg>
              เสร็จสิ้น
              <div class="h-1 w-full bg-red-500 rouded-full"></div>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>