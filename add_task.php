<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "plan";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Ошибка подключения :" . mysqli_connect_error());
} else {
    echo "Успешное подключение к БД";
}


if (
    isset($_POST['task']) && !empty($_POST['task']) &&
    isset($_POST['task_date']) && !empty($_POST['task_date']) &&
    isset($_POST['task_time']) && !empty($_POST['task_time']) &&
    isset($_POST['priority']) && !empty($_POST['priority'])
) {
    // Защищаем от SQL инъукций
    // mysqli_real_escape_string() - икранирует специальные символы в строке для использования SQL выражений
    $task = mysqli_real_escape_string($connection, $_POST['task']);
    $task_date = mysqli_real_escape_string($connection, $_POST['task_date']);
    $task_time = mysqli_real_escape_string($connection, $_POST['task_time']);
    $priority = mysqli_real_escape_string($connection, $_POST['priority	']);

    // Создаём SQL - запрос для вставки новой задачи в БД
    $query = "INSERT INTO tasks (task, task_date, task_time, priority) VALUE ('$task', '$task_date', '$task_time', '$priority')";
    // Выполняем SQL - запрос
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Если запрос выполнился успешно
        header("Location: index.php"); // Перенаправляем пользователя на главную страницу
    } else {
        // Если запрос не выполнился успешно
        echo "Ошибка при добавлении задачи"; // Выводим сообщение об ошибки
    }
}


mysqli_close($connection); // Закрываем соеденение с БД
