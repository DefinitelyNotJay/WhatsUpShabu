<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../utils/main.css">
    <link rel="stylesheet" href="../utils/output.css">
</head>

<body>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Noto Sans Thai", sans-serif;
        }
    </style>
    <?php
    require_once("../utils/config.php");
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $id = isset($_GET["table_id"]) ? $_GET["table_id"] : null;
    if ($id) {
        echo "<script>console.log('" . $id . "')</script>";
        $sql = "SELECT * FROM bill JOIN tables JOIN promotion ON bill.table_id = tables.id AND bill.promotion_id = promotion.id  WHERE tables.status = 'busy' AND tables.id = '$id'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        // table_id, customer_amount, ราคาต่อหัว, total_amount, ส่วนลดจากโปรโมชั่น, ยอดรวมสุทธิ
        while ($row = mysqli_fetch_assoc($result)) {
            $table_id = $row["id"];
            $customer_amount = $row["customer_amount"];
            $promotion_name = $row["name"];
            $total = $row["total"];
            $discount_percent = $row["discount"];
        }
        $all_cost = 299 * $customer_amount;
        $promotion_discount = abs($total - $all_cost);
    }
    ?>

    <div id="modal"
        class="fixed flex items-center justify-center top-0 right-0 left-0 z-50 inset-0 overflow-y-auto bg-[#ffffff6f]">
        <div class="w-[30%] h-fit bg-white  rounded-lg shadow-lg p-6">
            <div class="w-full grid grid-cols-3 grid-rows-1 border-b-2 border-gray-200 pb-4">
                <div></div>
                <h1 class="text-xl font-bold justify-self-center">เลขที่ใบเสร็จ</h1>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600 focus:outline-none justify-self-end">
                    
                </button>
            </div>

            <div class="pt-4 flex flex-col gap-y-6">
                    <div class="flex flex-col gap-2">
                    <div class="flex justify-between">
                        <p>โต๊ะ</p>
                        <?php
                        echo '<p id="table-id" name="table-id">'.$table_id.'</p>';
                        echo '<input value='. $table_id .' name="table_id" class="hidden">';
                        ?>
                    </div>
                    <div class="flex justify-between items-center">
                        
                        <p>จำนวนลูกค้า</p>
                        <p><?php echo $customer_amount?> คน</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p>ราคาต่อหัว</p>
                        <p>299 บาท</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p>ราคารวม</p>
                        <p><?php echo $all_cost?> บาท</p>
                    </div>
                    <div class="flex justify-between text-black items-center text-center">
                        <p>โปรโมชั่น</p>
                        <p><?php echo $promotion_name?></p>
                    </div>
                    <div class="flex justify-between text-black items-center text-center">
                        <p>ส่วนลดจากโปรโมชั่น</p>
                        <p><?php echo $promotion_discount?> บาท</p>
                    </div>
                    </div>
                    <div class="flex flex-col gap-2 text-black ">
                        <div class="flex justify-between">
                        <p>ยอดรวมสุทธิ</p>
                        <p><?php echo $total?> บาท</p>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="flex w-full justify-center gap-2">
                        <button type="button" id="cancel" class="btn btn-outline-danger">ยกเลิก</button>
                        <?php
                            echo '<button type="submit" id="submit" class="btn btn-outline-primary" tableId='.$table_id.' >ยืนยัน</button>';
                        ?>
                        
                    </div>
                
            </div>

</body>
<script>
    let submitBtn = document.getElementById("submit");
let cancelBtn = document.getElementById("cancel");

cancelBtn.addEventListener("click", (e) => {
    e.preventDefault();
    window.location.href = "ManageTable.php";
})

submitBtn.addEventListener("click", (e)=>{
    let id = e.target.getAttribute("tableId");
    alert(id);
    window.location.href = `action.php?paymentId=` + id;
})

</script>
    
</html>