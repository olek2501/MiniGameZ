<!DOCTYPE html>
<html lang="pl-PL">
<head>
<meta charset="UTF-8">
<title>MiniGameZ</title>
<style>
    * {
        margin: 0;
        text-align: center;
    }
    
    body {
        background-image: url(images/mainmenu1.png);
        background-size: cover;
    }
    
    .tytul {
        font-size: 52px;
        letter-spacing: 5px;
        color: #00d102;
        margin-top: 10%;
        margin-bottom: 2%;
    }
    .granie {
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 15px;
        padding-right: 15px;
        color: #00d102;
        background-color: #595959;
        font-size: 36px;
        text-decoration: none;
        font-weight: bold;
        margin-top: 25px;
        max-width: 190px;
    }
    a:hover {

    }
    .opcje {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    #start {
        padding-left: 60px;
        padding-right: 60px;
    }
</style>
</head>
<body>
    <h1 class="tytul">Minigamez</h1>
    <div class="opcje">
    <a class="granie" id="start" href="cutsceneintro.php">Start</a>
    <a class="granie" id="kontynuuj" href="cutsceneintro.php">Kontynuuj</a>
    <a class="granie" href="index.php" onClick='alert("Brak ustawień :)")'>Ustawienia</a>
    </div>
    <div id="secret" style="position: right; width: 15px; height: 15px; background-color: black;">
    </div>
    <script>
        secret = document.getElementById("secret");
        
        var m = sessionStorage.getItem("mainmenu");
        if(m==1){
            document.body.style.backgroundImage = "url(images/mainmenu1.png)"
            document.getElementById("kontynuuj").href = "cutsceneintro.php";
        }
        if(m==2){
            document.body.style.backgroundImage = "url(images/mainmenu2.png)"
            document.getElementById("kontynuuj").href = "menu.php";
        }
        if(m==3){
            document.body.style.backgroundImage = "url(images/mainmenu3.gif)"
            document.getElementById("kontynuuj").href = "boss.php";
        }
        if(m==4){
            document.body.style.backgroundImage = "url(images/mainmenu4.png)"
            document.getElementById("kontynuuj").href = "credits.php";
        }
        function secret(){
            setTimeout(function() {
                window.location.href = "debug.php";
            },1);
        }
        
        
        function secret1() {
            setTimeout(function() {
                secret.addEventListener('click', () => {
                    secret2();
                });
            },1500);
        }
        function secret2(){
            setTimeout(function() {
                window.location.href = "debug.php";
            },1);
        }
        window.onload = secret1();
    </script>
    <?php
    ?>
</body>
</html>