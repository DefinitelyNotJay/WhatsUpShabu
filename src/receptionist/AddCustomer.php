<?php
    $data = $_POST['data'];
    echo $data;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../output.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    echo <<<HTML
             <div id="modal"
            class="fixed flex items-center justify-center top-0 right-0 left-0 z-50 inset-0 overflow-y-auto bg-[#ffffff6f]">
            <div class="w-[30%] h-fit bg-white  rounded-lg shadow-lg p-6">
                <div class="w-full grid grid-cols-3 grid-rows-1 border-b-2 border-gray-200 pb-4">
                    <div></div>
                    <h1 class="text-xl font-bold justify-self-center">เพิ่มลูกค้า</h1>
                    <button id="closeModal"
                        class="text-gray-400 hover:text-gray-600 focus:outline-none justify-self-end">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="pt-4">
                    <form class="max-w-sm mx-auto flex flex-col justify-between text-lg gap-2">
                        <div class="flex justify-between">
                            <p>โต๊ะ</p>
                            <p id="table-no">1</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <label for="customer_amount" class="block mb-2 text-gray-900">จำนวนลูกค้า</label>
                            <select id="customer_amount"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-1.5">
                                <option selected value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="flex justify-between text-black items-center text-center">
                            <label for="underline_select">โปรโมชั่น</label>
                            <select id="underline_select"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-1.5">
                                <option value="none" selected>ไม่มี</option>
                                <option value="2">โปรโมชั่น 1</option>
                                <option value="3">โปรโมชั่น 2</option>
                                <option value="4">โปรโมชั่น 3</option>
                            </select>
                        </div>
                    </form>
                </div>
        HTML;
    ?>
</body>

</html>