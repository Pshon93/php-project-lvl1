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

function getQuestion($questions)
{
    $nameOfGamer = nameRequest();
    $victoryCondition = count($questions);
    $numberOfCorrectAnswer = 0;
    foreach ($questions as $question) {
        echo 'Question: ' . $question['Question'], PHP_EOL;
        $answer = readline('Your answer: ');
        if ($answer == $question['CorrectAnswer']) {
            echo 'Correct!', PHP_EOL;
            $numberOfCorrectAnswer += 1;
        } else {
            getErrorMessage($nameOfGamer, $answer, $question['CorrectAnswer']);
            break;
        }
    }
    ($numberOfCorrectAnswer == $victoryCondition) ? congratulations($nameOfGamer) : print_r("You lose");
}

function getErrorMessage($nameOfGamer, $answer, $correctAnswer)
{
    print_r("'{$answer}' is wrong answer ;(. Correct answer was {$correctAnswer}");
    echo PHP_EOL;
    print_r("Let's try again, {$nameOfGamer}.");
    echo PHP_EOL;
}
