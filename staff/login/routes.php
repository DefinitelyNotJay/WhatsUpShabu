<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes</title>
</head>
<body>
    <?php
        include_once("../../utils/config.php");
        $username = $_POST['username'];
        $password = $_POST['passwd'];
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        $errors = array();

        $login_sql = "SELECT * FROM personnel WHERE `username` = '$username' AND `password` = '$password'";
        $result = mysqli_query($conn, $login_sql);
        while ($row = mysqli_fetch_assoc($result)){
            $role = $row['role'];
            $name = $row['name'];
        }
        if(!($result -> num_rows > 0)){
            $username = $_POST['username'];
            $password = $_POST['passwd'];
            header("Location: index.php");
        } else {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["role"] = $role;
            $_SESSION["name"] = $name;

            if($role === "receptionist"){
                header("Location: /WhatsUpShabu/receptionist/ManageTable");
            } elseif($role === "waiter"){
                header("Location: /WhatsUpShabu/waiter/function/ordermanage.php");
            } elseif($role === "manager"){
                header("Location: /WhatsUpShabu/Manager/ViewStatistics");
                
            }
        }

    ?>
</body>
</html>