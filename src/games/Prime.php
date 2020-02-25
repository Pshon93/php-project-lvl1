<?php

namespace BrainGames\BrainPrime;

//use function cli\line;
//use function cli\prompt;
use function BrainGames\BrainLogic\greet;
use function BrainGames\BrainLogic\nameRequest;
use function BrainGames\BrainLogic\congratulations;
use function BrainGames\BrainLogic\getQuestion;

function run()
{
    $str = 'Answer "yes" if given number is prime, otherwise answer "no".';
    greet($str);
    $questions = [];
    $victoryCondition = 3;
    $answerCount = 0;
    $maxNumber = 100;
    while ($answerCount < $victoryCondition) {
        $currentQuestion = rand(2, $maxNumber);
        $correctAnswer = 'yes';
        for ($i = 2; $i < sqrt($currentQuestion); $i++) {
            if ($currentQuestion % $i === 0) {
                $correctAnswer = 'no';
                break;
            } else {
                $correctAnswer = 'yes';
            }
        }
        $questions[] = ['Question' => $currentQuestion, 'CorrectAnswer' => $correctAnswer];
        $answerCount += 1;
    }
    getQuestion($questions);
}
