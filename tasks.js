$(document).ready(function () {
  // Accordion functionality
  $(".tasks-table-body").on("click", ".task-summary-grid", function (e) {
    const parentRow = $(this).closest(".task-row-item");
    const isAlreadyExpanded = parentRow.hasClass("expanded");
    $(".task-row-item.expanded").removeClass("expanded");
    if (!isAlreadyExpanded) {
      parentRow.addClass("expanded");
    }
  });

  // Tab functionality using event delegation
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

  // Tab functionality for main tasks tabs
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

  // Filter functionality
  $(".tasks-filter-btn").on("click", function (event) {
    event.preventDefault();
    $('.al-overlay3').removeClass('hide');
    $('#tasks-filter-block').removeClass('hide');
  });

  // Close filter on overlay click
  $(document).on("click", ".al-overlay3", function (event) {
    if ($(this).hasClass('zi10101')) {
      $('.al-overlay3').addClass('hide');
      $('#tasks-filter-block').addClass('hide');
    }
  });

  // Close filter on close button click
  $(document).on("click", ".bk-filter-header .close", function (event) {
    $('.al-overlay3').addClass('hide');
    $('#tasks-filter-block').addClass('hide');
  });
});