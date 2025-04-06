<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden; /* Prevent scrolling */
            background-color: black;
        }

        #boss {
            width: 100px;
            height: 100px;
            background-image: url(images/boss1.gif);
            background-size: cover;
            position: absolute;
        }

        #player {
            width: 50px;
            height: 50px;
            background-color: blue;
            position: absolute;
        }

        .obstacle {
            width: 50px;
            height: 50px;
            background-color: green;
            position: absolute;
        }

        .movingObstacle {
            width: 100px;
            height: 100px;
            background-color: orange;
            position: absolute;
        }

        #healthBar {
            width: 100%;
            height: 20px;
            background-color: red;
            position: absolute;
            top: 0;
            left: 0;
        }
        .blink_me {
            animation: blinker 1s linear infinite;
            color: red;
        }

        @keyframes blinker {
            50% {
            opacity: 0;
            }
        }
    </style>
    <title>Boss Fight</title>
</head>
<body>
<h1 class="blink_me" id="tip">Klikaj, na bossa, nie spodziewa się tego...</h1>
<div id="boss"></div>
<div id="player"></div>
<div class="obstacle" style="top: 200px; left: 300px;"></div>
<div class="obstacle" style="top: 400px; left: 100px;"></div>
<div class="obstacle" style="top: 200px; left: 300px;"></div>
<div class="obstacle" style="top: 400px; left: 100px;"></div>
<div class="obstacle" style="top: 200px; left: 300px;"></div>
<div class="obstacle" style="top: 400px; left: 100px;"></div>
<div class="obstacle" style="top: 200px; left: 300px;"></div>
<div class="obstacle" style="top: 400px; left: 100px;"></div>
<div class="obstacle" style="top: 200px; left: 300px;"></div>
<div class="obstacle" style="top: 400px; left: 100px;"></div>
<div class="obstacle" style="top: 200px; left: 300px;"></div>
<div class="obstacle" style="top: 400px; left: 100px;"></div>
<div class="obstacle" style="top: 200px; left: 300px;"></div>
<div class="obstacle" style="top: 400px; left: 100px;"></div>
<div class="obstacle" style="top: 200px; left: 300px;"></div>
<div class="obstacle" style="top: 400px; left: 100px;"></div>
<div class="obstacle" style="top: 200px; left: 300px;"></div>
<div class="obstacle" style="top: 400px; left: 100px;"></div>
<div class="obstacle" style="top: 200px; left: 300px;"></div>
<div class="obstacle" style="top: 400px; left: 100px;"></div>
<div class="movingObstacle"></div>
<div class="movingObstacle"></div>
<div class="movingObstacle"></div>
<div id="healthBar"></div>

