<?php

namespace BrainGames\BrainGcd;

use function Logic\getQuestion;
use function Logic\getNumberOfRounds;

function run()
{
    $gameCondition = 'Find the greatest common divisor of given numbers.';
    $questionsAndAnswers = [];
    $answerCount = 0;
    $maxNumber = 100;
    for ($i = 0; $i < getNumberOfRounds(); $i++) {
        $firstOperand = rand(0, $maxNumber);
        $secondOperand = rand(0, $maxNumber);
        $currentQuestion = "$firstOperand $secondOperand";
        gcd($firstOperand, $secondOperand);
        $correctAnswer =  $firstOperand + $secondOperand;
        $questionsAndAnswers[] = ['question' => $currentQuestion, 'correctAnswer' => $correctAnswer];
    }
    getQuestion($questionsAndAnswers, $gameCondition);
}

function gcd(&$firstOperand, &$secondOperand)
{
    while ($firstOperand !== 0 & $secondOperand !== 0) {
        if ($firstOperand > $secondOperand) {
            $firstOperand = $firstOperand % $secondOperand;
        } else {
            $secondOperand = $secondOperand % $firstOperand;
        }
    }
}
