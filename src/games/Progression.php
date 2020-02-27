<?php

namespace BrainGames\BrainProgression;

use function Logic\getQuestion;

function run()
{
    $str = 'What number is missing in the progression?';
    $questions = [];
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
                $currentQuestion .= '.. ';
            } else {
                $currentMemember = $firstMemberOfProgression + $i * $currentStep;
                $currentQuestion .= "$currentMemember ";
            }
        }
        $questions[] = ['Question' => $currentQuestion, 'CorrectAnswer' => $correctAnswer];
        $answerCount += 1;
    }
    getQuestion($questions, $str);
}
