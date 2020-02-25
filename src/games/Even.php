<?php

namespace BrainGames\BrainEven;

//use function cli\line;
//use function cli\prompt;
use function BrainGames\BrainLogic\greet;
use function BrainGames\BrainLogic\nameRequest;
use function BrainGames\BrainLogic\congratulations;
use function BrainGames\BrainLogic\getQuestion;

function run()
{
    $str = 'Answer "yes" if the number is even, otherwise answer "no".';
    greet($str);
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
    getQuestion($questions);
}
