<?php

namespace BrainGames\BrainGcd;

use function Logic\getQuestion;

function run()
{
    $str = 'Find the greatest common divisor of given numbers.';
    $questions = [];
    $victoryCondition = 3;
    $answerCount = 0;
    $maxNumber = 100;
    while ($answerCount < $victoryCondition) {
        $firstOperand = rand(0, $maxNumber);
        $secondOperand = rand(0, $maxNumber);
        $currentQuestion = "$firstOperand $secondOperand";
        gcd($firstOperand, $secondOperand);
        $correctAnswer =  $firstOperand + $secondOperand;
        $questions[] = ['Question' => $currentQuestion, 'CorrectAnswer' => $correctAnswer];
        $answerCount += 1;
    }
    getQuestion($questions, $str);
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
