<?php
// Start the session
session_start();
// Include questions from the questions.php file
include('questions.php');
// Make a variable to determine if the score will be shown or not. Set it to false.
$show_score = False;

// Create an empty array of questions already answered
if(!isset($_SESSION['used_indexes'])) {
    $_SESSION['used_indexes'] = array();
    $_SESSION['totalCorrect'] = 0;
}
// Make a variable to hold the toast message and set it to an empty string
$toast = null;
// Increment the score when user answer correctly and display messages for both correct and wrong answer
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST['answer'] == $questions[$_POST['id']]['correctAnswer']) {
        $toast = '<span style="color:forestgreen;">'."Weldone! Your answer is correct.".'</span>';
        $_SESSION['totalCorrect']++;
    } else {
        $toast = '<span style="color:red;">'.'BURMA!!! You got it wrong'.'</span>';
    }
}
// Count the number of questions and store it in a variable
$totalQuestions = count($questions);
// Show score when user had answered all the questions in the question array
// Run a loop to prevent repetition of questions
// Shuffle both questions and answers display
if(count($_SESSION['used_indexes']) == $totalQuestions) {
    $_SESSION['used_indexes'] = array();
    $show_score = True;
} else {
    $show_score = False;
    if(count($_SESSION['used_indexes']) == 0) {
        $_SESSION['totalCorrect'] = 0;
        $toast = '';
    }
    do {
        $index = rand(0, count($questions) - 1);
    } while (in_array($index, $_SESSION['used_indexes']));
    $question = $questions[$index];
    array_push($_SESSION['used_indexes'], $index);
    $answers = array($question['correctAnswer'],$question['firstIncorrectAnswer'],$question['secondIncorrectAnswer']);
    shuffle($answers);
}