<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "plan";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Ошибка подключения :" . mysqli_connect_error());
}
// проверяем если в массиве есть данные с ключом id то 
// экранируем данные хранящиеся под ключом id
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    // создаём заппрос на удаление
    $query = "DELETE FROM tasks WHERE id = '$id'";
    // проверяем что запрос выполнен успешно
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo 'Задача удалена';
    }
}

// закрываем соединение
mysqli_close($connection);
