<!DOCTYPE html>
<html lang="pl-PL">
<head>
<meta charset="UTF-8">
<title>MiniGames</title>
<style>
    body {
        margin: 0;
        background-color: black;
        background-image: url(images/wakeup1.png);
        background-size: cover;
        background-repeat: no-repeat;
        text-align: center;
    }
    
</style>
</head>
<body style="background-image: url(images/wakeup1.png);">
    <div id="box"></div>
    <script>
        
    function zmiana() {
        setTimeout(function() {
            a = 2;
            document.body.style.backgroundImage = "url(images/wakeup"+a+".png)";
        },3000);
    }

    function zmiana2() {
        setTimeout(function() {
            a = 3;
            document.body.style.backgroundImage = "url(images/wakeup"+a+".png)";
        },7000);
    }

    function zmiana3() {
        setTimeout(function() {
            a = 4;
            document.body.style.backgroundImage = "url(images/wakeup"+a+".png)";
        },8500);
    }

    function zmiana4() {
        setTimeout(function() {
            document.body.style.backgroundImage = "url(images/basementdialogue.png)";
            document.getElementById("box").style.marginTop = "35%";
            document.getElementById("box").style.padding = "20px";
            document.getElementById("box").style.backgroundColor = "gray";
            document.getElementById("box").innerHTML = 'Witaj, możesz mnie nazywać "Programista". Jak możesz zauważyć, porwałem cię. Nie wypuszcze cię, dopóki nie spróbujesz gier jakie zaprogramowałem! Dodatkowo, jeżeli nie ukończysz ich wszystkich to wybuchne całe najbliższe miasto!! Mam wielką bombę, kupiłem ją na przecenie. Będzie KABOOOOOMMM!!!';
            document.getElementById("box").style.width = "75%";
            document.getElementById("box").style.display = "flex";
            document.getElementById("box").style.itemsAlign = "center";
            document.getElementById("box").style.fontSize = "28px";
            document.getElementById("box").style.paddingBottom = "5%";
        },10000);
    }

    function zmiana5() {
        setTimeout(function() {
            document.getElementById("box").innerHTML = 'A więc za chwilę włożę cię do mojego programu, używając tajemniczych gogli VR oraz mojej "metody". Pokonaj wszystkie z moich gierek, a otrzymasz wolność (możę). Powodzenia! ;)';
        },20000);
    }

    function zmiana6() {
        setTimeout(function() {
            window.location.href = "menu.php";
        },30000);
    }

    function menuscreen() {
            setTimeout(function() {
                sessionStorage.setItem("mainmenu", 1);
            },2000);
    }
    

    window.onload = menuscreen();
    window.onload = zmiana();
    window.onload = zmiana2();
    window.onload = zmiana3();
    window.onload = zmiana4();
    window.onload = zmiana5();
    window.onload = zmiana6();
    </script>
    <?php
    ?>
</body>
</html>