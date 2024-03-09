<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>พนักงานเสิร์ฟ</title>
  <link rel="stylesheet" href="../../../css&js/alomastyles.css">
  <script src="script.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

<?php
// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WhatsUpShabu";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$order_id = $_GET['order_id'];
$order_id = intval($order_id); // Ensure $order_id is an integer to prevent SQL injection

$order_sql = "SELECT * FROM orders WHERE id ='$order_id';";
$result = mysqli_query($conn, $order_sql);
$order = mysqli_fetch_assoc($result);

$sql1 = "SELECT * FROM order_item WHERE order_id='$order_id';";
        
$result1 = mysqli_query($conn, $sql1);
$row_count = mysqli_num_rows($result1);
?>


<div class="back">

  <div class="function">
    <img src="../../../pic/logo.png" alt="Company Logo" class="logo">
    <button class="func_menu" id="ordermanage" style="background-color: #fff; color: #6A311D;"
      onclick="window.location.href = '../../ordermanage.php'">
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
    <button class="func_menu" id="menumanage" onclick="window.location.href = '../../menumanage.php'">
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
          <img src="../../../pic/emp.jpg" class="emp_img">
          <button class="btn btn-secondary " type="button" id="dropdownMenuButton">
            นายสมปอง สมปราถนา
          </button>
        </div>
      </div>
    </div>
    <div class="outline innerorder">
      <div class="head_tab">

        <div style="display:flex; height:100%; border-radius:10px 10px 0 0;">
          <button class="back_page">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" color="#fff" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="lucide lucide-move-left">
              <path d="M6 8L2 12L6 16" /><path d="M2 12H22" /></svg>
          </button>
          <h4 style="color:#fff; margin-left:10px; height:100%;"> รายการที่ <?php echo " " . $order_id; ?> </h4>
        </div>
      </div>

      <div class="head_order">
      <div class="line ">
      <a class="status_order" id="arg">กำลังจัดรายการ</a>
            </div>
            <div class="line">
              <a class="key">โต๊ะที่:</a>
              <a class="Table_Number value"><?php echo $order["table_id"]; ?></a>
            </div>
            <div class="line">
              <a class="key">เวลาที่อัพเดท :</a>
              <a class="update_time value"><?php echo " "; ?></a>
            </div>
            <div class="line">
              <a class="key">รายการทั้งหมด :</a>
              <a class="update_time value"><?php echo "".$row_count." "; ?>รายการ</a>
            </div>
      </div>

      <div class="menu_bar">
        <?php 

        if (mysqli_num_rows($result1) > 0) {
          // วนลูปแสดงผลข้อมูล
          while($row = mysqli_fetch_assoc($result1)) {
        ?>
        <div class="menu_item">
          <?php
          $menu_id = $row['menu_id'];
          $sql2 = "SELECT * FROM menu WHERE ID='$menu_id';";
          $result2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($result2);
          ?>
          <div class="pic_frame">
            <img src="<?php echo $row2['image'];?>" class="menu_img">
          </div>
          <div class="name_menu_frame">
            <div>

              <h5 class="name_menu"><?php echo $row2['name'];?></h5>
              <a class="oneset"><?php echo $row2['description'];?></a>
            </div>
            <a class="quantity"><?php echo $row["quantity"]." "; ?> ชุด</a>
            <div style="margin:5px 1px 1px 10px;"><input type="checkbox"></div>
          </div>
        </div>
        <?php
          }
        } else {
          echo "ไม่พบข้อมูล";
        }
        ?>
      </div>

      <div class="submit_bar">
      <form id="serveForm" action="" method="post">
        <input type="hidden" id="orderID" name="orderID" value="">
        <button type="button" id="serveButton" class="arranging_button">เสิร์ฟ</button>
        
        <!-- Modal -->
        <div id="serveConfirmationModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <p>คุณต้องการยืนยันการเสิร์ฟรายการนี้หรือไม่?</p>
            <div class="modal-buttons">
              <button id="confirmServe" class="confirm-button">ยืนยัน</button>
              <button id="cancelServe" class="cancel-button">ยกเลิก</button>
            </div>
          </div>
        </div>
      </form>

          
        </form>
      </div>
    </div>
  </div>
</div>
<?php
  // รับค่า ID ของรายการที่ต้องการเปลี่ยนสถานะจาก URL parameter
  echo "<script>document.getElementById('orderID').value = ". $order_id ."</script>";

  

//   if(isset($_POST['orderID'])){
//     $order_id = $_POST['orderID'];
//     $sql = "UPDATE orders SET status = 'done' WHERE id = $order_id";
    
//     if (mysqli_query($conn, $sql)) {
//       echo "Record updated successfully";
//       echo "<script>window.location.href = '../Arranging.php';</script>";
//     } else {
//         echo "Error updating record: " . mysqli_error($conn);
//     }
// }


  // ปิดการเชื่อมต่อ
  mysqli_close($conn);
?>

</body>

</html>
