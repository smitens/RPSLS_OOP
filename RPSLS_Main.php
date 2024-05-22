<?php

include("RPSLS_Clases.php");

$game = new Game();

do {
    $validChoice = false;
    while (!$validChoice) {
        try {
            $playerChoice = readline("Choose Rock, Paper, Scissors, Lizard, Spock: ");
            $game->choose($playerChoice);
            $validChoice = true;
        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
        }
    }
    $game->play();
    $continue = readline("Do you want to play again? (yes/no): ");
} while (strtolower($continue) === 'yes');

echo "Thanks for playing!\n";
