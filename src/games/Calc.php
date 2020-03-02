<?php

namespace BrainGames\BrainCalc;

use function Logic\getQuestion;
use function Logic\getNumberOfRounds;

function run()
{
    $gameCondition = 'What is the result of the expression?';
    $questionsAndAnswers = [];
    $answerCount = 0;
    for ($i = 0; $i < getNumberOfRounds(); $i++) {
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
        $questionsAndAnswers[] = ['question' => $currentQuestion, 'correctAnswer' => $correctAnswer];
    }
    getQuestion($questionsAndAnswers, $gameCondition);
}
