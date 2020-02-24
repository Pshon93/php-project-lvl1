<?php

namespace BrainGames\BrainLogic;

use function cli\line;
use function cli\prompt;

function greet($str)
{
    line('Welcome to the Brain Game!');
    line($str);
}

function congratulations($nameOfGamer)
{
    line("Congratulations, %s!", $nameOfGamer);
}

function nameRequest()
{
    $nameOfGamer = prompt('May I have your name?');
    line("Hello, %s!", $nameOfGamer);
    return $nameOfGamer;
}

function getQuestion($currentQuestion, $correctAnswer, $nameOfGamer)
{
    echo 'Question: ' . $currentQuestion, PHP_EOL;
    $answer = readline('Your answer: ');
    if ($answer == $correctAnswer) {
        echo 'Correct!', PHP_EOL;
        return true;
    } else {
        getErrorMessage($nameOfGamer, $answer, $correctAnswer);
        return false;
    }
}

function getErrorMessage($nameOfGamer, $answer, $correctAnswer)
{
    print_r("'{$answer}' is wrong answer ;(. Correct answer was {$correctAnswer}");
    echo PHP_EOL;
    print_r("Let's try again, {$nameOfGamer}.");
    echo PHP_EOL;
}
