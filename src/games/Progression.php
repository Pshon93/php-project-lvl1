<?php

namespace BrainGames\BrainProgression;

use function Logic\getQuestion;
use function Logic\getNumberOfRounds;

function run()
{
    $gameCondition = 'What number is missing in the progression?';
    $questionsAndAnswers = [];
    $answerCount = 0;
    $maxNumber = 100;
    for ($i = 0; $i < getNumberOfRounds(); $i++) {
        $firstMemberOfProgression = rand(0, $maxNumber);
        $maxStep = 5;
        $lengthOfProgression = 10;
        $currentStep = rand(1, $maxStep);
        $missingPosition = rand(0, $lengthOfProgression - 1);
        $correctAnswer = $firstMemberOfProgression + $currentStep * $missingPosition;
        $currentQuestion = '';
        for ($j = 0; $j < $lengthOfProgression; $j++) {
            if ($j === $missingPosition) {
                $currentQuestion = "$currentQuestion .. ";
            } else {
                $currentMemember = $firstMemberOfProgression + $j * $currentStep;
                $currentQuestion = "$currentQuestion $currentMemember ";
            }
        }
        $currentQuestion = trim($currentQuestion);
        $questionsAndAnswers[] = ['question' => $currentQuestion, 'correctAnswer' => $correctAnswer];
    }
    getQuestion($questionsAndAnswers, $gameCondition);
}
