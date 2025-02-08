<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>

        body {
            margin: 0;
            background: black;
            color: white;
            font-family: Arial, sans-serif;
            overflow-x: hidden; /* Prevents horizontal scrolling */
        }

        canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            pointer-events: none; /* Ensures the canvas doesn't block clicks */
        }

        .content {
            position: relative;
            z-index: 1;
            text-align: center;
            font-size: 24px;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width:40%;
            margin-top: 10%;
            padding: 2%;
            background: rgba(0,0,0,.9);

        }

        form input {
            border: none;
            margin: 10px;
            font-size: 20pt;
            border-radius: 20px;
            text-align: center;
            background: black;
            color: green;
            box-shadow: 0 0 5px green;
            transition: .5s;
        }

        form button {
            border: none;
            background: black;
            color: green;
            padding: 10px;
            width: 50%;
            box-shadow: 0 0 5px green;
            border-radius: 20px;
            margin-top: 10px;
            transition: .5s;
        }

        form button:hover, form input:hover {
            background: green;
            color: black;
            transition: .5s;
        }

        .header {
            color: gray;
            background: rgba(0,0,0,.9);
            font-family: monospace;
        }

    </style>
    <title>Login</title>
</head>
<body>
<canvas id="matrixCanvas"></canvas>
<div class="content">
    <div class="header">
        <h1>Eastern Florida State College</h1>
        <h2>Center for Cybersecurity and Digital Forensics</h2>
    </div>

    <form action="/authenticate/" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <!-- Create extra content to allow scrolling

    <div style="height: 150vh;"></div>

    This ensures scrolling is possible -->
</div>

<script>
    const canvas = document.getElementById("matrixCanvas");
    const ctx = canvas.getContext("2d");

// Set canvas size to full window
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

// Matrix characters (Japanese Katakana + ASCII characters)
    const matrixChars = "アカサタナハマヤラワ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const fontSize = 18;
    const columns = Math.floor(canvas.width / fontSize);

// Create an array of Y positions for each column
    const drops = Array(columns).fill(0);

// Matrix effect function
    function drawMatrix() {
    // Fade out old characters (creates a trailing effect)
    ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Set text properties
    ctx.fillStyle = "#0F0"; // Neon green
    ctx.font = fontSize + "px monospace";

    // Loop through each column
    for (let i = 0; i < drops.length; i++) {
        const text = matrixChars[Math.floor(Math.random() * matrixChars.length)];
        ctx.fillText(text, i * fontSize, drops[i] * fontSize);

        // Reset drop position randomly to create continuous flow
        if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
            drops[i] = 0;
        }

        drops[i]++;
    }
}

// Redraw matrix every 50 milliseconds
setInterval(drawMatrix, 50);

// Adjust canvas size when window resizes
window.addEventListener("resize", () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
});

</script>
</body>
</html>