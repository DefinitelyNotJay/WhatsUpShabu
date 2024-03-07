<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../utils/main.css">
    <link rel="stylesheet" href="../utils/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            font-family: "Noto Sans Thai", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .bg-login {
            background-image: url('Jane-Chang.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            /* filter: blur(1px);
            -webkit-filter: blur(1px); */
        }

        body {
            width: 100vw;
            height: 100vh;
            /* display: flex;
            align-items: center;
            justify-content: center; */
            margin: 0;
        }

        .container-main {
            width: 35%;
        }

        .flex-cen {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 75px;
        }

        .flex-right {
            display: flex;
            align-items: center;
            justify-content: right;
        }

        .w-half {
            width: 50%;
        }

        .flex {
            display: flex;
        }

        .w-full {
            width: 100%;
        }

        .h-full {
            height: 100%;
        }

        .bg-main {
            background: #EEE8C8;
        }
    </style>
</head>

<body>
    <div class="flex w-full h-full">
        <div class="flex w-half justify-center items-center bg-login">
        </div>
        <div class="flex flex-col w-half bg-main h-full justify-center items-center">
            <div class="container-main">
                <div class="flex-cen">
                    <img src="icon.png" alt="WhatsUpShabuIcon">
                </div>
                <div>
                    <form id="loginForm" action="routes.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">ชื่อผู้ใช้</label>
                            <input type="text" placeholder="กรอกชื่อผู้ใช้" class="form-control" id="username"
                                name="username" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="passed" class="form-label">รหัสผ่าน</label>
                            <input type="password" placeholder="กรอกรหัสผ่าน" class="form-control" id="passwd"
                                name="passwd">
                        </div>
                        <div class="mb-3 form-check">
                            <label class="form-check-label" for="">แสดงรหัสผ่าน</label>
                            <input type="checkbox" class="form-check-input" onchange="showPass()" id="showPassword">
                        </div>
                        <div class="flex-right">
                            <button type="submit"
                                class="bg-orange-500 hover:bg-orange-700 text-white font-regular py-2 px-4 rounded-full">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showPass() {
            let passwordInput = document.getElementById("passwd");
            let checkbox = document.getElementById("showPassword");

            if (checkbox.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }

        const checkValidation = () => {

        }
    </script>
</body>

</html>