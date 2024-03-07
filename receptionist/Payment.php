<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
    session_start();
    require_once("../utils/config.php");
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $id = $_GET["table_id"];
    $sql = "SELECT * FROM bill JOIN tables JOIN promotion ON bill.table_id = tables.id AND bill.promotion_id = promotion.id  WHERE tables.status = 'busy' AND tables.id = '$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $table_id = $row["id"];
        $customer_amount = $row["customer_amount"];
        $promotion_name = $row["name"];
        $total = $row["total"];
        $discount_percent = $row["discount"];
    }
    $all_cost = 299 * $customer_amount;
    $promotion_discount = abs($total - $all_cost);
    ?>

    <div
        class="flex h-screen items-center justify-center bg-[#ffffff6f] ">
        <div class="w-[30%] bg-white  rounded-lg shadow-lg p-6">
            <div class="w-full flex justify-center border-b-2 border-gray-200 pb-4">
                <h1 class="text-xl font-bold">ใบเสร็จ
                    <?php echo $table_id ?>
                </h1>
            </div>

            <div class="pt-4 flex flex-col gap-y-6">
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between">
                        <p>โต๊ะ</p>
                        <p id="table-id" name="table-id">
                            <?php echo $table_id ?>
                        </p>
                        <input value=<?php echo $table_id ?> name="table_id" class="hidden">
                    </div>
                    <div class="flex justify-between items-center">
                        <p>จำนวนลูกค้า</p>
                        <p>
                            <?php echo $customer_amount ?> คน
                        </p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p>ราคาต่อหัว</p>
                        <p>299 บาท</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p>ราคารวม</p>
                        <p>
                            <?php echo $all_cost ?> บาท
                        </p>
                    </div>
                    <div class="flex justify-between text-black items-center text-center">
                        <p>โปรโมชั่น</p>
                        <p>
                            <?php echo $promotion_name ?>
                        </p>
                    </div>
                    <div class="flex justify-between text-black items-center text-center">
                        <p>ส่วนลดจากโปรโมชั่น</p>
                        <p>
                            <?php echo $promotion_discount ?> บาท
                        </p>
                    </div>
                </div>
                <div class="flex flex-col gap-2 text-black ">
                    <div class="flex justify-between">
                        <p>ยอดรวมสุทธิ</p>
                        <p>
                            <?php echo $total ?> บาท
                        </p>
                    </div>
                    <hr>
                </div>

                <div class="flex w-full justify-center gap-2">
                    <a href="ManageTable.php">
                        <button type="button" id="cancel"
                            class="flex items-center gap-1 text-white bg-[#FA5D2A] hover:bg-[#fa5e2abe] px-2 py-2 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-ban mr-1">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m4.9 4.9 14.2 14.2" />
                            </svg>
                            ยกเลิก
                        </button>
                    </a>

                    <a href="action.php?paymentId=<?php echo $table_id ?>">
                        <button type="submit" id="confirm"
                            class="flex items-center gap-1 bg-[#009179] hover:bg-[#009179c2] text-white py-2 px-2 rounded"
                            tableId=<?php echo $table_id ?>>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-check-circle mr-1">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="m9 11 3 3L22 4" />
                            </svg>
                            ยืนยัน
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>