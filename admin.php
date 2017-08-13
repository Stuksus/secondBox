<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Панеь загрузки тестов</title>
</head>
<body>
<form method="post" action="list.php">
    <input type="submit" value="Выйти">
</form>
<form enctype="multipart/form-data" method="post">
    <input name="name">
    <input type="file" name="uploadFile">
    <input type="submit" name="submit" value="Отправить">
</form>
</body>
</html>

<?php
error_reporting(E_ERROR);
if(empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW'])) {
    header("Location: http://university.netology.ru/u/smetanin/me678/login.php");
    die();
}
if (isset($_POST['submit']) && empty($_FILES['uploadFile'])) {
    header("Location: http://university.netology.ru/u/smetanin/me678/list.php");
}
$dataName = json_decode(file_get_contents(__DIR__."/data.json"),true);
$adminName = $dataName[0]['name'];
echo "Здраствуйте, $adminName!<br>";
if (is_null($_FILES['uploadFile'])) {
    echo 'Добавьте новый тест на сайт';
    exit();
}

$json = $_FILES['uploadFile'];      //получаем данные о загруженном файле
$filename = $json['name'];          // сохраняем в переменную его имя
$nameVar = $_POST['name'];

$Name = fopen('nameFile', 'a+'); //открываем файл, в котором будут храниться  именя файлов загруженных на сервер
trim(fwrite($Name, $nameVar . " "));       //записываем имена в файл черех пробел и удаляем пробелы на кончах файла
fclose($Name);       // закрываем файл


if (move_uploaded_file($json['tmp_name'], __DIR__ . "/test/$filename")) {       //проверяем файл на наличие на сервере
    echo 'Тест успешно загружен';
} else {
    echo 'К сожалению, произошла ошибка, загрузите файл повторно';

}