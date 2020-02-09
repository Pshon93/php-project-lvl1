<?php

namespace BrainGames\BrainLogic;

use function cli\line;
use function cli\prompt;

function greeting($methodCal)
{
    if ($methodCal === 'Even') {
        $str = 'Answer "yes" if the number is even, otherwise answer "no".';
    } elseif ($methodCal === 'Calc') {
        $str = 'What is the result of the expression?';
    } elseif ($methodCal === 'Gcd') {
        $str = 'Find the greatest common divisor of given numbers.';
    }
    line('Welcome to the Brain Game!');
    line($str);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    getQuestion($name, $methodCal);
    line("Congratulations, %s!", $name);
}

function getQuestion($name, $methodCal)
{
    $numberOfAnswer = 0;
    $maxNumber = 10;
    $operators = ['+', '-', '*'];
    while ($numberOfAnswer < 3) {
        if ($methodCal === 'Even') {
            $currentQuestion = rand(0, $maxNumber);
            $correctAnswer = ($currentQuestion % 2 === 0) ? 'yes' : 'no';
        } elseif ($methodCal === 'Calc') {
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
        } elseif ($methodCal === 'Gcd') {
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
        }

        echo 'Question: ' . $currentQuestion, PHP_EOL;
        $answer = readline('Your answer: ');

        if ($answer == $correctAnswer) {
            $numberOfAnswer += 1;
            echo 'Correct!', PHP_EOL;
        } else {
            getErrorMessage($name, $answer, $correctAnswer);
            $numberOfAnswer = 0;
        }
    }
}

function getErrorMessage($name, $answer, $correctAnswer)
{
    print_r("'{$answer}' is wrong answer ;(. Correct answer was {$correctAnswer}");
    echo PHP_EOL;
    print_r("Let's try again, {$name}.");
    echo PHP_EOL;
}
