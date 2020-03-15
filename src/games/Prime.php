<?php

namespace BrainGames\src\games\BrainPrime;

use BrainGames\src\Logic\NUMBER_OF_ROUNDS;

use function BrainGames\src\Logic\playGame;

function run()
{
    $gameCondition = 'Answer "yes" if given number is prime, otherwise answer "no".';
    $questionsAndAnswers = [];
    $maxNumber = 9;
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $currentQuestion = rand(-$maxNumber, $maxNumber);
        $correctAnswer = isPrime($currentQuestion) ? 'yes' : 'no';
        $questionsAndAnswers[] = ['question' => $currentQuestion, 'correctAnswer' => $correctAnswer];
    }
    playGame($questionsAndAnswers, $gameCondition);
}

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }
    for ($j = 2; $j <= sqrt($number); $j++) {
        if ($number % $j === 0) {
            return false;
        }
    }
    return true;
}
