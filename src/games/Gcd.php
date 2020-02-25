<?php

namespace BrainGames\BrainGcd;

//use function cli\line;
//use function cli\prompt;
use function BrainGames\BrainLogic\greet;
use function BrainGames\BrainLogic\nameRequest;
use function BrainGames\BrainLogic\congratulations;
use function BrainGames\BrainLogic\getQuestion;

function run()
{
    $str = 'Find the greatest common divisor of given numbers.';
    greet($str);
    $questions = [];
    $victoryCondition = 3;
    $answerCount = 0;
    $maxNumber = 100;
    while ($answerCount < $victoryCondition) {
        $firstOperand = rand(0, $maxNumber);
        $secondOperand = rand(0, $maxNumber);
        $currentQuestion = $firstOperand . ' ' . $secondOperand;
        while ($firstOperand !== 0 & $secondOperand !== 0) {
            if ($firstOperand > $secondOperand) {
                $firstOperand = $firstOperand % $secondOperand;
            } else {
                $secondOperand = $secondOperand % $firstOperand;
            }
        }
        $correctAnswer =  $firstOperand + $secondOperand;
        $questions[] = ['Question' => $currentQuestion, 'CorrectAnswer' => $correctAnswer];
        $answerCount += 1;
    }
    getQuestion($questions);
}
