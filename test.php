<?php
include  'GdGeneration.php';
include 'score.php';
$score = new score();
$diplome = new GdGeneration();
error_reporting(E_ERROR);
$n = 0;
$testName = $_GET['load'];
$json = file_get_contents(__DIR__ . "/test/$testName");
$decode = json_decode($json, true);
if ($decode[0]['question1'] == $_POST['question1']) {
    $n += 1;
}
if ($decode[0]["question2"] == $_POST['question2']) {
    $n += 1;
}
if ($decode[0]['question3'] == $_POST['question3']) {
    $n += 1;
}
if ($decode[0]['question4'] == $_POST['question4']) {
    $n += 1;
}
if ($decode[0]['question5'] == $_POST['question5']) {
    $n += 1;
}

$dataName = json_decode(file_get_contents(__DIR__."/data.json"),true);
$score = $score ->Test_Score($n);
$name47 = $_COOKIE['guestName'];
$adminName = $dataName[0]['name'];

if (isset($_POST['OK'])){

        if (is_null($name47) || empty($_COOKIE['guestName'])) {
            $diplome->Gd_Generation($adminName, $score, $n);
        }else{
            $diplome->Gd_Generation($name47, $score, $n);
        }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Тест 1</title>
</head>
<body>
<form method="post">
    <p><b><?= $decode[1]['answer'] ?></b><Br>
        <input type="radio" name="question1" value="<?= $decode[0]["question1"] ?>"> <?= $decode[0]["question1"] ?><Br>
        <input type="radio" name="question1"
               value="<?= $decode[2]["possibleAnswer1.1"] ?>"> <?= $decode[2]["possibleAnswer1.1"] ?><Br>
        <input type="radio" name="question1"
               value="<?= $decode[2]["possibleAnswer1.2"] ?>"> <?= $decode[2]["possibleAnswer1.2"] ?><Br>
    </p>

    <p><b><?= $decode[1]['answer2'] ?></b><Br>
        <input type="radio" name="question2"
               value="<?= $decode[2]["possibleAnswer2.1"] ?>"> <?= $decode[2]["possibleAnswer2.1"] ?><Br>
        <input type="radio" name="question2" value="<?= $decode[0]["question2"] ?>"> <?= $decode[0]["question2"] ?><Br>
        <input type="radio" name="question2"
               value="<?= $decode[2]["possibleAnswer2.2"] ?>"> <?= $decode[2]["possibleAnswer2.2"] ?><Br>
    </p>

    <p><b><?= $decode[1]['answer3'] ?></b><Br>
        <input type="radio" name="question3"
               value="<?= $decode[2]["possibleAnswer3.1"] ?>"> <?= $decode[2]["possibleAnswer3.1"] ?><Br>
        <input type="radio" name="question3"
               value="<?= $decode[2]["possibleAnswer3.2"] ?>"> <?= $decode[2]["possibleAnswer3.2"] ?><Br>
        <input type="radio" name="question3" value="<?= $decode[0]["question3"] ?>"> <?= $decode[0]["question3"] ?><Br>
    </p>

    <p><b><?= $decode[1]['answer4'] ?></b><Br>
        <input type="radio" name="question4" value="<?= $decode[0]["question4"] ?>"> <?= $decode[0]["question4"] ?><Br>
        <input type="radio" name="question4"
               value="<?= $decode[2]["possibleAnswer4.1"] ?>"> <?= $decode[2]["possibleAnswer4.1"] ?><Br>
        <input type="radio" name="question4"
               value="<?= $decode[2]["possibleAnswer4.2"] ?>"> <?= $decode[2]["possibleAnswer4.2"] ?><Br>
    </p>

    <p><b><?= $decode[1]['answer5'] ?></b><Br>
        <input type="radio" name="question5"
               value="<?= $decode[2]["possibleAnswer5.1"] ?>"> <?= $decode[2]["possibleAnswer5.1"] ?><Br>
        <input type="radio" name="question5" value="<?= $decode[0]["question5"] ?>"> <?= $decode[0]["question5"] ?><Br>
        <input type="radio" name="question5"
               value="<?= $decode[2]["possibleAnswer5.2"] ?>"> <?= $decode[2]["possibleAnswer5.2"] ?><Br>
    </p>
    <input type="submit" name="OK" value="Отправить">
</form>
</body>
</html>
