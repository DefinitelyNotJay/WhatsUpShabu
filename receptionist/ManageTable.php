<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tables</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../utils/main.css">
</head>
<style>
    * {
        font-family: "Noto Sans Thai", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .bg-primary,
    .bg-warning {
        padding: 0px;
    }
</style>

<body class="w-full vh-100">
    <div class="row h-100">
        <div class="col-2 h-100 bg-egg">
            <div class="d-flex flex-column h-100 w-100 text-black justify-content-between">
                <div>
                    <div class="bg-primary w-100 text-center">img</div>
                    <div class=" w-100">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link text-black d-flex align-items-center" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                                aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg> หน้าหลัก</a>
                            <a class="nav-link" href="#v-pills-profile"
                                aria-selected="false">Profile</a>
                            <a class="nav-link"  href="#v-pills-messages"
                                aria-selected="false">Messages</a>
                            <a class="nav-link"  href="#v-pills-settings"
                                aria-selected="false">Settings</a>
                        </div>
                    </div>
                </div>
                <div>
                    <p>ออกจากระบบ</p>
                </div>
            </div>

        </div>
        <div class="col-10 bg-warning">d</div>
    </div>
</body>

</html>