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

$query = "SELECT * FROM tasks ORDER BY task_date ASC, task_time ASC";

$result = mysqli_query($connection, $query);

$tasks = [];

while ($row = mysqli_fetch_assoc($result)) {
    // mysqli_fetch_assoc - выбирает одну строку данных из набора результатов и возвращает её ввиде ассоциативного массива
    // кажый последующий вызов этой функиции будет возвращать следующую стороку в наборе результатов или null если строк больше нет
    $tasks[] = $row; // добавление выполенной задачи в массив
}


echo json_encode($tasks); // приобразует массив в формат json и выводим на экран

mysqli_close($connection); // закрытие соединения с БД
