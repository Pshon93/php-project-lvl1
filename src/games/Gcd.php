<?php

namespace BrainGames\src\games\BrainGcd;

use BrainGames\src\Logic\NUMBER_OF_ROUNDS;

use function BrainGames\src\Logic\playGame;

function run()
{
    $gameCondition = 'Find the greatest common divisor of given numbers.';
    $questionsAndAnswers = [];
    $maxNumber = 100;
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $firstOperand = rand(0, $maxNumber);
        $secondOperand = rand(0, $maxNumber);
        $currentQuestion = "$firstOperand $secondOperand";
        $correctAnswer = gcd($firstOperand, $secondOperand);
        $questionsAndAnswers[] = ['question' => $currentQuestion, 'correctAnswer' => $correctAnswer];
    }
    playGame($questionsAndAnswers, $gameCondition);
}

function gcd($firstOperand, $secondOperand)
{
    while ($firstOperand !== 0 & $secondOperand !== 0) {
        if ($firstOperand > $secondOperand) {
            $firstOperand = $firstOperand % $secondOperand;
        } else {
            $secondOperand = $secondOperand % $firstOperand;
        }
    }
    return $firstOperand + $secondOperand;
}
