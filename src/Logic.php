<?php

namespace BrainGames\src\Logic;

use function cli\line;
use function cli\prompt;

function playGame($questionsAndAnswers, $description)
{
    line('Welcome to the Brain Game!');
    line($description);
    $nameOfGamer = prompt('May I have your name?');
    line("Hello, %s!", $nameOfGamer);
    foreach ($questionsAndAnswers as $question) {
        line("Question: %s", $question['question']);
        $answer = readline('Your answer: ');
        if ($answer == $question['correctAnswer']) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $question['correctAnswer']);
            line("Let's try again, %s", $nameOfGamer);
            line("You lose");
            return true;
        }
    }
    line("Congratulations, %s!", $nameOfGamer);
    return true;
}

define('NUMBER_OF_ROUNDS', 3);
