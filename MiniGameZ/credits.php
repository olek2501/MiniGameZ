<!DOCTYPE html>
<html lang="pl-PL">
<head>
<meta charset="UTF-8">
<style>
    body {
        margin: 0;
        background-color: black;
        text-align: center;
        display: flex;
        flex-direction: column;
    }
    #koniec, #tworcy, #credits, #tyforplaying {
        text-align: center; 
        color: white;
    }
    #koniec {
        font-size: 62px;
        letter-spacing: 5px;
        margin-top: 10%;
    }
    #tworcy {
        font-size: 36px;
    }
    #credits {
        font-size: 28px;
    }
    #tyforplaying {
        font-size: 24px;
    }
    #menu {
        width: 400px;
        height: 200px;
        background-size: cover;
        text-align: center;
    }
</style>
</head>
<body>
    <h1 id="koniec">The End</h1>
    <h2 id="tworcy">Grę stworzyli:</h2>
    <h2 id="credits">Aleksander Kiszkowiak & Gabriel Karbowniczek</h2>
    <h3 id="tyforplaying">Dziękujemy za grę!!</h3>
    <div id="menu"></div>
    <script>
        menu = document.getElementById('menu');

        function mainmenu() {
            setTimeout(function() {
                document.getElementById("menu").style.backgroundImage = "url(images/mainmenu.gif)";
                menu.addEventListener('click', () => {
                    window.location.href = "index.php";
                });
            },2500);
        }

        window.onload = mainmenu();
    </script>
</body>
</html>