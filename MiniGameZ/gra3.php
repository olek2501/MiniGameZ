<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Zgadnij słowo</title>
<style>
    * {
        background-color: black;
        color: green;
        text-align: center;
    }
    /* #sub {
        display: none;
    } */
    
</style>
</head>
<body>
<!-- <form method="post" id="sub">
<input type="text" name="win" id="win" value="1">
<input type="submit"> -->
</form>
<?php
    session_start();
//losowanie słowa do zgadniecia
    function RandomWord() {
        $words = ['programowanie', 'monitor', 'internet', 'klawiatura', 'procesor', 'grafika', 'serwer', 'algorytm', 'myszka'];
        return strtoupper($words[array_rand($words)]);
    }
// Generowanie tekstowej reprezentacji słowa do zgadniecia 
// Litery, które zostały już odgadnięte, są wyświetlane, a pozostałe są zastępowane znakiem "podłogi"
    function WordToGuess($word, $guessedLetters) {
        $display = '';
        foreach (str_split($word) as $Letter) {
            $display .= (in_array($Letter, $guessedLetters)) ? $Letter : '_';
            $display .= ' ';
        }
        return trim($display);
    }
//Inicjacja sesji
    if (!isset($_SESSION['wordToGuess'])) {
        $_SESSION['wordToGuess'] = RandomWord();
        $_SESSION['guessedLetters'] = []; //Przechowuje odgadniete litery
        $_SESSION['incorrectGuesses'] = 0;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['guess'])) {
            $guess = strtoupper($_POST['guess']);
            // Jeśli zgadywana litera jest w słowie do odgadniecia i nie została juz uzyta dodajemy ją do tablicy 
            if (ctype_alpha($guess) && !in_array($guess, $_SESSION['guessedLetters'])) {
                $_SESSION['guessedLetters'][] = $guess;
                // w przeciwnym wypadku zwiekszamy liczbe błędnych prób
                if (!stristr($_SESSION['wordToGuess'], $guess)) {
                    $_SESSION['incorrectGuesses']++;
                }
            }
        }
    }
    //wyswietlanie aktualnego stanu gry
    $wordToDisplay = WordToGuess($_SESSION['wordToGuess'], $_SESSION['guessedLetters']);

    echo '<p>Słowo do odgadnięcia (kategoria: komputer): '.$wordToDisplay.'</p>';
    echo '<p>Liczba błędnych prób: '.$_SESSION['incorrectGuesses'].' na 6</p>';
    //sprawdzanie czy Gracz odgadł całe słowo lub przekroczyl maksymalną liczbę błędnych prób 
    if ($_SESSION['incorrectGuesses'] < 6 && !stristr($wordToDisplay, '_')) {
        echo '<p>Odgadłeś/aś słowo!</p>';
        echo'<button onclick="location.reload()">Zagraj jeszczę raz</button></br>';
        echo'<a href="menu.php">Powrót do innych gier</a>';
        echo '<script>sessionStorage.setItem("uno",1);</script>';
        session_unset();
    } elseif ($_SESSION['incorrectGuesses'] >= 6) {
        echo '<p>Przegrałeś/aś Słowo to: ' . $_SESSION['wordToGuess'] . '</p>';
        echo'<button onclick="location.reload()">Zagraj jeszczę raz</button></br>';
        echo'<a href="menu.php">Powrót do innych gier</a>';
        // echo "<script>var check = sessionStorage.getItem(tres)</script>";
        // echo "<script>if(check != 0){ var a = sessionStorage.getItem(m)+1; sessionStorage.setItem(m,a); sessionStorage.setItem(tres,1); }</script>";
        // if($_SESSION['gratres'] != 1){
        //     $_SESSION['m'] == $_SESSION['m'] + 1;
        //     $_SESSION['gratres'] == 1
        // }
        session_unset();
    } else {//Jeśli gra nie została zakończona, wyświetlamy formularz, w którym gracz podaje kolejną literę do odgadnięcia
        echo '
            <form method="post">
                <label>Podaj literę:</label>
                <input type="text" name="guess" maxlength="1" pattern="[A-Za-z]" required>
                <input type="submit" value="Zgadnij">
            </form>
        ';
    }
    ?>
</body>
</html>