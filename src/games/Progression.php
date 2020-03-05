<?php

namespace BrainGames\BrainProgression;

use Logic\NUMBER_OF_ROUNDS;

use function Logic\getQuestion;

function run()
{
    $gameCondition = 'What number is missing in the progression?';
    $questionsAndAnswers = [];
    $maxNumber = 100;
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
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
        $questionsAndAnswers[] = ['question' => trim($currentQuestion), 'correctAnswer' => $correctAnswer];
    }
    getQuestion($questionsAndAnswers, $gameCondition);
}
