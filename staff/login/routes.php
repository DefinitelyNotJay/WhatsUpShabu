<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes</title>
</head>

<body>
    <?php
    session_start();
    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('../../utils/WhatsUpShabu.db');
        }
    }
    $db = new MyDB();
    if (!$db) {
        echo $db->lastErrorMsg();
    }

    $username = $_POST['username'];
    $password = $_POST['passwd'];
    $login_sql = "SELECT * FROM personnel WHERE `username` = '$username' AND `password` = '$password'";
    $result = $db->query($login_sql);
    $row = $result->fetchArray(SQLITE3_ASSOC);
    $role = $row['role'];
    $name = $row['name'];

    if (empty($name)) {
        header("Location: index.php");
    } else {
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["role"] = $role;
        $_SESSION["name"] = $name;

        if ($role === "receptionist") {
            header("Location: ../../receptionist/ManageTable/index.php");
        } elseif ($role === "waiter") {
            header("Location: ../../waiter/function/ordermanage.php");
        } elseif ($role === "manager") {
            header("Location: ../../Manager/ViewStatistics");
        }
    }
    ?>
</body>

</html>