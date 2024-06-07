document.addEventListener('DOMContentLoaded', () => {
    const newTaskInput = document.getElementById('new-task').required;
    const addTaskButton = document.getElementById('add-task');
    const taskList = document.getElementById('task-list');
    const clearAllButton = document.getElementById('clear-all');
    const pendingTasks = document.getElementById('pending-tasks');

    let tasks = [];

    function updatePendingTasks() {
        pendingTasks.textContent = `You have ${tasks.length} pending task.`;
    }

    function renderTasks() {
        taskList.innerHTML = '';
        tasks.forEach((task, index) => {
            const taskItem = document.createElement('li');
            taskItem.textContent = task;

            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.classList.add('delete-btn');

            const inn = document.createElement('input');
            inn.setAttribute('name', 'inn[]');
            inn.setAttribute('value', task);
            inn.setAttribute('type', 'hidden');
            deleteButton.onclick = () => {
                tasks.splice(index, 1);
                renderTasks();
                updatePendingTasks();
            };

            taskItem.appendChild(deleteButton);
            taskItem.appendChild(inn);
            taskList.appendChild(taskItem);
        });
    }

    addTaskButton.addEventListener('click', () => {
        const newTask = newTaskInput.value.trim();
        if (newTask) {
            tasks.push(newTask);
            newTaskInput.value = '';
            renderTasks();
            updatePendingTasks();
        }
    });

    clearAllButton.addEventListener('click', () => {
        tasks = [];
        renderTasks();
        updatePendingTasks();
    });

    updatePendingTasks();
});