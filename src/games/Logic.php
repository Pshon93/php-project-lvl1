<?php

namespace BrainGames\BrainLogic;

use function cli\line;
use function cli\prompt;

function greet($methodName)
{
    if ($methodName === 'Even') {
        $str = 'Answer "yes" if the number is even, otherwise answer "no".';
    } elseif ($methodName === 'Calc') {
        $str = 'What is the result of the expression?';
    } elseif ($methodName === 'Gcd') {
        $str = 'Find the greatest common divisor of given numbers.';
    } elseif ($methodName === 'Progression') {
        $str = 'What number is missing in the progression?';
    } elseif ($methodName === 'Prime') {
        $str = 'Answer "yes" if given number is prime, otherwise answer "no".';
    }
    line('Welcome to the Brain Game!');
    line($str);
    $nameOfGamer = prompt('May I have your name?');
    line("Hello, %s!", $nameOfGamer);
    getQuestion($nameOfGamer, $methodName);
    line("Congratulations, %s!", $nameOfGamer);
}

function getQuestion($nameOfGamer, $methodName)
{
    $answerCount = 0;
    $maxNumber = 100;
    $operators = ['+', '-', '*'];
    $succesfullAttemptsCount = 3;
    while ($answerCount < $succesfullAttemptsCount) {
        if ($methodName === 'Even') {
            $currentQuestion = rand(0, $maxNumber);
            $correctAnswer = ($currentQuestion % 2 === 0) ? 'yes' : 'no';
        } elseif ($methodName === 'Calc') {
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
        } elseif ($methodName === 'Gcd') {
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
            $correctAnswer = $firstOperand + $secondOperand;
        } elseif ($methodName === 'Progression') {
            $firstMemberOfProgression = rand(0, $maxNumber);
            $maxStep = 5;
            $lengthOfProgression = 10;
            $currentStep = rand(1, $maxStep);
            $missingPosition = rand(0, $lengthOfProgression - 1);
            $correctAnswer = $firstMemberOfProgression + $currentStep * $missingPosition;
            $currentQuestion = '';
            for ($i = 0; $i < $lengthOfProgression; $i++) {
                if ($i === $missingPosition) {
                    $currentQuestion .= '..' . ' ';
                } else {
                    $currentQuestion .= ($firstMemberOfProgression + $i * $currentStep) . ' ';
                }
            }
        } elseif ($methodName === 'Prime') {
            $currentQuestion = rand(2, $maxNumber);
            $correctAnswer = 'yes';
            for ($i = 2; $i < sqrt($currentQuestion); $i++) {
                if ($currentQuestion % $i === 0) {
                    $correctAnswer = 'no';
                    break;
                } else {
                    $correctAnswer = 'yes';
                }
            }
        }

        echo 'Question: ' . $currentQuestion, PHP_EOL;
        $answer = readline('Your answer: ');

        if ($answer == $correctAnswer) {
            $answerCount += 1;
            echo 'Correct!', PHP_EOL;
        } else {
            getErrorMessage($nameOfGamer, $answer, $correctAnswer);
            $answerCount = 0;
        }
    }
}

function getErrorMessage($nameOfGamer, $answer, $correctAnswer)
{
    print_r("'{$answer}' is wrong answer ;(. Correct answer was {$correctAnswer}");
    echo PHP_EOL;
    print_r("Let's try again, {$nameOfGamer}.");
    echo PHP_EOL;
}
