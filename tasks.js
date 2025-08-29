$(document).ready(function () {
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

  // Close filter on overlay click
  $(document).on("click", ".al-overlay3", function (event) {
    if ($(this).hasClass("zi10101")) {
      $(".al-overlay3").addClass("hide");
      $("#tasks-filter-block").addClass("hide").css("display", "none");
      $("#calendar-task-details-modal").addClass("hide");
      $("body").removeClass("modal-open");
    }
  });

  // Close filter on close button click
  $(document).on("click", ".bk-filter-header .close", function (event) {
    $(".al-overlay3").addClass("hide");
    $("#tasks-filter-block").addClass("hide").css("display", "none");
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
    moreLinkContent: function(args) {
      return '+ ще ' + args.num;
    },
    eventClick: function(info) {
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

  // Initial view setup on page load
  updateTaskView();
});
