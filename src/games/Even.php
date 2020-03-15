<?php

namespace BrainGames\src\games\BrainEven;

use BrainGames\src\Logic\NUMBER_OF_ROUNDS;

use function BrainGames\src\Logic\playGame;

function run()
{
    $gameCondition = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questionsAndAnswers = [];
    $maxNumber = 100;
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $currentQuestion = rand(0, $maxNumber);
        $correctAnswer = ($currentQuestion % 2 === 0) ? 'yes' : 'no';
        $questionsAndAnswers[] = ['question' => $currentQuestion, 'correctAnswer' => $correctAnswer];
    }
    playGame($questionsAndAnswers, $gameCondition);
}
