<?php

namespace BrainGames\BrainEven;

use function Logic\getQuestion;

function run()
{
    $str = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questions = [];
    $victoryCondition = 3;
    $answerCount = 0;
    $maxNumber = 100;
    while ($answerCount < $victoryCondition) {
        $currentQuestion = rand(0, $maxNumber);
        $correctAnswer = ($currentQuestion % 2 === 0) ? 'yes' : 'no';
        $questions[] = ['Question' => $currentQuestion, 'CorrectAnswer' => $correctAnswer];
        $answerCount += 1;
    }
    getQuestion($questions, $str);
}
