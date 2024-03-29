<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
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

    if (!isset($_SESSION['username']) or $_SESSION['role'] !== "receptionist") {
        header("Location: /WhatsUpShabu/staff/login/index.php");
        exit();
    }

    require_once('../../utils/config.php');
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $table_id = $_GET["id"];

    ?>

    <div class="w-sreen h-screen flex justify-center flex-col">
    <div
        class="flex w-full items-center justify-center bg-[#ffffff6f]">
        <div class="w-[30%] h-fit bg-white  rounded-lg shadow-lg p-6">
            <div class="w-full flex justify-center border-b-2 border-gray-200 pb-4">
                <h1 class="text-xl font-bold justify-self-center">เพิ่มลูกค้า</h1>
            </div>
            <div class="pt-4">
                <form action="../action.php" id="addCustomerForm" method="get"
                    class="max-w-sm mx-auto flex flex-col justify-between text-lg gap-2">
                    <div class="flex justify-between">
                        <p>โต๊ะ</p>
                        <p id="table-id" name="table-id">
                            <?php echo $table_id ?>
                        </p>
                        <input value=<?php echo $table_id ?> name="table_id" class="hidden">
                    </div>
                    <div class="flex justify-between items-center">
                        <label for="customer_amount" class="block mb-2 text-gray-900">จำนวนลูกค้า</label>
                        <select id="customer_amount" name="customer_amount"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-1.5">
                            <option selected value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="flex justify-between text-black items-center text-center">
                        <label for="promotion">โปรโมชั่น</label>
                        <select id="promotion" name="promotion"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-1.5">
                            <?php
                            $sql = "SELECT * FROM promotion WHERE `status`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row["ID"];
                                $name = $row["name"];
                                echo "<option value='$id'>$name</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="flex w-full justify-center gap-2">
                        <a href="../ManageTable"><button type="button" id="cancel"
                                class="flex items-center gap-1 text-white bg-[#FA5D2A] hover:bg-[#fa5e2abe] px-2 py-2 rounded"
                                name="cancel">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-ban mr-1">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="m4.9 4.9 14.2 14.2" />
                                </svg>ยกเลิก</button>
                        </a>
                        <button type="submit" id="submit"
                            class="flex items-center gap-1 bg-[#009179] hover:bg-[#009179c2] text-white py-2 px-2 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-check-circle mr-1">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="m9 11 3 3L22 4" />
                            </svg>
                            ยืนยัน
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
            
    </div>
</body>
</html>