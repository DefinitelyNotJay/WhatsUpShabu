<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        @keyframes fill {
            0% {
                background-position: 0px 140px;
            }

            20% {
                background-position: -450px 100px;
            }

            40% {
                background-position: -900px 50px;
            }

            80% {
                background-position: -1350px -40px;
            }

            100% {
                background-position: 0px 140px;
            }

        }

        @keyframes fadeIn {
    from {
        opacity: 0;  /* Start with opacity 0 */
    }
    to {
        opacity: 1;  /* End with opacity 1 */
    }
}

        body,
        html {
            height: 100%;
            margin: 0;
        }

        body {
            background-color: #FA5D2A;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 0;
            margin: 0;
            animation: fadeIn 1s ease-in-out forwards; /* Animation name, duration, timing function, and fill-mode */
        }

        .smoke {
            width: 120px;
            height: 120px;
            position: relative;
           top: -10%;
        }

        .cls-1 {
            fill: #fff;
    
        }

        .cup {
            height: 150px;
            width: 180px;
            top: 50%;
            border: 6px solid #FA5D2A;
            position: absolute;
            border-radius: 0px 0px 50px 50px;
            background-image: url(img/shabu.png);
            box-shadow: 0px 0px 0px 6px white;
            background-repeat: repeat-x;
            background-position: 0px 140px;
            animation: fill 5s infinite;
        }

        .handle-left {
            height: 40px;
            width: 20px;
            background-color: transparent;
            border: 6px solid white;
            position: relative;
            right: 21%;
            top: -5%;
            border-radius: 25px 0px 0px 80px;
        }

        .handle-right {
            height: 40px;
            width: 20px;
            background-color: transparent;
            border: 6px solid white;
            position: relative;
            left: 104%;
            top: -40%;
            border-radius: 0px 25px 80px 0px
        }
    </style>
</head>

<body>
    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 267.09 519.02" class="smoke">
        <path class="cls-1" d="m35.52,167.71C18.65,197.6-.3,228.68,0,263c.19,22.19,8.58,43.54,19.07,63.09,10.49,19.55,23.2,37.88,33.14,57.72,20.77,41.48,28.81,89.22,22.77,135.21,21.92-32.24,30.31-73.37,22.78-111.62-5.89-29.89-20.78-57.08-33.93-84.56s-24.95-56.82-23.9-87.26c.96-27.83,12.53-53.99,20.92-80.54,4.15-13.14,7.46-26.71,8.39-40.5.51-7.58,2.33-31.63-6.45-34.65.51,32.23-11.66,60.17-27.27,87.82Z" />
        <path class="cls-1" d="m127.38,353.16c-15.78-30.82-34.15-62.6-33.02-97.21,1.44-44.22,34.09-80.78,47.52-122.93,14.21-44.6,5.19-95.93-23.38-133.01,26.94,25.36,45.77,59.2,53.13,95.46,7.36,36.26,3.2,74.76-11.72,108.62-11.07,25.1-28.12,48.58-30.43,75.92-1.72,20.3,5,40.32,12.74,59.17,7.74,18.85,16.67,37.53,19.75,57.67,2.45,16.02,1.35,44.05-13.6,54.3-1.1-7.22,2.12-16.13,2.02-23.89-.11-8.55-1.45-17.04-3.5-25.33-4.21-17.03-11.53-33.18-19.5-48.75Z" />
        <path class="cls-1" d="m231.38,402.75c-5.16-16.02-15.41-29.82-25.28-43.45-9.87-13.63-19.73-27.81-23.92-44.12-7.75-30.17,5.2-61.67,20.76-88.66,15.55-26.99,34.38-53.26,39.87-83.92,4.95-27.62-1.99-57.17-18.71-79.7,20.76,18.82,35.23,44.46,40.6,71.96s1.62,56.7-10.53,81.95c-7.12,14.79-16.94,28.1-25.19,42.3-8.25,14.2-15.06,29.85-15.2,46.26-.15,17.43,7.18,33.97,14.75,49.67,7.57,15.7,15.65,31.7,17.2,49.06,1.26,14.14-3.22,35.83-17.51,42.58,6.43-14.35,8.09-28.61,3.15-43.94Z" />
    </svg>
    <div class="cup">
        <div class="handle-left"></div>
        <div class="handle-right"></div>
    </div>

    <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            // Set a timeout to redirect after 5 seconds
            setTimeout(function () {
                window.location.href = 'menu.php'; // Redirect to menu.php
            }, 4000); // 5000 milliseconds = 5 seconds
        });
    </script>

</body>

</html>