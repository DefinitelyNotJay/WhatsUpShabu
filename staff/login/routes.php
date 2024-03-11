<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes</title>
</head>

<body>
    <?php
    // 1. Connect to Database 
    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('../../utils/WhatsUpShabu.db');
        }
    }

    // 2. Open Database 
    $db = new MyDB();
    if (!$db) {
        echo $db->lastErrorMsg();
    } else {
        echo "Opened database successfully<br>";
    }

    // 3. Query Execution
    // SQL Statements
    

    // 4. Close database
    
    $username = $_POST['username'];
    $password = $_POST['passwd'];
    // $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    $errors = array();

    $login_sql = "SELECT * FROM personnel WHERE `username` = '$username' AND `password` = '$password'";
    $result = $db->query($login_sql);
    $num_rows = 0;
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $num_rows++;
        $role = $row['role'];
        $name = $row['name'];
    }

    if ($num_rows <= 0) {
        $username = $_POST['username'];
        $password = $_POST['passwd'];
        header("Location: index.php");
    } else {
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["role"] = $role;
        $_SESSION["name"] = $name;

        if ($role === "receptionist") {
            header("Location: /WhatsUpShabu/receptionist/ManageTable");
        } elseif ($role === "waiter") {
            header("Location: /WhatsUpShabu/waiter/function/ordermanage.php");
        } elseif ($role === "manager") {
            header("Location: /WhatsUpShabu/Manager/ViewStatistics");

        }
    }

    ?>
</body>

</html>