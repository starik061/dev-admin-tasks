$(document).ready(function () {
  // Инициализируем datetimepicker на инпуте
  $("#changeTaskTimeInput").daterangepicker(
    {
      singleDatePicker: true,
      timePicker: true,
      timePicker24Hour: true,
      locale: {
        format: "DD.MM.YYYY HH:mm",
        applyLabel: "Застосувати",
        cancelLabel: "Скасувати",
        fromLabel: "З",
        toLabel: "По",
        customRangeLabel: "Користувацький",
        weekLabel: "Т",
        daysOfWeek: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
        monthNames: ["Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень", "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень"],
        firstDay: 1,
      },
    },
    function (start, end, label) {
      $("#changeTaskTimeInput").val(start.format("DD.MM.YYYY HH:mm"));
    }
  );

  const changeTaskTimeInput = $("#changeTaskTimeInput");
  const changeTaskTimeBtn = changeTaskTimeInput.siblings(".complete-task-modal__show-datepicker-btn");

  // Открываем календарь по клику на инпут или кнопку
  changeTaskTimeInput.add(changeTaskTimeBtn).on("click", function (e) {
    e.preventDefault();
    changeTaskTimeInput.data("daterangepicker").show();
  });

  // Инициализация daterangepicker для полей фильтра с выбором диапазона
  const initDateRangePickerForFilter = (inputId) => {
    const input = $(`#${inputId}`);
    if (input.length === 0) return; // Не выполнять, если инпут не найден

    const pickerOptions = {
      autoUpdateInput: false, // Отключаем авто-обновление, чтобы показывать плейсхолдер
      locale: {
        format: "DD.MM.YYYY",
        applyLabel: "Застосувати",
        cancelLabel: "Очистити",
        fromLabel: "З",
        toLabel: "По",
        customRangeLabel: "Користувацький",
        weekLabel: "Т",
        daysOfWeek: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
        monthNames: ["Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень", "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень"],
        firstDay: 1,
      },
    };

    input.daterangepicker(pickerOptions);

    // Обработчик для кнопки "Застосувати"
    input.on("apply.daterangepicker", function (ev, picker) {
      $(this).val(picker.startDate.format("DD.MM.YYYY") + " - " + picker.endDate.format("DD.MM.YYYY"));
    });

    // Обработчик для кнопки "Очистити"
    input.on("cancel.daterangepicker", function (ev, picker) {
      $(this).val("");
    });

    // Открываем календарь по клику на инпут или на кнопку с иконкой
    const button = input.siblings(".complete-task-modal__show-datepicker-btn");
    input.add(button).on("click", function () {
      input.data("daterangepicker").show();
    });
  };

  // Применяем инициализацию к инпутам в панели фильтров
  initDateRangePickerForFilter("filterCreationDate");
  initDateRangePickerForFilter("filterDeadlineDate");
  initDateRangePickerForFilter("filterCompleteDate");

  // --- Инициализация Select2 ---

  // Общая конфигурация для Select2, чтобы избежать дублирования кода
  const select2Options = (parentEl) => ({
    dropdownParent: $(parentEl), // Указываем родительский элемент для выпадающего списка
    width: "100%", // Задаем ширину, чтобы соответствовать стилю
    minimumResultsForSearch: 0, // Показываем строку поиска внутри выпадающего списка
    multiple: true,
  });

  // Инициализация для селектов в панели фильтров
  $("#taskTypeFilter").select2(select2Options("#tasks-filter-block"));
  $("#taskStatusFilter").select2(select2Options("#tasks-filter-block"));
  // Специальная инициализация для селекта "Термін" с поддержкой HTML
  $("#taskTermFilter").select2({
    ...select2Options("#tasks-filter-block"),
    templateResult: function (data) {
      // Для плейсхолдера или если нет элемента, возвращаем просто текст
      if (!data.element) {
        return data.text;
      }
      // Возвращаем HTML-содержимое <option> как строку, чтобы не перемещать DOM-узлы
      return $(data.element).html();
    },
    templateSelection: function (data) {
      // Для выбранного элемента показываем только текстовое содержимое
      if (!data.element) {
        return data.text;
      }
      // Возвращаем HTML-содержимое, чтобы стили применились и к выбранному элементу
      return $(data.element).html();
    },
    escapeMarkup: function (markup) {
      // Разрешаем HTML, так как templateResult возвращает HTML-строку
      return markup;
    },
  });
  $("#tasksResponsibleFilter").select2(select2Options("#tasks-filter-block"));

  // Инициализация для селектов в модальном окне "Создать задачу"
  $("#create-task-type-select").select2(select2Options("#create-task-modal"));
  $("#create-task-priority").select2(select2Options("#create-task-modal"));
  $("#create-task-client").select2(select2Options("#create-task-modal"));
  $("#create-task-responsible").select2(select2Options("#create-task-modal"));

  // A single function to rule them all: updates the view based on active tab and view mode.
  function updateTaskView() {
    const activeTab = $(".main-tasks-tab-btn.active").data("tab"); // 'pending' or 'overdue'
    const isLineView = $(".line-view.view-item").hasClass("active");

    // Hide all content wrappers first
    $("#pending-tasks-tables-wrapper").hide();
    $("#overdue-tasks-tables-wrapper").hide();
    $("#pending-tasks-calendar").hide();
    $("#overdue-tasks-calendar").hide();

    if (isLineView) {
      if (activeTab === "pending") {
        $("#pending-tasks-tables-wrapper").show();
      } else if (activeTab === "overdue") {
        $("#overdue-tasks-tables-wrapper").show();
      }
    } else {
      // Box view (calendar)
      if (activeTab === "pending") {
        $("#pending-tasks-calendar").show();
        initPendingCalendar(); // Initialize the correct calendar
      } else if (activeTab === "overdue") {
        $("#overdue-tasks-calendar").show();
        initOverdueCalendar(); // Initialize the correct calendar
      }
    }
  }

  //! Accordion functionality
  $(".tasks-table-body").on("click", ".task-summary-grid", function (e) {
    const parentRow = $(this).closest(".task-row-item");
    const isAlreadyExpanded = parentRow.hasClass("expanded");
    $(".task-row-item.expanded").removeClass("expanded");
    if (!isAlreadyExpanded) {
      parentRow.addClass("expanded");
    }
  });

  //! Details tab functionality (inside accordion)
  $(".tasks-table-body").on("click", ".details-wrapper .tasks-tab-btn", function (event) {
    event.preventDefault();
    const $this = $(this);
    const $detailsWrapper = $this.closest(".details-wrapper");
    const tabId = $this.data("tab");

    $detailsWrapper.find(".tasks-tab-btn").removeClass("active");
    $this.addClass("active");

    $detailsWrapper.find(".tab-content").removeClass("active");
    $detailsWrapper.find(`.tab-content#${tabId}`).addClass("active");
  });

  //! Details tab functionality (inside modal)
  $("#calendar-task-details-modal").on("click", ".details-wrapper .tasks-tab-btn", function (event) {
    event.preventDefault();
    const $this = $(this);
    const $detailsWrapper = $this.closest(".details-wrapper");
    const tabId = $this.data("tab");

    $detailsWrapper.find(".tasks-tab-btn").removeClass("active");
    $this.addClass("active");

    $detailsWrapper.find(".tab-content").removeClass("active");
    $detailsWrapper.find(`.tab-content#${tabId}`).addClass("active");
  });

  // Set initial state for all detail tabs
  $(".task-row-item").each(function () {
    const $row = $(this);
    const $initialTab = $row.find(".details-wrapper .tasks-tab-btn.active");
    if ($initialTab.length) {
      const initialTabId = $initialTab.data("tab");
      $row.find(`.details-wrapper .tab-content#${initialTabId}`).addClass("active");
    }
  });

  //! Main tasks tabs click handler
  $(".main-tasks-tab-btn").on("click", function (event) {
    event.preventDefault();
    const $this = $(this);
    // No need to check if it's already active, just update and re-render
    $(".main-tasks-tab-btn").removeClass("active");
    $this.addClass("active");
    updateTaskView();
  });

  //! View type switcher click handler
  $(".tasks-view-type .view-item").on("click", function () {
    const $this = $(this);
    // No need to check if it's already active
    $(".tasks-view-type .view-item").removeClass("active");
    $this.addClass("active");
    updateTaskView();
  });

  //! Filter functionality
  $(".tasks-filter-btn").on("click", function (event) {
    event.preventDefault();
    $(".al-overlay3").removeClass("hide");
    $("#tasks-filter-block").removeClass("hide").css("display", "block");
  });

  // Close modals on overlay click
  $(document).on("click", ".al-overlay3", function (event) {
    if ($("#complete-task-modal").is(":visible") || $("#change-task-time-modal").is(":visible") || $("#create-task-modal").is(":visible")) {
      $("#complete-task-modal, #change-task-time-modal, #create-task-modal").css("display", "none");
      $("#calendar-task-details-modal").css("z-index", "10102");

      if ($("#calendar-task-details-modal").hasClass("hide")) {
        $(".al-overlay3").addClass("hide");
        $("body").removeClass("modal-open");
      }
    } else if ($("#calendar-task-details-modal").is(":visible")) {
      $("#calendar-task-details-modal").addClass("hide");
      $(".al-overlay3").addClass("hide");
      $("body").removeClass("modal-open");
    } else if ($("#tasks-filter-block").is(":visible")) {
      $("#tasks-filter-block").addClass("hide");
      $(".al-overlay3").addClass("hide");
    }
  });

  // Close filter on close button click
  $(document).on("click", "#tasks-filter-block .close", function (event) {
    $(".al-overlay3").addClass("hide");
    $("#tasks-filter-block").addClass("hide").css("display", "none");
  });

  //! "Complete task" modal functionality
  $(document).on("click", ".finish-task-btn", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(".al-overlay3.zi10101").removeClass("hide");
    $("#complete-task-modal").css("display", "block");
    $("body").addClass("modal-open");
    $("#calendar-task-details-modal").css("z-index", "10100");
  });

  $(document).on("click", "#complete-task-modal .close, #complete-task-modal .reset-task-btn", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $("#complete-task-modal").css("display", "none");
    $("#calendar-task-details-modal").css("z-index", "10102");

    if ($("#calendar-task-details-modal").hasClass("hide")) {
      $(".al-overlay3.zi10101").addClass("hide");
      $("body").removeClass("modal-open");
    }
  });

  //! "Change task time" modal functionality
  $(document).on("click", ".change-task-time-btn", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(".al-overlay3.zi10101").removeClass("hide");
    $("#change-task-time-modal").css("display", "block");
    $("body").addClass("modal-open");
    $("#calendar-task-details-modal").css("z-index", "10100");
  });

  $(document).on("click", "#change-task-time-modal .close, #change-task-time-modal .reset-task-btn", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $("#change-task-time-modal").css("display", "none");
    $("#calendar-task-details-modal").css("z-index", "10102");

    if ($("#calendar-task-details-modal").hasClass("hide")) {
      $(".al-overlay3.zi10101").addClass("hide");
      $("body").removeClass("modal-open");
    }
  });

  //! "Create task" modal functionality
  $(document).on("click", ".create-task-btn", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(".al-overlay3.zi10101").removeClass("hide");
    $("#create-task-modal").css("display", "block");
    $("body").addClass("modal-open");
    $("#calendar-task-details-modal").css("z-index", "10100");
  });

  $(document).on("click", "#create-task-modal .close, #create-task-modal .reset-task-btn", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $("#create-task-modal").css("display", "none");
    $("#calendar-task-details-modal").css("z-index", "10102");

    if ($("#calendar-task-details-modal").hasClass("hide")) {
      $(".al-overlay3.zi10101").addClass("hide");
      $("body").removeClass("modal-open");
    }
  });

  //! Calendar functionality
  var pendingCalendar = null;
  var overdueCalendar = null;

  const commonCalendarOptions = {
    initialView: "dayGridMonth",
    locale: "uk",
    buttonText: { today: "Сьогодні" },
    headerToolbar: { left: "today prev,title,next", center: "", right: "customList" },
    customButtons: { customList: { text: " " } },
    editable: true,
    dayMaxEvents: true,
    aspectRatio: 1.13,
    moreLinkContent: function (args) {
      return "+ ще " + args.num;
    },
    eventClick: function (info) {
      info.jsEvent.preventDefault();
      $("#calendar-task-details-modal").removeClass("hide");
      $(".al-overlay3").removeClass("hide");
      $("body").addClass("modal-open");
    },
  };

  function createCalendar(elementId, eventData, customListHTML) {
    var calendarEl = document.getElementById(elementId);
    if (calendarEl) {
      const calendar = new FullCalendar.Calendar(calendarEl, {
        ...commonCalendarOptions,
        events: eventData,
      });
      calendar.render();
      $(calendarEl).find(".fc-customList-button").html(customListHTML);
      return calendar;
    }
    return null;
  }

  function initPendingCalendar() {
    if (!pendingCalendar) {
      const events = [
        // Sample data for pending tasks
        // 8 tasks for Aug 1
        { title: "Task for Aug 1, #1", start: "2025-08-01", className: "fc-event-usual" },
        { title: "Task for Aug 1, #2", start: "2025-08-01", className: "fc-event-important" },
        { title: "Task for Aug 1, #3", start: "2025-08-01", className: "fc-event-extra-important" },
        { title: "Task for Aug 1, #4", start: "2025-08-01", className: "fc-event-usual" },
        { title: "Task for Aug 1, #5", start: "2025-08-01", className: "fc-event-important" },
        { title: "Task for Aug 1, #6", start: "2025-08-01", className: "fc-event-extra-important" },
        { title: "Task for Aug 1, #7", start: "2025-08-01", className: "fc-event-usual" },
        { title: "Task for Aug 1, #8", start: "2025-08-01", className: "fc-event-important" },

        // 1 task for Aug 2-3
        { title: "Task for Aug 2-3", start: "2025-08-02", end: "2025-08-04", className: "fc-event-extra-important" },

        // 8 tasks for Aug 4-5
        { title: "Task for Aug 4-5, #1", start: "2025-08-04", end: "2025-08-06", className: "fc-event-usual" },
        { title: "Task for Aug 4-5, #2", start: "2025-08-04", end: "2025-08-06", className: "fc-event-important" },
        { title: "Task for Aug 4-5, #3", start: "2025-08-04", end: "2025-08-06", className: "fc-event-extra-important" },
        { title: "Task for Aug 4-5, #4", start: "2025-08-04", end: "2025-08-06", className: "fc-event-usual" },
        { title: "Task for Aug 4-5, #5", start: "2025-08-04", end: "2025-08-06", className: "fc-event-important" },
        { title: "Task for Aug 4-5, #6", start: "2025-08-04", end: "2025-08-06", className: "fc-event-extra-important" },
        { title: "Task for Aug 4-5, #7", start: "2025-08-04", end: "2025-08-06", className: "fc-event-usual" },
        { title: "Task for Aug 4-5, #8", start: "2025-08-04", end: "2025-08-06", className: "fc-event-important" },
      ];
      const customList =
        '<ul><li><span>Звичайний:</span><span class="custom-list-tasks-number">1</span></li><li><span>Важливо:</span><span class="custom-list-tasks-number">1</span></li><li><span>Дуже важливо:</span><span class="custom-list-tasks-number">0</span></li></ul>';
      pendingCalendar = createCalendar("pending-tasks-calendar", events, customList);
    }
  }

  function initOverdueCalendar() {
    if (!overdueCalendar) {
      const events = [
        // Sample data for overdue tasks
        { title: "Overdue Task 1", start: "2025-08-01", className: "fc-event-extra-important" },
        { title: "Overdue Task 2", start: "2025-08-03", className: "fc-event-important" },
      ];
      const customList =
        '<ul><li><span>Звичайний:</span><span class="custom-list-tasks-number">0</span></li><li><span>Важливо:</span><span class="custom-list-tasks-number">2</span></li><li><span>Дуже важливо:</span><span class="custom-list-tasks-number">0</span></li></ul>';
      overdueCalendar = createCalendar("overdue-tasks-calendar", events, customList);
    }
  }

  // --- Логика для выбора диапазона дат в фильтре "Термін" ---

  // Используем делегирование событий, так как элементы select2 создаются динамически
  $("body").on("click", ".js-task-term-btn, .js-task-term-span", function (e) {
    e.preventDefault();
    e.stopPropagation(); // Останавливаем всплытие, чтобы select2 не закрылся

    // Находим span, на который будем вешать календарь
    const targetSpan = $(this).closest(".task-term-towork-input-wrapper").find(".js-task-term-span");

    // Если календарь уже инициализирован, просто показываем его
    if (targetSpan.data("daterangepicker")) {
      targetSpan.data("daterangepicker").show();
      return;
    }

    // Инициализация daterangepicker
    targetSpan.daterangepicker({
      autoUpdateInput: false, // Мы будем обновлять значение вручную
      locale: {
        format: "DD.MM.YYYY",
        separator: " - ",
        applyLabel: "Застосувати",
        cancelLabel: "Скасувати",
        fromLabel: "З",
        toLabel: "До",
        customRangeLabel: "Свій",
        weekLabel: "Т",
        daysOfWeek: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
        monthNames: ["Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень", "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень"],
        firstDay: 1,
      },
    });

    // Событие, которое срабатывает при нажатии на кнопку "Застосувати"
    targetSpan.on("apply.daterangepicker", function (ev, picker) {
      const newDate = picker.startDate.format("DD.MM.YYYY") + " - " + picker.endDate.format("DD.MM.YYYY");
      $(this).text(newDate); // Обновляем текст в выпадающем списке
      // Находим оригинальный <option> и обновляем его, чтобы сохранить значение
      $('#taskTermFilter option[value="fix-date"]').find(".js-task-term-span").text(newDate);
      $("#taskTermFilter").trigger("change.select2"); // Обновляем вид выбранного элемента
    });

    // Сразу открываем календарь после инициализации
    targetSpan.data("daterangepicker").show();
  });

  // Сбрасываем дату обратно на "Оберіть дату", когда пользователь снимает выбор с этой опции
  $("#taskTermFilter").on("select2:unselect", function (e) {
    const unselectedItem = e.params.data;
    if (unselectedItem.id === "fix-date") {
      $('#taskTermFilter option[value="fix-date"]').find(".js-task-term-span").text("Оберіть дату");
    }
  });

  // Initial view setup on page load
  updateTaskView();
});
