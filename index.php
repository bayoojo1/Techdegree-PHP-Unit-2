<?php 
include('inc/quiz.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
        <?php 
            if(!empty($toast) && $show_score == False) {
                echo '<p>' . $toast . '</p>';
            }
        ?><?php 
        if($show_score == False) {
            ?>
            <p class="breadcrumbs">Question <?php echo count($_SESSION['used_indexes']); ?> of <?php echo $totalQuestions; ?></p>
     
            <p class="quiz">What is <?php echo $question['leftAdder']; ?> + <?php echo $question['rightAdder']; ?>?</p>
            <form action="index.php" method="post">
                <input type="hidden" name="index" value="<?php echo $index; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $answers[0]; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $answers[1]; ?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $answers[2]; ?>" />
            </form>
        <?php } ?>
            <?php if($show_score == True) {?>
                    <p>Yap!</p>
                    <p>You got <?php echo $_SESSION['totalCorrect']; ?> of <?php echo $totalQuestions; ?> correct!</p>
            <?php } ?>
        </div>
    </div>
</body>
</html>