<script>
    // Elementy
    const boss = document.getElementById('boss');
    const player = document.getElementById('player');
    const obstacles = document.querySelectorAll('.obstacle');
    const movingObstacles = document.querySelectorAll('.movingObstacle');
    const healthBar = document.getElementById('healthBar');
    $victories = 0;
    
    // HP
    let bossHealth = 200;
    let playerHealth = 200;

    // Damage
    const playerDamage = 10;
    const obstacleDamage = 5; 
    const movingobstacleDamage = 9.5;
    

    // if($victories==0){
        $obstacleSpeedX = [5, -3, 7]; // Adjust the speeds
        $obstacleSpeedY = [3, 6, -4]; // Adjust the speeds
    // }
    // if($victories==1){
    //     $obstacleSpeedX = [10, 2, 12]; // Adjust the speeds
    //     $obstacleSpeedY = [8, 11, 1]; // Adjust the speeds
    // }
    // if($victories==2){
    //     $obstacleSpeedX = [15, 7, 17]; // Adjust the speeds
    //     $obstacleSpeedY = [13, 16, 6]; // Adjust the speeds
    // }
    // if($victories==3){
    //     $obstacleSpeedX = [20, 12, 22]; // Adjust the speeds
    //     $obstacleSpeedY = [18, 21, 11]; // Adjust the speeds
    // }
    // if($victories==4){
    //     $obstacleSpeedX = [25, 17, 27]; // Adjust the speeds
    //     $obstacleSpeedY = [23, 26, 16]; // Adjust the speeds
    // }
    boss.addEventListener('click', () => {
        bossHealth -= playerDamage;
        if (bossHealth <= 0) {
            $victories += 1;
            resetGame();
        }
    });

    inf = sessionStorage.getItem("bi");
    if(inf == 1){
        playerHealth = 9999999999999;
    }else{
        playerHealth = 200;        
    }

    function resetGame() {
        
        bossHealth = 100; //do testu dej 10

        $obstacleSpeedX = [5, -3, 7]; // Adjust the speeds
        $obstacleSpeedY = [3, 6, -4];

        // Randomly position the boss
        const bossX = Math.random() * (window.innerWidth - boss.offsetWidth);
        const bossY = Math.random() * (window.innerHeight - boss.offsetHeight);
        boss.style.left = bossX + 'px';
        boss.style.top = bossY + 'px';

        // Randomly position the player
        const playerX = Math.random() * (window.innerWidth - player.offsetWidth);
        const playerY = Math.random() * (window.innerHeight - player.offsetHeight);
        player.style.left = playerX + 'px';
        player.style.top = playerY + 'px';

        // Randomly position the obstacles
        obstacles.forEach(obstacle => {
            obstacle.style.left = Math.random() * (window.innerWidth - obstacle.offsetWidth) + 'px';
            obstacle.style.top = Math.random() * (window.innerHeight - obstacle.offsetHeight) + 'px';
        });

        // Position the moving obstacles in random locations
        movingObstacles.forEach(obstacle => {
            obstacle.style.left = Math.random() * (window.innerWidth - obstacle.offsetWidth) + 'px';
            obstacle.style.top = Math.random() * (window.innerHeight - obstacle.offsetHeight) + 'px';
        });

        updateHealthBar();
        if($victories==0){
            document.getElementById("tip").innerHTML = "Klikaj, na bossa, nie spodziewa się tego...";
            document.getElementById("boss").style.backgroundImage = "url(images/boss1.gif)";
        }
        if($victories==1){
            document.getElementById("tip").innerHTML = "Pokonaj programiste 5 razy, a serwery padną.";
            document.getElementById("boss").style.backgroundImage = "url(images/boss2.gif)";
            createAdditionalObstacles($victories);
            $obstacleSpeedX = [5 + $victories * 2, -3 - $victories * 2, 7 + $victories * 2];
            $obstacleSpeedY = [3 + $victories * 2, 6 + $victories * 2, -4 - $victories * 2]; 
        }
        if($victories==2){
            document.getElementById("tip").innerHTML = "Po pojawieniu, masz kilka sekund ochrony.";
            createAdditionalObstacles($victories);
            document.getElementById("boss").style.backgroundImage = "url(images/boss3.gif)";
            $obstacleSpeedX = [5 + $victories * 2, -3 - $victories * 2, 7 + $victories * 2];
            $obstacleSpeedY = [3 + $victories * 2, 6 + $victories * 2, -4 - $victories * 2];
        }
        if($victories==3){
            document.getElementById("tip").innerHTML = "";
            document.getElementById("boss").style.backgroundImage = "url(images/boss4.gif)";
            createAdditionalObstacles($victories);
            $obstacleSpeedX = [5 + $victories * 2, -3 - $victories * 2, 7 + $victories * 2];
            $obstacleSpeedY = [3 + $victories * 2, 6 + $victories * 2, -4 - $victories * 2];
        }
        if($victories==4){
            document.getElementById("boss").style.backgroundImage = "url(images/boss5.gif)";
            createAdditionalObstacles($victories);
            $obstacleSpeedX = [25, 17, 27]; // Adjust the speeds
            $obstacleSpeedY = [23, 26, 16]; // Adjust the speeds
        }
        if($victories==5){
            window.location.href = "theend.php";
        }
        updateHealthBar();
    }

    function updateHealthBar() {
        healthBar.style.width = (playerHealth > 0 ? playerHealth : 0) + '%';
    }

    window.addEventListener('keydown', (event) => {
        const speed = 25;
        const playerRect = player.getBoundingClientRect();
        let playerNewTop = playerRect.top;
        let playerNewLeft = playerRect.left;

    switch (event.key) {
        case 'ArrowUp':
            playerNewTop = Math.max(0, playerRect.top - speed);
            break;
        case 'ArrowDown':
            playerNewTop = Math.min(window.innerHeight - playerRect.height, playerRect.top + speed);
            break;
        case 'ArrowLeft':
            playerNewLeft = Math.max(0, playerRect.left - speed);
            break;
        case 'ArrowRight':
            playerNewLeft = Math.min(window.innerWidth - playerRect.width, playerRect.left + speed);
            break;
    }

        player.style.top = playerNewTop + 'px';
        player.style.left = playerNewLeft + 'px';

        // kolizja z bossem
        const bossRect = boss.getBoundingClientRect();
        if (
            playerRect.right > bossRect.left &&
            playerRect.left < bossRect.right &&
            playerRect.bottom > bossRect.top &&
            playerRect.top < bossRect.bottom
        ) {
            // przy kolizji, zmniejsza HP gracza
            playerHealth -= 10;
            updateHealthBar();
        }

        // Check for collision with obstacles
        obstacles.forEach(obstacle => {
            const obstacleRect = obstacle.getBoundingClientRect();
            if (
                playerRect.right > obstacleRect.left &&
                playerRect.left < obstacleRect.right &&
                playerRect.bottom > obstacleRect.top &&
                playerRect.top < obstacleRect.bottom
            ) {
                // Collision with obstacle, reduce player's health
                playerHealth -= 5;
                updateHealthBar();
            }
        });

        // Check for collision with moving obstacles
        movingObstacles.forEach(movingObstacle => {
            const movingObstacleRect = movingObstacle.getBoundingClientRect();
            if (
                playerRect.right > movingObstacleRect.left &&
                playerRect.left < movingObstacleRect.right &&
                playerRect.bottom > movingObstacleRect.top &&
                playerRect.top < movingObstacleRect.bottom
            ) {
                // Collision with moving obstacle, reduce player's health
                playerHealth -= movingobstacleDamage;
                updateHealthBar();
            }
        });

        // Check for lose condition
        if (playerHealth <= 0) {
            alert('Game Over! You lost.');
            $victories = 0;
            inf = sessionStorage.getItem("bi");
            if(inf == 1){
                playerHealth = 9999999999999;
            }else{
                playerHealth = 200;
            }
            resetGame();
        }
    });
    
    

        
    

    function createAdditionalObstacles(victories) {
        const numAdditionalObstacles = victories * 5; // Adjust the multiplier based on your desired difficulty scaling

        // Create additional obstacles
        for (let i = 0; i < numAdditionalObstacles; i++) {
            const obstacle = document.createElement('div');
            obstacle.className = 'obstacle';
            obstacle.style.top = Math.random() * (window.innerHeight - obstacle.offsetHeight) + 'px';
            obstacle.style.left = Math.random() * (window.innerWidth - obstacle.offsetWidth) + 'px';
            document.body.appendChild(obstacle);
        }
    }

    // function createAdditionalMovingObstacles(victories) {
    //     const numAdditionalMovingObstacles = victories * 2; // Adjust the multiplier based on your desired difficulty scaling

    // // Create additional moving obstacles
    //     for (let i = 0; i < numAdditionalMovingObstacles; i++) {
    //         const movingObstacle = document.createElement('div');
    //         movingObstacle.className = 'movingObstacle';
    //         movingObstacle.style.top = Math.random() * (window.innerHeight - movingObstacle.offsetHeight) + 'px';
    //         movingObstacle.style.left = Math.random() * (window.innerWidth - movingObstacle.offsetWidth) + 'px';
    //         document.body.appendChild(movingObstacle);
    //     }
    //     moveObstacles();
    // }

    

    function moveObstacles() {
        movingObstacles.forEach((obstacle, index) => {
            const obstacleRect = obstacle.getBoundingClientRect();
            // Calculate new position
            let newLeft = obstacleRect.left + $obstacleSpeedX[index];
            let newTop = obstacleRect.top + $obstacleSpeedY[index];

            // Check for collision with screen edges
            if (newLeft < 0 || newLeft + obstacleRect.width > window.innerWidth) {
                $obstacleSpeedX[index] = -$obstacleSpeedX[index]; // Reverse direction on collision with horizontal edges
            }

            if (newTop < 0 || newTop + obstacleRect.height > window.innerHeight) {
                $obstacleSpeedY[index] = -$obstacleSpeedY[index]; // Reverse direction on collision with vertical edges
            }

            // Update obstacle position
            obstacle.style.left = newLeft + 'px';
            obstacle.style.top = newTop + 'px';

            // Check for collision with the player
            const playerRect = player.getBoundingClientRect();
            if (
                playerRect.right > obstacleRect.left &&
                playerRect.left < obstacleRect.right &&
                playerRect.bottom > obstacleRect.top &&
                playerRect.top < obstacleRect.bottom
            ) {
                // Collision with moving obstacle, reduce player's health
                playerHealth -= obstacleDamage;
                updateHealthBar();
            }
        });

        // Repeat the movement after a short delay
        requestAnimationFrame(moveObstacles);

        // Check for lose condition
        if (playerHealth <= 0) {
            alert('Game Over! You lost.');
            $victories = 0;
            inf = sessionStorage.getItem("bi");
            if(inf == 1){
                playerHealth = 9999999999999;
            }else{
                playerHealth = 200;
            }
            resetGame();
        }
    }

    function menuscreen() {
            setTimeout(function() {
                sessionStorage.setItem("mainmenu", 3);
            },2000);
    }
    window.onload = menuscreen();

    // Start moving the obstacles
    moveObstacles();

    // Initial game setup
    resetGame();
</script>

</body>
</html>
