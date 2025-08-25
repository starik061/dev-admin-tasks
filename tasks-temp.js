/**
 * ВРЕМЕННЫЕ СКРИПТЫ ДЛЯ СТРАНИЦЫ ЗАДАЧ
 * =====================================
 */

// Ожидаем загрузки DOM
$(document).ready(function() {
    console.log('Tasks page loaded');
    
    // Инициализация компонентов страницы
    initTasksPage();
});

/**
 * Инициализация страницы задач
 */
function initTasksPage() {
    console.log('Initializing tasks page...');
    
    // Инициализация обработчиков событий
    initEventHandlers();
    
    // Загрузка демо-данных (временно)
    loadDemoTasks();
    
    // Инициализация модальных окон
    initModals();
}

/**
 * Инициализация обработчиков событий
 */
function initEventHandlers() {
    // Обработчик клика по карточке задачи
    $(document).on('click', '.task-card', function() {
        const taskId = $(this).data('task-id');
        console.log('Task clicked:', taskId);
        // Здесь будет логика открытия задачи
    });
    
    // Обработчик изменения статуса
    $(document).on('change', '.task-status-select', function() {
        const newStatus = $(this).val();
        const taskId = $(this).closest('.task-card').data('task-id');
        updateTaskStatus(taskId, newStatus);
    });
    
    // Обработчик модального окна подтверждения
    $(document).on('click', '.confirm-popup2 .yes', function() {
        const action = $(this).data('action');
        executeConfirmedAction(action);
    });
    
    $(document).on('click', '.confirm-popup2 .cancel, .confirm-popup2 .close', function() {
        hideConfirmDialog();
    });
}

/**
 * Загрузка демо-задач (временная функция)
 */
function loadDemoTasks() {
    const demoTasks = [
        {
            id: 1,
            title: 'Создать новую страницу каталога',
            description: 'Разработать адаптивную страницу каталога с фильтрами и пагинацией',
            status: 'new',
            created_at: '2024-01-15'
        },
        {
            id: 2,
            title: 'Оптимизировать загрузку изображений',
            description: 'Внедрить lazy loading для изображений билбордов',
            status: 'in-progress',
            created_at: '2024-01-14'
        },
        {
            id: 3,
            title: 'Исправить баги в CRM',
            description: 'Устранить проблемы с сохранением данных клиентов',
            status: 'completed',
            created_at: '2024-01-13'
        }
    ];
    
    renderTasks(demoTasks);
}

/**
 * Отрисовка задач на странице
 */
function renderTasks(tasks) {
    const container = $('.leads-table');
    
    if (tasks.length === 0) {
        container.html('<p class="text-center">Задачи не найдены</p>');
        return;
    }
    
    let html = '<div class="tasks-container">';
    
    tasks.forEach(task => {
        html += `
            <div class="task-card" data-task-id="${task.id}">
                <div class="task-title">${task.title}</div>
                <div class="task-description">${task.description}</div>
                <div class="task-meta">
                    <span class="task-date">Создано: ${task.created_at}</span>
                    <span class="task-status ${task.status}">${getStatusText(task.status)}</span>
                </div>
            </div>
        `;
    });
    
    html += '</div>';
    container.html(html);
}

/**
 * Получение текста статуса на русском
 */
function getStatusText(status) {
    const statusTexts = {
        'new': 'Новая',
        'in-progress': 'В работе',
        'completed': 'Завершена'
    };
    
    return statusTexts[status] || status;
}

/**
 * Обновление статуса задачи
 */
function updateTaskStatus(taskId, newStatus) {
    console.log(`Updating task ${taskId} status to ${newStatus}`);
    
    // Здесь будет AJAX запрос к серверу
    // Пока просто обновляем интерфейс
    const taskCard = $(`.task-card[data-task-id="${taskId}"]`);
    const statusElement = taskCard.find('.task-status');
    
    statusElement.removeClass('new in-progress completed').addClass(newStatus);
    statusElement.text(getStatusText(newStatus));
    
    // Показываем уведомление
    showNotification('Статус задачи обновлен', 'success');
}

/**
 * Показ диалога подтверждения
 */
function showConfirmDialog(title, message, action) {
    const popup = $('.confirm-popup2');
    popup.find('.confirm-title').text(title);
    popup.find('.confirm-message').text(message);
    popup.find('.yes').data('action', action);
    popup.show();
    $('.al-overlay3').show();
}

/**
 * Скрытие диалога подтверждения
 */
function hideConfirmDialog() {
    $('.confirm-popup2').hide();
    $('.al-overlay3').hide();
}

/**
 * Выполнение подтвержденного действия
 */
function executeConfirmedAction(action) {
    console.log('Executing action:', action);
    
    switch(action) {
        case 'delete-task':
            // Логика удаления задачи
            break;
        case 'complete-task':
            // Логика завершения задачи
            break;
        default:
            console.log('Unknown action:', action);
    }
    
    hideConfirmDialog();
}

/**
 * Инициализация модальных окон
 */
function initModals() {
    // Закрытие модальных окон по клику на overlay
    $(document).on('click', '.al-overlay3', function() {
        hideConfirmDialog();
    });
    
    // Закрытие по ESC
    $(document).on('keydown', function(e) {
        if (e.keyCode === 27) { // ESC
            hideConfirmDialog();
        }
    });
}

/**
 * Показ уведомления (если есть toastr)
 */
function showNotification(message, type = 'info') {
    if (typeof toastr !== 'undefined') {
        toastr[type](message);
    } else {
        console.log(`${type.toUpperCase()}: ${message}`);
    }
}

/**
 * Утилитарные функции
 */
const TasksUtils = {
    // Форматирование даты
    formatDate: function(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('ru-RU');
    },
    
    // Валидация данных задачи
    validateTask: function(taskData) {
        return taskData.title && taskData.title.trim().length > 0;
    },
    
    // Создание ID для новой задачи
    generateTaskId: function() {
        return 'task_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
    }
};

// Экспорт для глобального использования
window.TasksPage = {
    init: initTasksPage,
    showConfirm: showConfirmDialog,
    hideConfirm: hideConfirmDialog,
    updateStatus: updateTaskStatus,
    utils: TasksUtils
};