<?php

namespace BrainGames\BrainCalc;

//use function cli\line;
//use function cli\prompt;
use function BrainGames\BrainLogic\greet;
use function BrainGames\BrainLogic\nameRequest;
use function BrainGames\BrainLogic\congratulations;
use function BrainGames\BrainLogic\getQuestion;

function run()
{
    $str = 'What is the result of the expression?';
    greet($str);
    $questions = [];
    $victoryCondition = 3;
    $answerCount = 0;
    while ($answerCount < $victoryCondition) {
        $maxNumber = 100;
        $operators = ['+', '-', '*'];
        $firstOperand = rand(0, $maxNumber);
        $secondOperand = rand(0, $maxNumber);
        $rand_key = array_rand($operators);
        $mathOperator = $operators[$rand_key];
        $currentQuestion = $firstOperand . $mathOperator . $secondOperand;
        switch ($mathOperator) {
            case '+':
                $correctAnswer = $firstOperand + $secondOperand;
                break;
            case '-':
                $correctAnswer = $firstOperand - $secondOperand;
                break;
            case '*':
                $correctAnswer = $firstOperand * $secondOperand;
                break;
        }
        $questions[] = ['Question' => $currentQuestion, 'CorrectAnswer' => $correctAnswer];
        $answerCount += 1;
    }
    getQuestion($questions);
}
