<?php

namespace BrainGames\BrainPrime;

use function Logic\getQuestion;
use function Logic\getNumberOfRounds;

function run()
{
    $gameCondition = 'Answer "yes" if given number is prime, otherwise answer "no".';
    $questionsAndAnswers = [];
    $answerCount = 0;
    $maxNumber = 100;
    for ($i = 0; $i < getNumberOfRounds(); $i++) {
        $currentQuestion = rand(2, $maxNumber);
        $correctAnswer = isPrime($currentQuestion) ? 'yes' : 'no';
        $questionsAndAnswers[] = ['question' => $currentQuestion, 'correctAnswer' => $correctAnswer];
    }
    getQuestion($questionsAndAnswers, $gameCondition);
}

function isPrime($number)
{
    for ($j = 2; $j < sqrt($number); $j++) {
        if ($number % $j === 0) {
            $result = false;
            return $result;
        } else {
            $result = true;
        }
    }
    return $result;
}
