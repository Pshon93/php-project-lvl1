<?php

namespace BrainGames\BrainPrime;

use function Logic\getQuestion;

function run()
{
    $str = 'Answer "yes" if given number is prime, otherwise answer "no".';
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
    getQuestion($questions, $str);
}
