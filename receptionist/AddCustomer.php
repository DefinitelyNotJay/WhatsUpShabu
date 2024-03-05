<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    echo $_SESSION["username"];
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    if ($id) {
        echo "<script>console.log('" . $id . "')</script>";
        $sql = "SELECT * FROM tables WHERE id = '{$id}';";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_assoc($result)) {
            $table_id = $row["id"];
        }
    }

    if(isset($_GET["cancel"])){
       header("Location: ManageTable.php");
    }
    ?>

    <div
        class="fixed flex items-center justify-center top-0 right-0 left-0 z-50 inset-0 overflow-y-auto bg-[#ffffff6f]">
        <div class="w-[30%] h-fit bg-white  rounded-lg shadow-lg p-6">
            <div class="w-full grid grid-cols-3 grid-rows-1 border-b-2 border-gray-200 pb-4">
                <div></div>
                <h1 class="text-xl font-bold justify-self-center">เพิ่มลูกค้า</h1>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600 focus:outline-none justify-self-end">
                    
                </button>
            </div>

            <div class="pt-4">
                <form action="action.php" id="addCustomerForm" method="get" class="max-w-sm mx-auto flex flex-col justify-between text-lg gap-2">
                    <div class="flex justify-between">
                        <p>โต๊ะ</p>
                        <?php
                        echo '<p id="table-id" name="table-id">'.$table_id.'</p>';
                        echo '<input value='. $table_id .' name="table_id" class="hidden">';
                        ?>
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
                            <option selected value='0'>ไม่มี</option>;
                            <?php
                            $sql = "SELECT id, `name` FROM promotion";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row["id"];
                                $name = $row["name"];
                                $percent_discount = $row["discount"];
                                echo "<option value='$id'>$name</option>";
                            }
                            ?>
                        </select>
                        </div>
                    <div class="flex w-full justify-center gap-2">
                        <a href="ManageTable.php"><button type="button" id="cancel" class="btn btn-outline-danger" name="cancel">ยกเลิก</button></a>
                        <?php
                            echo '<button type="submit" id="submit" tableId='.$table_id.' class="btn btn-outline-primary">ยืนยัน</button>';
                        ?>
                        
                    </div>
                </form>
            </div>

</body>
</html>