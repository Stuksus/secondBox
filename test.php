<?php
include  'GdGeneration.php';
$diplome = new GdGeneration();
error_reporting(E_ERROR);

$testName = $_GET['load'];
$json = file_get_contents(__DIR__ . "/test/$testName");
$decode = json_decode($json, true);
array_unshift($decode, null);
unset($decode[0]);
echo "<form method=\"post\">";
$a = 0;
for($i = 1,$quantity = count($decode); $i <= $quantity;$i++){
    $quantityIN = count($decode[$i]["variants"]);
    $quantityIN--;

    echo "<p><b>", $decode[$i]['questions'],
    "</b><Br>";
    while($a <= $quantityIN){


        echo "<input type=\"radio\" name=\"question".$i,
        "\"value=\"", $decode[$i]['variants'][$a],
        "\">", $decode[$i]["variants"][$a],
        "<Br>";
        $a++;
    }
    $a = 0;
}

for ($i = 1,$quantity = count($decode); $i <= $quantity;$i++) {

    if ($decode[$i]['right'] == $_POST['question' . $i]) {

        $n+=1;
    }
}
echo "<input type=\"submit\" name=\"OK\" value=\"Отправить\">
</form>";

$dataName = json_decode(file_get_contents(__DIR__."/data.json"),true);
$name47 = $_COOKIE['guestName'];
$adminName = $dataName[0]['name'];
$total= round($n/($quantity/100));


if (isset($_POST['OK'])){


        if (is_null($name47) || empty($_COOKIE['guestName'])) {
            $diplome->Gd_Generation($name47, $total, $n,$quantity);
        }else{
            $diplome->Gd_Generation($name47, $total, $n,$quantity);
        }
}

?>

