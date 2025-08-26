// Функционал клика на строку задачи

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
//_________________________________________________________

// Функционал клика на табы в деталях задачи
document.addEventListener("DOMContentLoaded", function () {
  const taskRows = document.querySelectorAll(".task-row-item");

  taskRows.forEach((row) => {
    const tabs = row.querySelectorAll(".details-wrapper .tasks-tab-btn");
    const tabContents = row.querySelectorAll(".details-wrapper .tab-content");

    tabs.forEach((tab) => {
      tab.addEventListener("click", function (event) {
        event.preventDefault();

        tabs.forEach((t) => t.classList.remove("active"));
        this.classList.add("active");

        const tabId = this.dataset.tab;

        tabContents.forEach((content) => {
          if (content.id === tabId) {
            content.style.display = "block";
          } else {
            content.style.display = "none";
          }
        });
      });
    });
  });
});
//_________________________________________________________
