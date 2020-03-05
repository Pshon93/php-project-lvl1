<?php

namespace BrainGames\BrainPrime;

use Logic\NUMBER_OF_ROUNDS;

use function Logic\getQuestion;

function run()
{
    $gameCondition = 'Answer "yes" if given number is prime, otherwise answer "no".';
    $questionsAndAnswers = [];
    $answerCount = 0;
    $maxNumber = 100;
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $currentQuestion = rand(2, $maxNumber);
        $correctAnswer = isPrime($currentQuestion) ? 'yes' : 'no';
        $questionsAndAnswers[] = ['question' => $currentQuestion, 'correctAnswer' => $correctAnswer];
    }
    getQuestion($questionsAndAnswers, $gameCondition);
}

function isPrime($number)
{
    for ($j = 2; $j < $number; $j++) {
        if ($number % $j === 0) {
            $result = false;
            return $result;
        } else {
            $result = true;
        }
    }
    return $result;
}
