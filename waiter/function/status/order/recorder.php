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

  <div class="back">

    <div class="function">
      <img src="../../../pic/logo.png" alt="Company Logo" class="logo">
      <button class="func_menu" id="ordermanage" style="background-color: #fff; color: #6A311D;" onclick="window.location.href = '../../ordermanage.php'">
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
      <div class="outline innerorder">
        <div class="head_tab">
        </div>
        <div class="head_order">
    
        </div>
        <div class="menu_bar">
          <div class="menu_item">

          </div>
        </div>
        <div class="submit_bar">
          <button class="receive_button" onclick="window.location.href = '../Receive.php'">รับ</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>