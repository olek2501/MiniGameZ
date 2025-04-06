<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Papier Kamień Nożyce do 3</title>
<style>
    * {
        background-color: black;
        color: green;
        text-align: center;
    }
</style>
</head>
<body>
<?php
session_start();

// Losuje wybór komputera
function ComputerChoice() {
    $kmp = ['kamień', 'papier', 'nożyce'];
    return $kmp[array_rand($kmp)];
}

// Inicjacja sesji
if (!isset($_SESSION['playerWins']) && !isset($_SESSION['computerWins'])) {
    $_SESSION['playerWins'] = 0;
    $_SESSION['computerWins'] = 0;
}

// Wprowadzenie danych
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['playerChoice'])) {
        $playerChoice = $_POST['playerChoice'];
        $computerChoice = ComputerChoice();
        $result = Winner($playerChoice, $computerChoice);

    }
}

$sessionStatus = session_status();
//wyswietlenie aktualnego stanu rozgrywki
if (isset($result)) {
    echo '<p>Twój wybór: ' . $playerChoice . '</p>';
    echo '<p>Wybór komputera: ' . $computerChoice . '</p>';
    echo '<p>Wynik: ' . $result . '</p>';
    if ($sessionStatus == PHP_SESSION_ACTIVE){
        echo '<p>Wynik gry: Gracz ' . $_SESSION['playerWins'] . ' : ' . $_SESSION['computerWins'] . ' Komputer</p>';
    }
}

// Sprawdzanie kto wygrał
function Winner($playerChoice, $computerChoice) {
    if ($playerChoice == $computerChoice) {
        return 'Remis';
    } elseif (
        ($playerChoice == 'kamień' && $computerChoice == 'nożyce') ||
        ($playerChoice == 'papier' && $computerChoice == 'kamień') ||
        ($playerChoice == 'nożyce' && $computerChoice == 'papier')
    ) {
        if ($_SESSION['playerWins'] == 2) {
            session_destroy();
            echo '<script>sessionStorage.setItem("dos",1);</script>';
            return 'Wygrałeś! <a href="menu.php">Powrót do innych gier</a><p>Jeśli chcesz zagrać jeszcze raz kliknij przycisk Rzuć</p>';
            
        } else {
            $_SESSION['playerWins']++;
            return 'Wygrałeś rundę! Grasz dalej.';
        }
    } else {
        if ($_SESSION['computerWins'] == 2) {
            session_destroy();
            return 'Przegrałeś. <a href="menu.php">Powrót do innych gier</a><p>Jeśli chcesz zagrać jeszcze raz kliknij przycisk Rzuć</p>';
        } else {
            $_SESSION['computerWins']++;
            return 'Przegrałeś rundę, ale grasz dalej.';
        }
    }
}

?>

<form method="post">
    <label>Wybierz jedną z opcji: </label>
    <select name="playerChoice">
        <option value="kamień">Kamień</option>
        <option value="papier">Papier</option>
        <option value="nożyce">Nożyce</option>
    </select>
    <input type="submit" value="Rzuć">
</form>

</body>
</html>