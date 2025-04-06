<!DOCTYPE html>
<html lang="pl-PL">
<head>
<meta charset="UTF-8">
<title>MENU</title>
<style>
    * {
        background-color: black;
        color: green;
        text-align: center;
    }
    h1 {
        font-size: 42px;
    }
    .pojemnik {
        margin-top: 15%;
    }
    #start {
        text-decoration: none;
        background-color: darkblue;
        padding: 10px;
    }
    
    

</style>
<script src="script.js"></script>
</head>
<body>
    <div class="pojemnik">
    <h1 id="name"><h1>
    <h2 id="desc"><h2>
    <a id="start" href="">START</a><br><br>
    <a id="back" onclick="uno()"><</a>
    <a id="next" onclick="dos()">></a>
    </div>
    <?php
    ?>
    <script>

        function uno() {
            document.getElementById("name").innerHTML = "Zgadnij liczbę.";
            document.getElementById("desc").innerHTML = "Zgadnij o jakiej liczbie w przedziale 1-100, ja myślę. Słuchaj się podpowiedzi.";
            document.getElementById("start").href = "gra1.php";
            document.getElementById("back").onclick = "";
            document.getElementById("next").onclick = function () {
                // Set the onclick function for "back" to dos()
                dos();
            };
            
        }
        function dos() {
            document.getElementById("name").innerHTML = "Papier Kamień Nożyce.";
            document.getElementById("desc").innerHTML = 'Czy uda ci się pokonać mnie w "Papier, Kamień, Nożyce"? Kamień pokonuje nożyce. Nożyce papier. Papier kamień.';
            document.getElementById("start").href = "gra2.php";
            document.getElementById("back").onclick = function () {
                // Set the onclick function for "back" to dos()
                uno();
            };
            document.getElementById("next").onclick = function () {
                // Set the onclick function for "back" to dos()
                tres();
            };
        }
        function tres() {
            document.getElementById("name").innerHTML = "Zgadnij słowo.";
            document.getElementById("desc").innerHTML = 'Masz tajemnicze słowo do zgadnięcia.';
            document.getElementById("start").href = "gra3.php";
            document.getElementById("back").onclick = function () {
                // Set the onclick function for "back" to dos()
                dos();
            };
            document.getElementById("next").onclick = function () {
                // Set the onclick function for "back" to dos()
                quattro();
            };
        }
        function quattro() {
            var a = sessionStorage.getItem("uno");
            var b = sessionStorage.getItem("dos");
            var c = sessionStorage.getItem("tres");
            if(a == 1 & b == 1 & c == 1){
                document.getElementById("name").innerHTML = "AUTHORIZED";
                document.getElementById("desc").innerHTML = 'Gratulacje, pokonałeś wszystkie minigierki.';
                document.getElementById("start").href = "preboss.php";
                document.getElementById("back").onclick = function () {
                // Set the onclick function for "back" to dos()
                tres();
            };
                document.getElementById("next").onclick = "";
            }else{
                document.getElementById("name").innerHTML = "UNAUTHORIZED";
                document.getElementById("desc").innerHTML = 'Pokonaj wszystkie minigierki, aby wyjść.';
                document.getElementById("start").href = "";
                document.getElementById("back").onclick = function () {
                // Set the onclick function for "back" to dos()
                tres();
            };
                document.getElementById("next").onclick = "";
            }
        }
        

        function menuscreen() {
            setTimeout(function() {
                sessionStorage.setItem("mainmenu", 2);
            },2000);
        }

        window.onload = uno();
        
        window.onload = menuscreen();
    </script>
</body>
</html>