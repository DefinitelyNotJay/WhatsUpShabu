<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "WhatsUpShabu";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "";
    ?>

    <header class="header">
        <a href="menu.php">
            <img class="logo" src="img/Whatsup.png" alt="logo" width="50%" height="50%">
        </a>
    </header>

    <section class="status_section" id="status_section">

    </section>

    <section class="bottom_section">
        <button class="btn btn-cancel" onclick="window.location.href='menu.php'">
            <label>กลับสู่หน้าหลัก</label>
        </button>
    </section>

    <?php
    // close connection
    mysqli_close($conn);
    ?>
</body>

</html>