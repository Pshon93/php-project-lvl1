<?php

namespace BrainGames\BrainProgression;

//use function cli\line;
//use function cli\prompt;
use function BrainGames\BrainLogic\greet;
use function BrainGames\BrainLogic\nameRequest;
use function BrainGames\BrainLogic\congratulations;
use function BrainGames\BrainLogic\getQuestion;

function run()
{
    $str = 'What number is missing in the progression?';
    greet($str);
    $nameOfGamer = nameRequest();
    $victoryCondition = 3;
    $answerCount = 0;
    $maxNumber = 100;
    while ($answerCount < $victoryCondition) {
        $firstMemberOfProgression = rand(0, $maxNumber);
        $maxStep = 5;
        $lengthOfProgression = 10;
        $currentStep = rand(1, $maxStep);
        $missingPosition = rand(0, $lengthOfProgression - 1);
        $correctAnswer = $firstMemberOfProgression + $currentStep * $missingPosition;
        $currentQuestion = '';
        for ($i = 0; $i < $lengthOfProgression; $i++) {
            if ($i === $missingPosition) {
                $currentQuestion .= '..' . ' ';
            } else {
                $currentQuestion .= ($firstMemberOfProgression + $i * $currentStep) . ' ';
            }
        }
        getQuestion($currentQuestion, $correctAnswer, $nameOfGamer) ? ($answerCount += 1) : ($answerCount = 0);
    }
    congratulations($nameOfGamer);
}
