<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../utils/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    <style>
        * {
            font-family: "Noto Sans Thai", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .bg-login {
            background-image: url('./img/Jane-Chang.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
<body>
    <div class="flex w-screen h-screen">
        <div class="w-6/12 bg-main">
            <div class="w-full h-full bg-login"></div>
        </div>
        <div class="flex flex-col w-6/12 bg-[#f5f1de] h-full justify-center items-center">
            <div class=" w-full flex flex-col justify-center items-center gap-y-4">
                <div>
                    <img src="./img/icon.png" alt="WhatsUpShabuIcon">
                </div>
                <div class="w-full flex flex-col justify-center items-center">
                    <form id="loginForm" action="routes.php" method="post" class="w-4/12">
                        <div class="flex flex-col gap-3">
                            <div class="flex flex-col gap-y-1">
                                <label for="username">ชื่อผู้ใช้</label>
                                <input type="text" placeholder="กรอกชื่อผู้ใช้" id="username" name="username"
                                    aria-describedby="emailHelp" class="px-4 py-2 rounded-md">
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <label for="passed">รหัสผ่าน</label>
                                <input type="password" placeholder="กรอกรหัสผ่าน" id="passwd" name="passwd"
                                    class="px-4 py-2 rounded-md">
                            </div>
                        </div>
                        <div class="flex gap-1 justify-end">
                            <input type="checkbox" class="accent-[#f6851f]" onchange="showPass()" id="showPassword">
                            <label class="form-check-label my-2 text-sm ">แสดงรหัสผ่าน</label>
                        </div>
                        <button type="submit"
                            class="anim-dr text-center bg-[#f6851f] hover:bg-slate-700 hover:text-white text-white w-full rounded-md my-2 py-2">เข้าสู่ระบบ</button>

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
    </script>
</body>

</html>