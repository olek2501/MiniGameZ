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
    
</style>
</head>
<body>
    <div id="glitch"></div>
    <h1 class="blink_me" id="guide"></h1>
    <h1 class="never" id="escape"></h1>
    <div id="boss" style='background-image: url(images/boss.png); width: 200px; height: 200px; background-size: cover; margin-top: 10%;'></div>
    <div id="box"></div>
    <div id="player"></div>
    <div id="exit"></div>
    
    <script>
        function monolog() {
            setTimeout(function() {
                document.getElementById("box").style.marginTop = "5%";
                document.getElementById("box").style.padding = "10px";
                document.getElementById("box").style.backgroundColor = "black";
                document.getElementById("box").innerHTML = 'HAHAHAHAHAHAHA!! Naprawde myślałeś, że wyjście jest takie PROSTE??';
                document.getElementById("box").style.width = "75%";
                document.getElementById("box").style.display = "flex";
                document.getElementById("box").style.itemsAlign = "center";
                document.getElementById("box").style.fontSize = "28px";
                document.getElementById("box").style.paddingBottom = "5%";
                document.getElementById("box").style.color = "red";
                document.getElementById("box").style.textAlign = "center";
                monolog2();
            },3000);      
        }

        function monolog2() {
            setTimeout(function() {
                document.getElementById("box").style.display = "none";
                document.getElementById("escape").style.marginTop = "5%";
                document.getElementById("escape").innerHTML = 'NIGDY NIE POZWOLĘ CI UCIEC';
                document.getElementById("escape").style.fontSize = "28px";
                document.getElementById("escape").style.color = "red";
                document.getElementById("escape").style.textAlign = "center";
                document.getElementById("escape").style.fontSize = "30px";
                document.getElementById("boss").style.width = "500px";
                document.getElementById("boss").style.height = "500px";
                wysylka();
            },5000);
        }

        function wysylka() {
            setTimeout(function() {
                window.location.href = "boss.php";
            },2000);
        }

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