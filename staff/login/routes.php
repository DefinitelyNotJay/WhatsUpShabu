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
        echo $username;
        echo $password;

        $login_sql = "SELECT * FROM personnel WHERE `username` = '$username' AND `password` = '$password' ";
        $result = mysqli_query($conn, $login_sql);
        while ($row = mysqli_fetch_assoc($result)){
            $role = $row['role'];
        }
        if($result -> num_rows > 0){

            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            
            if($role === "receptionist"){
                header("Location: /WhatsUpShabu2/receptionist/ManageTable.php");
            } elseif($role === "waiter"){
                
            } elseif($role === "manager"){
                header("Location: /WhatsUpShabu2/Manager/ManageMenu/index.php");
            }
        } else {
            echo "username or password wrong!";
            header("Location: index.php");
        }

    ?>
</body>
</html>