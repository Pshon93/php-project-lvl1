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
    $str = 'Welcome to the Brain Game!' . PHP_EOL . 'Answer "yes" if the number is even, otherwise answer "no".';
    greet($str);
    $nameOfGamer = nameRequest();

    $answerCount = 0;
    $maxNumber = 100;
    while ($answerCount < 3) {
        $currentQuestion = rand(0, $maxNumber);
        $correctAnswer = ($currentQuestion % 2 === 0) ? 'yes' : 'no';
        getQuestion($currentQuestion, $correctAnswer, $nameOfGamer) ? ($answerCount += 1) : ($answerCount = 0);
    }
    congratulations($nameOfGamer);
}
