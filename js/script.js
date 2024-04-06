// функция загрузки и отображения задач на странице
function loadTasks() {
    fetch('get_tasks.php') // отправка GET запроса на сервер для получения задач
        .then((response) => {
            // Декодирует ответ в формате JSON
            return response.json()
        })
        .then((data) => {
            // В параметр data поступает результат декодирования ответа в формате JSON 
            // Тоесть получаем данные полученным файлом get_taskst из БД 
            // На текущий момент в параметре data содержится декодирующий из JSON массив задач из БД
            console.log(data)
            // Получение элемента списка задач
            const taskList = document.querySelector('#task-list');
            // Отчистка списка задач перед обновлением
            taskList.innerHTML = '';
            // Перебираем полученный массив задач
            data.forEach((tasks) => {
                // создать новый элемент списка
                const listItem = document.createElement('li');
                listItem.innerHTML =
                    `Дата : ${tasks.tasks_date}
                    <br>Время:${tasks.tasks_time}
                    <br>Задача:${tasks.tasks}
                    <br>Время:${tasks.priority}`

                taskList.appendChild(listItem);
            })

        })
        .catch((error) => {
            console.log("Ошибка при загрузки задачи!");
        })
}

loadTasks();
