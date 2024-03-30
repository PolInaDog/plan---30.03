<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Планировщик задач</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <h1 class="title">Мои задачи</h1>
        <div class="app" id="app">
            <form action="add_task.php" method="post" class="from">
                <input class="form_row" type="text" name="task" placeholder="Добавить задачу" required>
                <input class="form_row" type="date" name="task_date" required>
                <input class="form_row" type="time" name="task_time" required>
                <select name="form_row" name="priority">
                    <option value="low">Низкая важность</option>
                    <option value="medium">Средняя важность</option>
                    <option value="high">Высокая важность</option>
                </select>
                <button class="btn" type="submit">Добавить</button>
            </form>
            <ul id="task-list"></ul>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>