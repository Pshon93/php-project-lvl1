<?php

namespace BrainGames\BrainCalc;

use Logic\NUMBER_OF_ROUNDS;

use function Logic\getQuestion;

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
    getQuestion($questionsAndAnswers, $gameCondition);
}
