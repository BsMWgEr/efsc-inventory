<?php
require 'auth.php';
checkAccess(['superAdmin', 'admin', 'staff']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/navbar.css">
    <style>

        body {
            background-color: #32635f;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin: 0;
        }

        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;;
        }

        footer {
            text-align: center;
            background: white;
            color: #32635f;
            width: 100%;
            padding: 10px;
            font-size: 1.5em;
            margin-top:100px;
            position: fixed;
            bottom: 0;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0; /* Start with 0 opacity */
            }
            100% {
                opacity: 1; /* End with full opacity */
            }
        }

        .found-items {
            background-color: #000000;
            color: #ffffff;
            padding: 10px;
            margin: 10px;
            border-radius: 10px;
            opacity: 0;
            animation: fadeIn 1s ease-in-out forwards;
        }

        .search-results {
            width: 50%;
            z-index: 0;
        }

        .search-div {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: black;
            border-radius: 10px;
            padding: 10px;
            margin: 10px;
            border: white 1px solid;
            box-shadow: 0 0 5px white;
            width: 50%;
            position: sticky;
            top: 100px;
            background: #32635F;
            z-index: 10;
        }

        #search-input {
            font-size: 16pt;
            border-radius: 50px;
            padding: 5px;
            border: none;
            background: white;
            opacity: .5;
            color: black;
            text-align: center;
        }

        @keyframes spinPause {
            0% { transform: rotate(0deg); }
            80% { transform: rotate(360deg); } /* Spin fast within 80% of the cycle */
            100% { transform: rotate(-360deg); } /* Pause at the final position */
        }

        .spin-image {
            width: 150px; /* Adjust size as needed */
            height: 150px;
            animation: spinPause 3s linear infinite; /* 2s spin + 1s pause */
            margin-top: 100px;
            transition: 1s;
        }


        .move-to-corner {
            opacity: 0;
            width: 0;
            height: 0;
            transition: 1s;
        }

        .ball {
            width: 50px;
            height: 50px;
            background-color: red;
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 0;
        }

    </style>
    <title>Search</title>
</head>
<body class="container">
<?php include 'navbar.php'; ?>
<main>


<div class="search-div">
    <p>Search by barcode</p>
    <form class="search-form" id="search-form">
        <input id="search-input" type="text" name="searchKey" placeholder="Search..." onkeyup="search()">
    </form>

</div>
<img id="image" class="spin-image" src="/assets/search-icon-png-9976.png" alt="searching" style="margin-top: 100px">
    <div id="search-results" class="search-results" ></div>
<footer>Cyber Range</footer>
</main>
<script src="/javascript/nav-menu.js" type="text/javascript"></script>
<script>
    async function search() {
        if (document.getElementById('search-form').searchKey.value === '') {
            document.getElementById('search-results').innerHTML = ''
            document.getElementById('image').classList.remove("move-to-corner");
            return
        }
        document.getElementById('search-results').innerHTML = ''
        const response = await fetch('/search-data/', {
            method: 'POST',
            body: new FormData(document.getElementById('search-form'))
        })
        const data = await response.json()
        let img = document.getElementById("image");
        img.classList.add("move-to-corner");
        console.log(data)
        for (let i = 0; i < data.length; i++) {
            let div = `<div class="found-items">`
            for (let key in data[i]) {
                div += `<p>${key}: ${data[i][key]}</p>`
            }
            div += '</div>'
            document.getElementById('search-results').innerHTML += div
        }
    }

    // const container = document.querySelector(".container");
    // const numBalls = 5; // Number of balls
    // const ballSize = 40;
    // const containerSize = 1000;
    //
    // const balls = [];
    //
    // // Function to generate a random number within a range
    // function random(min, max) {
    //     return Math.random() * (max - min) + min;
    // }
    //
    // // Function to detect collision between two balls
    // function checkCollision(ball1, ball2) {
    //     let dx = ball1.x - ball2.x;
    //     let dy = ball1.y - ball2.y;
    //     let distance = Math.sqrt(dx * dx + dy * dy);
    //     return distance < ballSize; // Collision if distance is less than the ball size
    // }
    //
    // // Function to handle elastic collision between two balls
    // function resolveCollision(ball1, ball2) {
    //     // Swap velocities for a basic collision effect
    //     let tempDx = ball1.dx;
    //     let tempDy = ball1.dy;
    //     ball1.dx = ball2.dx;
    //     ball1.dy = ball2.dy;
    //     ball2.dx = tempDx;
    //     ball2.dy = tempDy;
    // }
    //
    // // Create multiple balls
    // for (let i = 0; i < numBalls; i++) {
    //     let ball = document.createElement("div");
    //     ball.classList.add("ball");
    //
    //     // Assign random colors
    //     ball.style.backgroundColor = `hsl(${Math.random() * 360}, 80%, 50%)`;
    //
    //     // Ensure balls don’t overlap initially
    //     let x, y, isOverlapping;
    //     do {
    //         x = random(0, containerSize - ballSize);
    //         y = random(0, containerSize - ballSize);
    //         isOverlapping = balls.some(b => checkCollision({ x, y }, b));
    //     } while (isOverlapping);
    //
    //     // Assign random speed and direction
    //     let dx = random(1, 3) * (Math.random() < 0.5 ? 1 : -1);
    //     let dy = random(1, 3) * (Math.random() < 0.5 ? 1 : -1);
    //
    //     container.appendChild(ball);
    //     balls.push({ ball, x, y, dx, dy });
    // }
    //
    // function moveBalls() {
    //     for (let i = 0; i < balls.length; i++) {
    //         let ball1 = balls[i];
    //
    //         // Move the ball
    //         ball1.x += ball1.dx;
    //         ball1.y += ball1.dy;
    //
    //         // Bounce off walls
    //         if (ball1.x + ballSize > containerSize || ball1.x < 0) ball1.dx *= -1;
    //         if (ball1.y + ballSize > containerSize || ball1.y < 0) ball1.dy *= -1;
    //
    //         // Check collision with other balls
    //         for (let j = i + 1; j < balls.length; j++) {
    //             let ball2 = balls[j];
    //             if (checkCollision(ball1, ball2)) {
    //                 resolveCollision(ball1, ball2);
    //             }
    //         }
    //
    //         // Update position
    //         ball1.ball.style.left = `${ball1.x}px`;
    //         ball1.ball.style.top = `${ball1.y}px`;
    //     }
    //
    //     requestAnimationFrame(moveBalls);
    // }
    //
    // moveBalls(); // Start the animation
</script>
</body>


</html>