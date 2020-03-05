<?php

namespace BrainGames\BrainGcd;

use function Logic\getQuestion;
use Logic\NUMBER_OF_ROUNDS;

function run()
{
    $gameCondition = 'Find the greatest common divisor of given numbers.';
    $questionsAndAnswers = [];
    $answerCount = 0;
    $maxNumber = 100;
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $firstOperand = rand(0, $maxNumber);
        $secondOperand = rand(0, $maxNumber);
        $currentQuestion = "$firstOperand $secondOperand";    
        $correctAnswer = gcd($firstOperand, $secondOperand);
        $questionsAndAnswers[] = ['question' => $currentQuestion, 'correctAnswer' => $correctAnswer];
    }
    getQuestion($questionsAndAnswers, $gameCondition);
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
