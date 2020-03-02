<?php

namespace Logic;

use function cli\line;
use function cli\prompt;

function greet($gameCondition)
{
    line('Welcome to the Brain Game!');
    line($gameCondition);
}

function congratulations($nameOfGamer)
{
    line("Congratulations, %s!", $nameOfGamer);
}

function nameRequest()
{
    $nameOfGamer = prompt('May I have your name?');
    return $nameOfGamer;
}

function greetPerson($nameOfGamer)
{
    line("Hello, %s!", $nameOfGamer);
}

function getQuestion($questionsAndAnswers, $rules)
{
    greet($rules);
    $nameOfGamer = nameRequest();
    greetPerson($nameOfGamer);
    $victoryCondition = count($questionsAndAnswers);
    $numberOfCorrectAnswer = 0;
    foreach ($questionsAndAnswers as $question) {
        echo 'Question: ' . $question['question'], PHP_EOL;
        $answer = readline('Your answer: ');
        if ($answer == $question['correctAnswer']) {
            echo 'Correct!', PHP_EOL;
        } else {
            print_r("'{$answer}' is wrong answer ;(. Correct answer was {$question['correctAnswer']}" . PHP_EOL);
            print_r("Let's try again, {$nameOfGamer}." . PHP_EOL);
            return print_r("You lose");
        }
    }
    return congratulations($nameOfGamer);
}

function getNumberOfRounds()
{
    $numberOfRounds = 3;
    return $numberOfRounds;
}
