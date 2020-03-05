<?php

namespace BrainGames\BrainEven;

use Logic\NUMBER_OF_ROUNDS;

use function Logic\getQuestion;

function run()
{
    $gameCondition = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questionsAndAnswers = [];
    $answerCount = 0;
    $maxNumber = 100;
    for ($i = 1; $i < NUMBER_OF_ROUNDS; $i++) {
        $currentQuestion = rand(0, $maxNumber);
        $correctAnswer = ($currentQuestion % 2 === 0) ? 'yes' : 'no';
        $questionsAndAnswers[] = ['question' => $currentQuestion, 'correctAnswer' => $correctAnswer];
    }
    getQuestion($questionsAndAnswers, $gameCondition);
}
