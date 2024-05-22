<?php
class Game
{
    private array $gameElements;
    private string $playerChoice;

    public function __construct()
    {
        $this->gameElements = [
            "rock" => ["scissors", "lizard"],
            "paper" => ["rock", "spock"],
            "scissors" => ["paper", "lizard"],
            "lizard" => ["paper", "spock"],
            "spock" => ["scissors", "rock"]
        ];
    }

    public function getElements(): array
    {
        return $this->gameElements;
    }

    public function choose(string $choice): void
    {
        $choice = strtolower($choice);
        if (isset($this->gameElements[$choice])) {
            $this->playerChoice = $choice;
        } else {
            throw new Exception("Choice '$choice' does not exist");
        }
    }

    public function getPlayerChoice(): string
    {
        return $this->playerChoice;
    }

    public function play(): void
    {
        $playerChoice = $this->getPlayerChoice();
        $computerChoice = array_rand($this->gameElements);
        $computerKeyValues = $this->gameElements[$computerChoice];

        echo "You chose: " . $playerChoice . "\n";
        echo "Computer chose: " . $computerChoice . "\n";

        if (in_array($computerChoice, $this->gameElements[$playerChoice])) {
            echo "You win!\n";
        } elseif (in_array($playerChoice, $computerKeyValues)) {
            echo "You lose!\n";
        } else {
            echo "It's a tie!\n";
        }
    }
}