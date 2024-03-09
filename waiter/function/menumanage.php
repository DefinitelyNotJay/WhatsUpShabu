<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>พนักงานเสิร์ฟ</title>
  <link rel="stylesheet" href="../css&js/alomastyles.css">
  <script src="script.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  session_start();
  require_once("../../utils/config.php");
  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $menu_query = "SELECT * FROM menu";
  $result = mysqli_query($conn, $menu_query);
  $menu_details = array();
  $menu_type = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $name = $row["name"];
    $type = $row["type"];
    array_push($menu_type, $type);
  }

  if (isset($_POST["edit-status"])) {
    $new_status = $_POST["status"];
    $menu_id = $_POST["menu_id"];
    $update_query = "UPDATE menu SET `status` = '$new_status' WHERE id = '$menu_id'";
    $result = mysqli_query($conn, $update_query);
    unset($_POST["edit-status"]);
    
  }
  ?>

  <div class="back">
    <div class="function">
      <img src="../pic/logo.png" alt="Company Logo" class="logo">
      <button class="func_menu" id="ordermanage" onclick="window.location.href = 'ordermanage.php'">
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
      <button class="func_menu" id="menumanage" style="background-color: #fff; color: #6A311D;"
        onclick="window.location.href = 'menumanage.php'">
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
          <img src="../pic/emp.jpg" class="emp_img">
          นายสมปอง สมปราถนา
          </button>
        </div>
      </div>
      <div class="outside-content">
        <div class="main-content">

          <?php foreach (array_unique($menu_type) as $type): ?>
            <div class="items-type">
              <p class="type-text">
                <?php echo $type ?>
              </p>
              <div class="cards-area">
                <?php
                $menu_by_type_query = "SELECT * FROM menu WHERE `type` = '$type'";
                $result = mysqli_query($conn, $menu_by_type_query);

                ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                  <?php


                  $menu_id = $row["ID"];
                  $menu_details[$row["ID"]] = array(
                    "status" => $row["status"],
                    "name" => $row["name"]
                  );
                  $img_src = $row["image"];
                  $name = $row["name"];

                  ?>
                  <div class="cards">


                    <img src="<?php echo $img_src ?>" alt="">


                    <div class="card-content">
                      <h5>
                        <?php echo $name ?>
                      </h5>
                      <button class='menu-option d-flex align-items-center shadow  rounded mr-1 button-edit'
                        data-toggle='modal' data-target='#editMenuModal' data-menu-id='<?php echo $menu_id ?>'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none'
                          stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'
                          class='lucide lucide-settings-2 mr-1'>
                          <path d='M20 7h-9' />
                          <path d='M14 17H5' />
                          <circle cx='17' cy='17' r='3' />
                          <circle cx='7' cy='7' r='3' />
                        </svg>
                        <h6 class='fw-bold mt-2'>แก้ไข</h6>
                      </button>
                    </div>
                  </div>
                <?php endwhile ?>
              </div>
            </div>
          <?php endforeach ?>

          <!-- Modal Edit Menu -->
          <div class="modal" id="editMenuModal">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <div></div>
                  <h4 class="modal-title" id="editHeader">ModalHeader</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                  <!-- Add your form or content for adding a menu here -->
                  <form id="form2" action="" method="post">
                    <p>เลือกสถานะ</p>
                    <input type="text" id="menu_id" name="menu_id" class="d-none">
                    <div class="modal-radio">
                      <div>
                        <input type="radio" id="status1" name="status" value="instock">
                        <label for="status1">มี</label>
                      </div>
                      <div>
                        <input type="radio" id="status2" name="status" value="restocking">
                        <label for="status2">กำลังเติม</label>
                      </div>
                      <div>
                        <input type="radio" id="status3" name="status" value="outofstock">
                        <label for="status3">หมด</label>
                      </div>
                    </div>
                    <div class="btns">
                    <button type=button id="edit-status" name="edit-status" class="cancel-btn" data-bs-dismiss="modal"> 
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-ban mr-1">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="m4.9 4.9 14.2 14.2" />
                                </svg>ยกเลิก
                        </button>
                      <button type=submit id="edit-status" name="edit-status" class="confirm-btn">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-check-circle mr-1">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="m9 11 3 3L22 4" />
                            </svg>ยืนยัน
                        </button>
                      
                        
                    </div>
                  </form>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>
    <style>
      
    </style>
</body>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const editButtons = document.querySelectorAll('.button-edit');
    editButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        const menu_id = document.getElementById("menu_id");
        const editHeader = document.getElementById("editHeader");
        const available = document.getElementById("status1");
        const restocking = document.getElementById("status2");
        const empty = document.getElementById("status3");
        let menuId = button.getAttribute('data-menu-id');

        let menu_details = <?php echo json_encode($menu_details) ?>;
        editHeader.textContent = menu_details[menuId]["name"];
        let menu_status = menu_details[menuId]["status"];
        if(menu_status === "instock"){
          available.setAttribute("checked", true);
          restocking.setAttribute("checked", false);
          empty.setAttribute("checked", false);
        }
        if(menu_status === "restocking"){
          available.setAttribute("checked", false);
          restocking.setAttribute("checked", true);
          empty.setAttribute("checked", false);
        }
        if(menu_status === "outofstock"){
          available.setAttribute("checked", false);
          restocking.setAttribute("checked", false);
          empty.setAttribute("checked", true);
        }

        
        menu_id.value = menuId;

        let editModal = new bootstrap.Modal(document.getElementById('editMenuModal'));
        editModal.show();
      });
    });
  })

</script>

</html>