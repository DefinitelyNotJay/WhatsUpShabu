<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table QR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
</head>
<style>
    * {
        font-family: "Noto Sans Thai", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-position: center;
        background-size: 100%;
        background-image: url("bg-scan.png");
    }
</style>

<?php
session_start();
if (!isset($_SESSION["username"]) or $_SESSION["role"] !== "receptionist") {
    header("Location: /WhatsUpShabu/staff/login");
}
?>

<body class="h-screen w-screen flex flex-col justify-center items-center">
    <div class="flex flex-col h-fit w-fit px-10 py-10 justify-center items-center bg-white gap-8 rounded-xl shadow-lg">
        <h1 class="text-2xl cursor-default">สแกนแล้วสั่งอาหารได้เลย !</h1>
        <?php
        require_once("../../utils/config.php");
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $table_id = $_GET["table_id"];
        $check_status_query = "SELECT * FROM tables WHERE id = '$table_id'";
        $result = mysqli_query($conn, $check_status_query);
        $customer_amount = $_GET["customer_amount"];
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];
        $start_time = $row["start_time"];

        date_default_timezone_set('Asia/Bangkok');
        $currentDateTime = date('Y-m-d H:i:s');
        $session_id = md5("$table_id/$currentDateTime");

        $sql_update = "UPDATE tables SET `start_time` = '$currentDateTime', `status` = 'busy', customer_amount = '$customer_amount', session_id = '$session_id' WHERE id = '$table_id'";
        $result2 = mysqli_query($conn, $sql_update);
        $url = 'http://localhost/WhatsUpShabu/customer/menu.php?table_id=' . $table_id . '&session_id=' . $session_id . '';
        echo "<p class='text-xl'>โต๊ะ $table_id</p>";
        echo "<a href='/WhatsUpShabu/customer/menu.php?table_id=$table_id&session_id=$session_id'><img class='h-[200px]' src='https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=http://localhost/WhatsUpShabu/customer/menu.php?table_id=$table_id&session_id=$session_id'></a><br>";

        if (isset($_GET["back"])) {
            header("Location: /WhatsUpShabu/receptionist/ManageTable");
        }
        ?>

        <form action="index.php">
            <button name="back" class="flex gap-1 text-xl hover:text-[#fa993e] hover:underline" type="submit"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-arrow-left">
                    <path d="m12 19-7-7 7-7" />
                    <path d="M19 12H5" />
                </svg> กลับไปหน้าหลัก</button>
        </form>
    </div>
</body>

</html>