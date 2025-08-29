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
    } else { // Box view (calendar)
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
  $(".tasks-view-type .view-item").on("click", function() {
    const $this = $(this);
    // No need to check if it's already active
    $(".tasks-view-type .view-item").removeClass("active");
    $this.addClass("active");
    updateTaskView();
  });

  //! Filter functionality
  $(".tasks-filter-btn").on("click", function (event) {
    event.preventDefault();
    $('.al-overlay3').removeClass('hide');
    $('#tasks-filter-block').removeClass('hide').css("display", "block");
  });

  // Close filter on overlay click
  $(document).on("click", ".al-overlay3", function (event) {
    if ($(this).hasClass('zi10101')) {
      $('.al-overlay3').addClass('hide');
      $('#tasks-filter-block').addClass('hide').css("display", "none");
      $('#calendar-task-details-modal').addClass('hide');
      $("body").removeClass("modal-open");
    }
  });

  // Close filter on close button click
  $(document).on("click", ".bk-filter-header .close", function (event) {
     $('.al-overlay3').addClass('hide');
     $('#tasks-filter-block').addClass('hide').css("display", "none");
   });

  //! Calendar functionality
  var pendingCalendar = null;
  var overdueCalendar = null;

  function initPendingCalendar() {
    if (!pendingCalendar) {
      var calendarEl = document.getElementById('pending-tasks-calendar');
      pendingCalendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'uk',
        buttonText: { today: 'Сьогодні' },
        headerToolbar: { left: 'today prev,title,next', center: '', right: 'customList' },
        customButtons: { customList: { text: ' ' } },
        editable: true,
        eventClick: function(info) {
          info.jsEvent.preventDefault();
          $("#calendar-task-details-modal").removeClass("hide");
          $(".al-overlay3").removeClass("hide");
          $("body").addClass("modal-open");
        },
        events: [ // Sample data for pending tasks
          { title: 'Pending Task 1', start: '2025-08-05', className: 'fc-event-important' },
          { title: 'Pending Task 2', start: '2025-08-08', className: 'fc-event-usual' },
          { title: 'Pending Task 3', start: '2025-08-08', className: 'fc-event-extra-important' }
        ]
      });
      pendingCalendar.render();
      // This custom button content should probably be specific to the calendar
      $(calendarEl).find(".fc-customList-button").html('<ul><li><span>Звичайний:</span><span class="custom-list-tasks-number">1</span></li><li><span>Важливо:</span><span class="custom-list-tasks-number">1</span></li><li><span>Дуже важливо:</span><span class="custom-list-tasks-number">0</span></li></ul>');
    }
  }

  function initOverdueCalendar() {
    if (!overdueCalendar) {
      var calendarEl = document.getElementById('overdue-tasks-calendar');
      overdueCalendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'uk',
        buttonText: { today: 'Сьогодні' },
        headerToolbar: { left: 'today prev,title,next', center: '', right: 'customList' },
        customButtons: { customList: { text: ' ' } },
        editable: true,
        eventClick: function(info) {
          info.jsEvent.preventDefault();
          $("#calendar-task-details-modal").removeClass("hide");
          $(".al-overlay3").removeClass("hide");
          $("body").addClass("modal-open");
        },
        events: [ // Sample data for overdue tasks
          { title: 'Overdue Task 1', start: '2025-08-01', color: 'red' },
          { title: 'Overdue Task 2', start: '2025-08-03', color: 'red' }
        ]
      });
      overdueCalendar.render();
      $(calendarEl).find(".fc-customList-button").html('<ul><li><span>Звичайний:</span><span class="custom-list-tasks-number">0</span></li><li><span>Важливо:</span><span class="custom-list-tasks-number">2</span></li><li><span>Дуже важливо:</span><span class="custom-list-tasks-number">0</span></li></ul>');
    }
  }

  // Initial view setup on page load
  updateTaskView();
});