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
    <style>
        .bg-login{
            min-height: 100%;
            width: 100%;
            /* background-image: url('https://thumb.ac-illust.com/4c/4c635190a40b5947a0d4af3efd2adb73_w.jpeg'); */
            background: #FFF9DB;
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container{
            width: 40%;
        }
        .flex-cen{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 50px;
        }
        button{
            width: 20%;
        }
        .flex-right{
            display: flex;
            align-items: center;
            justify-content: right;
        }
    </style>
</head>
<body class="bg-login">
    <div class="container">
        <div class="flex-cen">
            <img src="icon.png" alt="WhatsUpShabuIcon">
        </div>
        <div class="">
            <form >
                <div class="mb-3">
                    <label for="userName" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwd">
                </div>
                <div class="mb-3 form-check">
                    <label class="form-check-label" for="">Show Password</label>
                    <input type="checkbox" class="form-check-input" onchange="showPass()" id="showPassword">
                </div>
                <div class="flex-right">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function showPass() {
            var passwordInput = document.getElementById("passwd");
            var checkbox = document.getElementById("showPassword");

            if (checkbox.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>
</html>