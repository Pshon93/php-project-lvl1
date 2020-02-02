<?php

namespace BrainGames\Question;

function getQuestion($name)
{
    $numberOfAnswer = 0;
    while ($numberOfAnswer < 3) {
        $currentNumber = rand();
        echo 'Question: ' . $currentNumber, PHP_EOL;
        $answer = readline('Your answer: ');
        if ($currentNumber % 2 === 0 & $answer === 'yes') {
            $numberOfAnswer += 1;
            echo 'Correct!', PHP_EOL;
        } elseif ($currentNumber % 2 !== 0 & $answer === 'no') {
            $numberOfAnswer += 1;
            echo 'Correct!', PHP_EOL;
        } else {
            $correctAnswer = ($currentNumber % 2 === 0) ? 'yes' : 'no';
            print_r("'{$answer}' is wrong answer ;(. Correct answer was {$correctAnswer}");
            echo PHP_EOL;
            print_r("Let's try again, {$name}.");
            echo PHP_EOL;
            $numberOfAnswer = 0;
        }
    }
}
