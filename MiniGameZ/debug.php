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
        background-color: black;
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
    <h1 class="tytul">Debug Menu</h1>
    <div class="opcje">
    <h1 id="debug" style="color: green;">PokazanieZaliczeniaMinigierek: </h1>
    <div id="deb" style="color: green; text-align: center; font-size: 20px; border: 1px solid green; width: 200px; height: 50px;">
        <h1>Przełącz</h1>
    </div>
    </div>
    <div class="opcje">
    <h1 id="beg" style="color: green;">NieskończoneHPnaBossie: </h1>
    <div id="bid" style="color: green; text-align: center; font-size: 20px; border: 1px solid green; width: 200px; height: 50px;">
        <h1>Przełącz</h1>
    </div>
    </div>
    <div style="display: flex; justify-content: center;">
        <img src="images/debug.gif" style=" padding-top: 15px; width: 250px; height: 250px;">
    </div>
    <h1 style="color: black;">Sekretny Debug Tip: Możesz używać paska "Zbadaj Element", by łatwiej pokonać bossa.</h1>
    <script>
        var deb = document.getElementById("deb");
        var bid = document.getElementById("bid");
        var b = sessionStorage.getItem("bi");
        var d = sessionStorage.getItem("debug");
        if(d == 1){
            document.getElementById("debug").innerHTML = "PokazanieZaliczeniaMinigierek: TAK";
        }else{
            document.getElementById("debug").innerHTML = "PokazanieZaliczeniaMinigierek: NIE";
        }
        if(b == 1){
            document.getElementById("beg").innerHTML = "NieskończoneHPnaBossie: TAK";
        }else{
            document.getElementById("beg").innerHTML = "NieskończoneHPnaBossie: NIE";
        }
        function deb1() {
            setTimeout(function() {
                deb.addEventListener('click', () => {
                    var de = sessionStorage.getItem("debug");
                    if(de == 1){
                        sessionStorage.setItem("debug", 0);
                    }else{
                        sessionStorage.setItem("debug", 1);
                    }
                    deb2();
                });
            },1500);
        }
        function deb2(){
            setTimeout(function() {
                window.location.href = "debug.php";
            },1);
        }
        function bi1() {
            setTimeout(function() {
                bid.addEventListener('click', () => {
                    var bi = sessionStorage.getItem("bi");
                    if(bi == 1){
                        sessionStorage.setItem("bi", 0);
                    }else{
                        sessionStorage.setItem("bi", 1);
                    }
                    bi2();
                });
            },1500);
        }
        function bi2(){
            setTimeout(function() {
                window.location.href = "debug.php";
            },1);
        }
        window.onload = deb1();
        window.onload = bi1();
        
    </script>
    <?php
    ?>
</body>
</html>