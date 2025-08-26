$(document).ready(function () {
  $(".tasks-table-body").on(
    "click",
    ".task-summary-grid, .details-content",
    function (e) {
      const parentRow = $(this).closest(".task-row-item");

      // Если кликнули по блоку с деталями - просто закрываем
      if ($(this).hasClass("details-content")) {
        parentRow.removeClass("expanded");
        return; // Завершаем выполнение
      }

      // --- Иначе, это клик по верхней части, работает логика аккордеона ---

      // Проверяем, была ли строка уже открыта
      const isAlreadyExpanded = parentRow.hasClass("expanded");

      // Сначала закрываем все открытые строки
      $(".task-row-item.expanded").removeClass("expanded");

      // Если строка не была открыта, открываем ее
      if (!isAlreadyExpanded) {
        parentRow.addClass("expanded");
      }
    }
  );
});
