$(document).ready(function () {
  //! Accordion functionality
  $(".tasks-table-body").on("click", ".task-summary-grid", function (e) {
    const parentRow = $(this).closest(".task-row-item");
    const isAlreadyExpanded = parentRow.hasClass("expanded");
    $(".task-row-item.expanded").removeClass("expanded");
    if (!isAlreadyExpanded) {
      parentRow.addClass("expanded");
    }
  });

  //! Details tab functionality using event delegation
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

  // Set initial state for all tabs
  $(".task-row-item").each(function () {
    const $row = $(this);
    const $initialTab = $row.find(".details-wrapper .tasks-tab-btn.active");
    if ($initialTab.length) {
      const initialTabId = $initialTab.data("tab");
      $row.find(`.details-wrapper .tab-content#${initialTabId}`).addClass("active");
    }
  });

  //! Tab functionality for main tasks tabs
  $(".main-tasks-tab-btn").on("click", function (event) {
    event.preventDefault();
    const $this = $(this);
    const $tabsContainer = $this.closest(".main-tasks-tabs");
    const tabId = $this.data("tab");

    $tabsContainer.find(".main-tasks-tab-btn").removeClass("active");
    $this.addClass("active");

    // Hide all content
    $(".tasks-table-wrapper").hide();

    // Show corresponding content
    if (tabId === "pending") {
      $(".tasks-table-wrapper:not(.overdue-wrapper)").show();
    } else if (tabId === "overdue") {
      $(".overdue-wrapper").show();
    }
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
    }
  });

  // Close filter on close button click
  $(document).on("click", ".bk-filter-header .close", function (event) {
     $('.al-overlay3').addClass('hide');
     $('#tasks-filter-block').addClass('hide').css("display", "none");
   });

 });

//! View type switching functionality for tasks
 $(document).ready(function() {
   $(".tasks-view-type .view-item").on("click", function() {
     const $this = $(this);
     const targetUrl = $this.data("url");

     // Update active class
     $(".tasks-view-type .view-item").removeClass("active");
     $this.addClass("active");

     // Switch content visibility based on URL parameter
     if (targetUrl.includes("tmplt=calendar")) {
       $("#tasks-tables").hide();
       $("#tasks-calendar").show();
       initCalendar(); // Initialize calendar when shown
     } else {
       $("#tasks-tables").show();
       $("#tasks-calendar").hide();
     }
   });
 });

//! Calendar functionality
var calendar = null;  // Global calendar variable

function initCalendar() {
  if (!calendar) {
    var calendarEl = document.getElementById('tasks-calendar');
    calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth'
    });
    calendar.render();
  }
}

// Initialize calendar on page load
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('tasks-calendar');
  if (calendarEl && !calendarEl.hasAttribute('style') || !calendarEl.style.display === 'none') {
    initCalendar();
  }
});