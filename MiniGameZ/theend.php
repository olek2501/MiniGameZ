<!DOCTYPE html>
<html lang="pl-PL">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0;
        background-color: black;
        background-size: cover;
        background-repeat: no-repeat;
        text-align: center;
        overflow: hidden; /* Prevent scrolling */
    }
    #player {
        width: 50px;
        height: 50px;
        background-color: blue;
        position: absolute;
        margin-top: 32.5%;
    }
    #glitch {
        background-color: black;
        color: red;
        width:100%;
        text-align: left;
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
    #exit {
        background-size: cover;
        width: 200px; 
        height: 200px;
    }
    /* .pojawianie { 
        animation: fadeIn 5s; 
    }
    @keyframes fadeIn {
        0% {  
        opacity: 0; 
        }
        100% { 
        opacity: 1; 
        }
    } */
    
</style>
</head>
<body>
    <div id="glitch"></div>
    <h1 class="blink_me" id="guide"></h1>

    <div id="boss" style='background-image: url(images/boss6.gif); width: 200px; height: 200px; background-size: cover; margin-top: 10%;'></div>
    <div id="box"></div>
    <div id="player"></div>
    <div id="exit"></div>
    
    <script>
        exit = document.getElementById('exit');
        // const player = document.getElementById('player');
        // // Move the player with arrow keys
        // window.addEventListener('keydown', (event) => {
        //     const speed = 10;
        //     const playerRect = player.getBoundingClientRect();
        //     let playerNewTop = playerRect.top;
        //     let playerNewLeft = playerRect.left;

        //     switch (event.key) {
        //         case 'ArrowUp':
        //             playerNewTop = Math.max(0, playerRect.top - speed);
        //             break;
        //         case 'ArrowDown':
        //             playerNewTop = Math.min(window.innerHeight - playerRect.height, playerRect.top + speed);
        //             break;
        //         case 'ArrowLeft':
        //             playerNewLeft = Math.max(0, playerRect.left - speed);
        //             break;
        //         case 'ArrowRight':
        //             playerNewLeft = Math.min(window.innerWidth - playerRect.width, playerRect.left + speed);
        //             break;
        //     }

        //     player.style.top = playerNewTop + 'px';
        //     player.style.left = playerNewLeft + 'px';
        // });
        function monolog() {
            setTimeout(function() {
                document.getElementById("box").style.marginTop = "5%";
                document.getElementById("box").style.padding = "10px";
                document.getElementById("box").style.backgroundColor = "black";
                document.getElementById("box").innerHTML = 'C0 siE STał0? c0 tyy zr0bil3s?? j4k?? dz1wnI3 sI3 cZuJ3 c0s ie dZIj3?/';
                document.getElementById("box").style.width = "75%";
                document.getElementById("box").style.display = "flex";
                document.getElementById("box").style.itemsAlign = "center";
                document.getElementById("box").style.fontSize = "28px";
                document.getElementById("box").style.paddingBottom = "1%";
                document.getElementById("box").style.color = "green";
                document.getElementById("box").style.textAlign = "center";
                glitch();
            },3000);      
        }
    
        function glitch() {
            setTimeout(function() {
                document.getElementById("box").style.display = 'none';
                document.getElementById("boss").style.display = 'none';
                document.getElementById("glitch").innerHTML = "SERVER-OVERLOAD <br> SERVER-CRASH";
                congrats();
            },3500);
        }

        function congrats() {
            setTimeout(function() {
                document.getElementById("guide").innerHTML = "Gratuluje. Pokonałeś go. Serwery padły. Możesz uciec. Żegnam..";
                congratsend();
            },3500);
        }

        function congratsend() {
            setTimeout(function() {
                document.getElementById("guide").innerHTML = "";
                exited();
            },4500);
        }

        function exited() {
            setTimeout(function() {
                document.getElementById("exit").style.backgroundImage = "url(images/exitprog.gif)";
                exit.addEventListener('click', () => {
                    zmiana1();
                });
            },1500);
        }
        
    
        function zmiana1() {
            setTimeout(function() {
                document.getElementById("glitch").style.display = "none";
                document.getElementById("exit").style.display = "none";
                document.getElementById("player").style.display = "none";
                document.body.style.backgroundSize = "cover";
                document.body.style.backgroundImage = "url(images/on-fire.png)";
                zmiana2();
            },1);
        }
    
        function zmiana2() {
            setTimeout(function() {
                document.body.style.backgroundImage = "url(images/staircase.png)";
                zmiana3();
            },3500);
        }
    
        function zmiana3() {
            setTimeout(function() {
                document.body.style.backgroundImage = "url(images/bomb.png)";
                zmiana4();
            },3500);
        }
    
        function zmiana4() {
            setTimeout(function() {
                document.body.style.backgroundImage = "url(images/bomb2.png)";
                zmiana5();
            },3750);
        }
    
        function zmiana5() {
            setTimeout(function() {
                document.body.style.backgroundImage = "url(images/exit.png)";
                zmiana6();
            },4500);
        }
    
        function zmiana6() {
            setTimeout(function() {
                document.body.style.backgroundImage = "url(images/outside.png)";
                zmiana7();
            },3000);
        }
    
        function zmiana7() {
            setTimeout(function() {
                window.location.href = "credits.php";
            },7500);
        }
    
        
        function menuscreen() {
            setTimeout(function() {
                sessionStorage.setItem("mainmenu", 4);
            },2000);
        }

        window.onload = menuscreen();
        window.onload = monolog();
        // window.onload = zmiana2();
        // window.onload = zmiana3();
        // window.onload = zmiana4();
        // window.onload = zmiana5();
        // window.onload = zmiana6();
        // window.onload = zmiana7();
    </script>
</body>
</html>