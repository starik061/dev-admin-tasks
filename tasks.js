$(document).ready(function () {
  $(".tasks-table-body").on("click", ".task-summary-grid", function (e) {
    const parentRow = $(this).closest(".task-row-item");

    // Проверяем, была ли строка уже открыта
    const isAlreadyExpanded = parentRow.hasClass("expanded");

    // Сначала закрываем все открытые строки
    $(".task-row-item.expanded").removeClass("expanded");

    // Если строка не была открыта, открываем ее
    if (!isAlreadyExpanded) {
      parentRow.addClass("expanded");
    }
  });
});