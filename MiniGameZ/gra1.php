<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Zgadnij liczbę</title>
<style>
    * {
        background-color: black;
        color: green;
        text-align: center;
    }
    .zgadnij {
        font-weight: bold;
    }
</style>
</head>
<body>
<h1>Zgadnij liczbę!</h1>
    <?php
    // Sesja pozwala na przechowanie informacji (w zmiennych)
    session_start();
    // Rozpoczęcie gry
    if (!isset($_SESSION['number_to_guess'])) {
        $_SESSION['number_to_guess'] = rand(1, 100);
        $_SESSION['attempts'] = 0;
    }
    
    // Wprowadzenie nowej próby
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $guess = $_POST['guess'];
    
        // Zwiekszenie liczby prób przy nieudanej próbie
        if (!empty($guess)) {
            $_SESSION['attempts']++;
    
            if ($guess == $_SESSION['number_to_guess']) {
                echo "<p>Gratulacje! zgadłeś/aś liczbę {$_SESSION['number_to_guess']} w {$_SESSION['attempts']} próbach.</p>";
                echo"<p> Jeśli chcesz zagraj jeszczę raz</p>";
                echo'<a href="menu.php">Powrót do innych gier</a>';
                echo '<script>sessionStorage.setItem("tres",1);</script>';
                session_unset();
                //Zakończenie gry
            } elseif ($guess < $_SESSION['number_to_guess']) {
                echo "<p>Spróbuj wyżej!</p>";
            } else {
                echo "<p>Spróbuj niżej!</p>";
            }
        } else {
            echo "<p>Wpisz liczbę.</p>";
        }
    }
    ?>   
    <form method="post">
        <label for="guess">Wpisz swoje przypuszczenie (pomiędzy 1 i 100):</label>
        <input type="text" name="guess" id="guess" required>
        <button type="submit" class="Zgadnij">Zgadnij</button>
    </form>
</body>
</html>