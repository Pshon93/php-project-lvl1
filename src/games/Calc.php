<?php

namespace BrainGames\src\games\BrainCalc;

use BrainGames\src\Logic\NUMBER_OF_ROUNDS;

use function BrainGames\src\Logic\playGame;

function run()
{
    $gameCondition = 'What is the result of the expression?';
    $questionsAndAnswers = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $maxNumber = 100;
        $operators = ['+', '-', '*'];
        $firstOperand = rand(0, $maxNumber);
        $secondOperand = rand(0, $maxNumber);
        $rand_key = array_rand($operators);
        $mathOperator = $operators[$rand_key];
        $currentQuestion = "$firstOperand $mathOperator $secondOperand";
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
        $questionsAndAnswers[] = ['question' => $currentQuestion, 'correctAnswer' => $correctAnswer];
    }
    playGame($questionsAndAnswers, $gameCondition);
}
