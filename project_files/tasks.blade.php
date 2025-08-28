@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
$webp = "";
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js'></script>
<script>
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

//! Calendar functionality

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('tasks-calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });
</script>
<style>
@import "common.css";
@font-face {
  font-family: "Helvetica Neue";
  src: url("./HelveticaNeueCyr-Roman.woff") format("woff");
  font-weight: normal;
  font-style: normal;
}
.main-temporary-container {
  max-width: 1460px;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  padding-top: 0px;
  padding-bottom: 0px;
  background: #fff;
  box-sizing: border-box;
}

#tasks-page-wrapper {
  font-family: "Helvetica Neue", Helvetica, "helvetica", Arial, sans-serif;
  font-style: normal;
  font-weight: normal;
}
#tasks-page-wrapper * {
  box-sizing: border-box;
}
#tasks-page-wrapper .title-row {
  padding: 22px 20px 12px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
#tasks-page-wrapper .title-row h1 {
  padding: 0;
  margin: 0;
  font-size: 34px;
  line-height: 41px;
  font-style: normal;
  font-weight: normal;
  color: #3d445c;
}
#tasks-page-wrapper .tasks-view-type {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 83px;
  height: 42px;
  right: 20px;
  top: 0;
}
#tasks-page-wrapper .view-item {
  position: static;
}
#tasks-page-wrapper .box-view {
  margin-left: -1px;
}
#tasks-page-wrapper .tasks-toolbar {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  gap: 16px;
  margin-bottom: 24px;
}
#tasks-page-wrapper .tasks-search-input {
  background: white;
  border: 1px solid #e8ebf1;
  border-radius: 4px;
  width: 340px;
  height: 42px;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 16px;
  color: #3d445c;
  padding: 0 11px;
  margin-right: auto;
}
#tasks-page-wrapper .tasks-search-input::placeholder {
  display: block;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 16px;
  color: #adb0b9;
  margin-bottom: 5px;
}
#tasks-page-wrapper .tasks-filter-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  padding: 12px 24px;
  background: white;
  border: 1px solid #e8ebf1;
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;
  color: #3d445c;
  height: 42px;
}
#tasks-page-wrapper .tasks-settings-btn {
  width: 42px;
  height: 42px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: white;
  border: 1px solid #e8ebf1;
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;
  color: #3d445c;
}
#tasks-page-wrapper .create-task-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  padding: 12px 24px;
  background: #fc6b40;
  border: 1px solid #fc6b40;
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;
  color: white;
  height: 42px;
}
#tasks-page-wrapper .tasks-tabs {
  margin: 0 0 20px;
  font-size: 14px;
  line-height: 1.2;
  color: #3d445c;
  border-bottom: solid 1px #e8ebf1;
}
#tasks-page-wrapper .tasks-tab-btn {
  font-family: "Helvetica Neue", Helvetica, "helvetica", Arial, sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 18px;
  line-height: 22px;
  color: #fc6b40;
  padding-bottom: 7px;
  display: inline-block;
  margin-right: 20px;
  border-bottom: 2px solid rgba(0, 0, 0, 0);
  text-decoration: none;
}
#tasks-page-wrapper .tasks-tab-btn.active {
  border-bottom: 2px solid #fc6b40;
  color: #3d445c;
}
#tasks-page-wrapper .tasks-table-wrapper {
  border-left: 1px solid #e8ebf1;
  border-right: 1px solid #e8ebf1;
  margin-bottom: 32px;
}
#tasks-page-wrapper .tasks-table {
  width: 100%;
  border-collapse: collapse;
}
#tasks-page-wrapper .tasks-table tr, #tasks-page-wrapper .tasks-table th {
  border-bottom: 1px solid #e8ebf1;
}
#tasks-page-wrapper .tasks-table-title {
  width: 100%;
  padding: 20px 16px;
  color: #3d445c;
  font-family: "Helvetica Neue", Helvetica, "helvetica", Arial, sans-serif;
  font-size: 20px;
  font-style: normal;
  font-weight: 500;
  line-height: 32px;
  border-top: 1px solid #e8ebf1;
  border-bottom: 1px solid #e8ebf1;
}
#tasks-page-wrapper .tasks-table-col {
  padding-right: 16px;
  padding-top: 16px;
  padding-bottom: 16px;
  padding-left: 0;
  color: #3d445c;
  font-family: "Helvetica Neue", Helvetica, "helvetica", Arial, sans-serif;
  font-size: 11px;
  font-style: normal;
  font-weight: 500;
  line-height: normal;
  text-transform: lowercase;
  text-align: left;
}
#tasks-page-wrapper .tasks-table-th-wrapper {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 5px;
}
#tasks-page-wrapper .sort-icon-wrapper {
  position: relative;
  width: 12px;
  height: 12px;
  flex-shrink: 0;
}
#tasks-page-wrapper .sort-button {
  position: absolute;
  top: -5px;
  left: -5px;
  right: -5px;
  bottom: -5px;
  width: auto;
  height: auto;
  background: transparent;
  border: none;
  cursor: n-resize;
  padding: 0;
}
#tasks-page-wrapper .sort-button:hover {
  background: #f5f5f5;
}
#tasks-page-wrapper .tasks-table-body .task-row-item td {
  padding: 0;
}
#tasks-page-wrapper .tasks-table-body .task-summary-grid {
  display: grid;
  grid-template-columns: 3% 9% 11% 12% 9% 11% 9% 9% 9% 9% 9%;
  align-items: center;
  cursor: pointer;
  padding-top: 16px;
  padding-bottom: 16px;
  overflow: hidden;
  transition: all 0.3s ease-out;
}
#tasks-page-wrapper .tasks-table-body .task-summary-grid:hover {
  background-color: #f5f5f5;
}
#tasks-page-wrapper .tasks-table-body .tasks-table-td {
  width: 100%;
  min-width: 0;
  padding-right: 16px;
  font-size: 13px;
  font-style: normal;
  font-weight: 400;
  line-height: 18px;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 2;
  line-clamp: 2;
  overflow: hidden;
  text-overflow: ellipsis;
}
#tasks-page-wrapper .tasks-table-body .tasks-table-td::first-letter {
  text-transform: uppercase;
}
#tasks-page-wrapper .tasks-table-body .tasks-table-td.tasks-table-col__client {
  color: #fc6b40;
}
#tasks-page-wrapper .tasks-table-body .row-expand-arrow-wrapper {
  width: 16px;
  height: 16px;
}
#tasks-page-wrapper .tasks-table-body .details-content {
  position: relative;
  background-color: #f5f5f5;
  max-height: 0;
  opacity: 0;
  padding: 0 20px;
  transition: all 0.3s ease-out;
}
#tasks-page-wrapper .tasks-table-body .tasks-table-col__accordeon-arrow svg {
  transform: rotate(90deg);
}
#tasks-page-wrapper .tasks-table-body .task-row-item.expanded .task-summary-grid {
  background-color: #f5f5f5;
  grid-template-columns: 3% 97%;
}
#tasks-page-wrapper .tasks-table-body .task-row-item.expanded .tasks-table-col__task-type {
  font-weight: 700;
  max-width: 50%;
}
#tasks-page-wrapper .tasks-table-body .task-row-item.expanded .tasks-table-col__priority, #tasks-page-wrapper .tasks-table-body .task-row-item.expanded .tasks-table-col__title, #tasks-page-wrapper .tasks-table-body .task-row-item.expanded .tasks-table-col__client, #tasks-page-wrapper .tasks-table-body .task-row-item.expanded .tasks-table-col__status, #tasks-page-wrapper .tasks-table-body .task-row-item.expanded .tasks-table-col__creation-time, #tasks-page-wrapper .tasks-table-body .task-row-item.expanded .tasks-table-col__dedline-time, #tasks-page-wrapper .tasks-table-body .task-row-item.expanded .tasks-table-col__initiator, #tasks-page-wrapper .tasks-table-body .task-row-item.expanded .tasks-table-col__responsible, #tasks-page-wrapper .tasks-table-body .task-row-item.expanded .tasks-table-col__completion-time {
  display: none;
}
#tasks-page-wrapper .tasks-table-body .task-row-item.expanded .details-content {
  max-height: 1200px;
  opacity: 1;
  padding: 0 20px 20px;
}
#tasks-page-wrapper .tasks-table-body .task-row-item.expanded .tasks-table-col__accordeon-arrow svg {
  transform: rotate(270deg);
}
#tasks-page-wrapper .tasks-table-body .tasks-table-col__accordeon-arrow svg {
  transition: transform 0.3s ease;
}
#tasks-page-wrapper .tasks-table-col__accordeon-arrow {
  width: 3%;
  padding-left: 16px;
  padding-right: 8px !important;
}
#tasks-page-wrapper .tasks-table-col__task-type {
  width: 9%;
}
#tasks-page-wrapper .tasks-table-col__priority {
  width: 11%;
}
#tasks-page-wrapper .tasks-table-col__title {
  width: 12%;
}
#tasks-page-wrapper .tasks-table-col__client {
  width: 9%;
}
#tasks-page-wrapper .tasks-table-col__status {
  width: 11%;
}
#tasks-page-wrapper .tasks-table-col__creation-time {
  width: 9%;
}
#tasks-page-wrapper .tasks-table-col__dedline-time {
  width: 9%;
}
#tasks-page-wrapper .tasks-table-col__initiator {
  width: 9%;
}
#tasks-page-wrapper .tasks-table-col__responsible {
  width: 9%;
}
#tasks-page-wrapper .tasks-table-col__completion-time {
  width: 9%;
}
#tasks-page-wrapper .usual {
  color: #4fb14b;
  background-color: #edf7ed;
  display: inline-block;
  padding: 3px 6px;
  border-radius: 4px;
}
#tasks-page-wrapper .important {
  color: #348af8;
  background-color: #ebf3fe;
  display: inline-block;
  padding: 3px 6px;
  border-radius: 4px;
}
#tasks-page-wrapper .extra-important {
  color: #fc6b40;
  background-color: #fce9e4;
  display: inline-block;
  padding: 3px 6px;
  border-radius: 4px;
}
#tasks-page-wrapper .details-wrapper {
  margin-bottom: 20px;
  padding: 20px;
  border-radius: 4px;
  background-color: white;
}
#tasks-page-wrapper .detais-table {
  border-collapse: separate;
  border-spacing: 0 15px;
  width: 100%;
}
#tasks-page-wrapper .detais-table__row-title {
  width: 200px;
  color: #3d445c;
  font-family: "Helvetica Neue", Helvetica, "helvetica", Arial, sans-serif;
  font-size: 13px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
}
#tasks-page-wrapper .detais-table .client-name {
  color: #fc6b40;
}
#tasks-page-wrapper .details-content-btn-wrapper {
  position: absolute;
  top: -40px;
  right: 20px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  gap: 10px;
  z-index: 2;
}
#tasks-page-wrapper .details-content-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 30px;
  height: 30px;
  border-radius: 4px;
  border: 1px solid #e8ebf1;
}
#tasks-page-wrapper .detais-bottom-btn-wrapper {
  width: 100%;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  gap: 12px;
}
#tasks-page-wrapper .finish-task-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 6px 12px;
  gap: 6px;
  background-color: #fc6b40;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
#tasks-page-wrapper .change-task-time-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 6px 12px;
  gap: 6px;
  background-color: transparent;
  color: #fc6b40;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.visually-hidden {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border: 0;
}

.show-tasks-panel {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 42px;
}

.show-tasks-btn {
  width: calc((100% - 2px) / 3);
  display: flex;
  justify-content: center;
  align-items: center;
  border: 1px solid #e8ebf1;
  height: 100%;
  cursor: pointer;
}

.show-tasks-radio:checked + .show-tasks-btn {
  border: 1px solid #fc6b40;
}

.show-tasks--btn__all {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}

.show-tasks--btn__clients {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}

.tasks-filter-modal-btn-wrapper {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
}

.show-task-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  padding: 12px 24px;
  background: #fc6b40;
  border: 1px solid #fc6b40;
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;
  color: white;
  height: 42px;
}

.reset-task-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  padding: 12px 24px;
  background: white;
  border: 1px solid #e8ebf1;
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;
  color: #3d445c;
  height: 42px;
}

/*# sourceMappingURL=tasks.css.map */

</style>
<section id="result-search-list" class="al-leeds-page">
  <div class="container-fluid container-fluid-base">
    <div class="row no-gutters">
      <div class="container container-base container-search-result manager-search mw1460">
          <div id="tasks-page-wrapper">
        <div class="title-row">
      <h1>Задачі</h1>
    </div>

    <div class="tasks-toolbar">
      <input class="tasks-search-input" type="text" name="tasks-search" value="" placeholder="Пошук" />

      <button class="tasks-settings-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
          <g clip-path="url(#clip0_11756_79313)">
            <path
              d="M7.55708 2.37233C7.602 1.87829 8.01622 1.5 8.51227 1.5H9.48773C9.98378 1.5 10.398 1.87829 10.4429 2.37233C10.4798 2.77794 10.7717 3.10907 11.1531 3.252C11.2511 3.28874 11.348 3.32793 11.4436 3.36947C11.821 3.53347 12.2648 3.50204 12.5809 3.23864C12.9715 2.91315 13.5458 2.93921 13.9053 3.29872L14.5938 3.98717C14.9366 4.32994 14.9614 4.87753 14.651 5.24994C14.3926 5.56012 14.3685 5.99809 14.5423 6.36256C14.6175 6.52039 14.6862 6.68194 14.748 6.84687C14.8909 7.22825 15.2221 7.52018 15.6277 7.55708C16.1217 7.602 16.5 8.01622 16.5 8.51227V9.48773C16.5 9.98378 16.1217 10.398 15.6277 10.4429C15.2221 10.4798 14.8909 10.7717 14.748 11.1531C14.6925 11.3012 14.6315 11.4465 14.5652 11.5889C14.404 11.9348 14.4301 12.3478 14.6743 12.641C14.9715 12.9975 14.9477 13.5218 14.6195 13.85L13.85 14.6195C13.5218 14.9477 12.9975 14.9715 12.641 14.6743C12.3478 14.4301 11.9348 14.404 11.5889 14.5652C11.4465 14.6315 11.3012 14.6925 11.1531 14.748C10.7717 14.8909 10.4798 15.2221 10.4429 15.6277C10.398 16.1217 9.98378 16.5 9.48773 16.5H8.51227C8.01622 16.5 7.602 16.1217 7.55708 15.6277C7.52018 15.2221 7.22825 14.8909 6.84688 14.748C6.68195 14.6862 6.5204 14.6175 6.36257 14.5423C5.99809 14.3685 5.56012 14.3926 5.24994 14.651C4.87753 14.9614 4.32994 14.9366 3.98716 14.5938L3.29872 13.9053C2.9392 13.5458 2.91315 12.9715 3.23864 12.5809C3.50204 12.2648 3.53347 11.821 3.36947 11.4436C3.32793 11.348 3.28875 11.2512 3.252 11.1531C3.10908 10.7717 2.77794 10.4798 2.37233 10.4429C1.87829 10.398 1.5 9.98378 1.5 9.48773V8.51227C1.5 8.01622 1.87829 7.602 2.37233 7.55708C2.77795 7.52018 3.10908 7.22826 3.25201 6.84688C3.2952 6.73163 3.34176 6.61801 3.39157 6.50617C3.56782 6.11037 3.53853 5.64193 3.26116 5.30908C2.92291 4.90319 2.94999 4.30634 3.32359 3.93274L3.93273 3.32359C4.30633 2.94999 4.90318 2.92291 5.30907 3.26116C5.64192 3.53854 6.11036 3.56782 6.50616 3.39157C6.61801 3.34176 6.73162 3.2952 6.84687 3.25201C7.22825 3.10908 7.52018 2.77795 7.55708 2.37233Z"
              stroke="#3D445C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path
              d="M11.25 9C11.25 10.2427 10.2427 11.25 9 11.25C7.75732 11.25 6.75 10.2427 6.75 9C6.75 7.75732 7.75732 6.75 9 6.75C10.2427 6.75 11.25 7.75732 11.25 9Z"
              stroke="#3D445C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          </g>
          <defs>
            <clipPath id="clip0_11756_79313">
              <rect width="18" height="18" fill="white" />
            </clipPath>
          </defs>
        </svg>
      </button>

      <button class="tasks-filter-btn">
        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M0.989754 1.01326C1.08192 0.814602 1.28101 0.6875 1.50001 0.6875H16.5C16.719 0.6875 16.9181 0.814602 17.0103 1.01326C17.1024 1.21191 17.0709 1.446 16.9295 1.61322L11.0625 8.55096V14.75C11.0625 14.945 10.9616 15.126 10.7957 15.2285C10.6299 15.331 10.4228 15.3403 10.2485 15.2531L7.24845 13.7531C7.05788 13.6578 6.93751 13.4631 6.93751 13.25V8.55096L1.0705 1.61322C0.929088 1.446 0.897583 1.21191 0.989754 1.01326ZM2.71237 1.8125L7.92952 7.98178C8.01539 8.08333 8.06251 8.21201 8.06251 8.345V12.9024L9.93751 13.8399V8.345C9.93751 8.21201 9.98463 8.08333 10.0705 7.98178L15.2877 1.8125H2.71237Z"
            fill="#FC6B40"></path>
        </svg>
        Фільтр
      </button>

      <button class="create-task-btn">Створити задачу</button>

      <div class="tasks-view-type">
        <div class="line-view view-item active" data-url="/manager/leads">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path d="M17.5 8.33337H2.5" />
            <path d="M17.5 5H2.5" />
            <path d="M17.5 11.6666H2.5" />
            <path d="M17.5 15H2.5" />
          </svg>
        </div>
        <div class="box-view view-item" data-url="/manager/leads?tmplt=kanban">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M13.168 1.66671C13.168 1.20647 12.7949 0.833374 12.3346 0.833374C11.8744 0.833374 11.5013 1.20647 11.5013 1.66671V2.50004H6.5013V1.66671C6.5013 1.20647 6.12821 0.833374 5.66797 0.833374C5.20773 0.833374 4.83464 1.20647 4.83464 1.66671V2.50004H3.16797C1.78726 2.50004 0.667969 3.61933 0.667969 5.00004V8.33337V16.6667C0.667969 18.0474 1.78726 19.1667 3.16797 19.1667H14.8346C16.2153 19.1667 17.3346 18.0474 17.3346 16.6667V8.33337V5.00004C17.3346 3.61933 16.2153 2.50004 14.8346 2.50004H13.168V1.66671ZM15.668 7.50004V5.00004C15.668 4.5398 15.2949 4.16671 14.8346 4.16671H13.168V5.00004C13.168 5.46028 12.7949 5.83337 12.3346 5.83337C11.8744 5.83337 11.5013 5.46028 11.5013 5.00004V4.16671H6.5013V5.00004C6.5013 5.46028 6.12821 5.83337 5.66797 5.83337C5.20773 5.83337 4.83464 5.46028 4.83464 5.00004V4.16671H3.16797C2.70773 4.16671 2.33464 4.5398 2.33464 5.00004V7.50004H15.668ZM2.33464 9.16671H15.668V16.6667C15.668 17.1269 15.2949 17.5 14.8346 17.5H3.16797C2.70773 17.5 2.33464 17.1269 2.33464 16.6667V9.16671Z" />
          </svg>
        </div>
      </div>
    </div>

    <div class="tasks-tabs main-tasks-tabs">
      <a href="/manager/tasks/?type=pending" class="tasks-tab-btn active main-tasks-tab-btn" data-tab="pending">
        До виконання
      </a>
      <a href="/manager/tasks/?type=overdue" class="tasks-tab-btn main-tasks-tab-btn" data-tab="overdue">
        Протерміновані
      </a>
    </div>


    <div class="tasks-table-wrapper overdue-wrapper" style="display: none;">
      <div class="tasks-table-title">Протерміновані завдання</div>
    </div>


    <div class="tasks-main-content-wrapper">
      <div id="tasks-tables">
        <div class="tasks-table-wrapper">
          <div class="tasks-table-title">На сьогодні</div>
          <table class="tasks-table">
            <thead class="tasks-table-header">
              <tr>
                <th class="tasks-table-col tasks-table-col__accordeon-arrow"></th>
                <th class="tasks-table-col tasks-table-col__task-type">
                  <div class="tasks-table-th-wrapper">
                    <span>тип задачі</span>
                    <div class="sort-icon-wrapper">
                      <button class="sort-button">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"></path>
                          <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </th>
                <th class="tasks-table-col tasks-table-col__priority">
                  <div class="tasks-table-th-wrapper">
                    <span>пріоритет</span>
                    <div class="sort-icon-wrapper">
                      <button class="sort-button">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"></path>
                          <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </th>
                <th class="tasks-table-col tasks-table-col__title">
                  <div class="tasks-table-th-wrapper">
                    <span>title задачі</span>
                    <div class="sort-icon-wrapper">
                      <button class="sort-button">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"></path>
                          <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </th>
                <th class="tasks-table-col tasks-table-col__client">
                  <div class="tasks-table-th-wrapper">
                    <span>лід/клієнт</span>
                    <div class="sort-icon-wrapper">
                      <button class="sort-button">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"></path>
                          <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </th>
                <th class="tasks-table-col tasks-table-col__status">
                  <div class="tasks-table-th-wrapper">
                    <span>статус</span>
                    <div class="sort-icon-wrapper">
                      <button class="sort-button">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"></path>
                          <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </th>
                <th class="tasks-table-col tasks-table-col__creation-time">
                  <div class="tasks-table-th-wrapper">
                    <span>дата та час створення</span>
                    <div class="sort-icon-wrapper">
                      <button class="sort-button">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"></path>
                          <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </th>
                <th class="tasks-table-col tasks-table-col__dedline-time">
                  <div class="tasks-table-th-wrapper">
                    <span>дата та час дедлайна</span>
                    <div class="sort-icon-wrapper">
                      <button class="sort-button">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"></path>
                          <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </th>
                <th class="tasks-table-col tasks-table-col__initiator">
                  <div class="tasks-table-th-wrapper">
                    <span>постановник</span>
                    <div class="sort-icon-wrapper">
                      <button class="sort-button">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"></path>
                          <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </th>
                <th class="tasks-table-col tasks-table-col__responsible">
                  <div class="tasks-table-th-wrapper">
                    <span>відповідальний</span>
                    <div class="sort-icon-wrapper">
                      <button class="sort-button">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"></path>
                          <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </th>
                <th class="tasks-table-col tasks-table-col__completion-time">
                  <div class="tasks-table-th-wrapper">
                    <span>дата та час закриття задачі</span>
                    <div class="sort-icon-wrapper">
                      <button class="sort-button">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"></path>
                          <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </th>
              </tr>
            </thead>

            <tbody class="tasks-table-body">
              <tr class="task-row-item">
                <td colspan="11">
                  <div class="task-summary-grid">
                    <div class="tasks-table-td tasks-table-col__accordeon-arrow">
                      <div class="row-expand-arrow-wrapper">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 12L10 8L6 4" stroke="#3D445C" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        </svg>
                      </div>
                    </div>
                    <div class="tasks-table-td tasks-table-col__task-type">
                      Зв'язатись з клієнтом по питанню з кредитним лимитом
                    </div>
                    <div class="tasks-table-td tasks-table-col__priority">
                      <span class="usual">Звичайний</span>
                    </div>
                    <div class="tasks-table-td tasks-table-col__title">
                      Підписати договір
                    </div>
                    <div class="tasks-table-td tasks-table-col__client">
                      ТОВ "Нова справа"
                    </div>
                    <div class="tasks-table-td tasks-table-col__status">
                      <div>Телеграм</div>
                      <div class="usual">Звичайний</div>
                    </div>
                    <div class="tasks-table-td tasks-table-col__creation-time">
                      <div>26.08.2025</div>
                      <div>13:50</div>
                    </div>
                    <div class="tasks-table-td tasks-table-col__dedline-time">
                      <div>27.08.2025</div>
                      <div>10:00</div>
                    </div>
                    <div class="tasks-table-td tasks-table-col__initiator">
                      Маруся Петровна
                    </div>
                    <div class="tasks-table-td tasks-table-col__responsible">
                      Шевченко П.П.
                    </div>
                    <div class="tasks-table-td tasks-table-col__completion-time">
                      <div>27.08.2025</div>
                      <div>10:00</div>
                    </div>
                  </div>

                  <div class="details-content">
                    <div class="details-content-btn-wrapper">
                      <button class="details-content-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                          <g clip-path="url(#clip0_11783_43810)">
                            <path
                              d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z"
                              stroke="#FC6B40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                          </g>
                          <defs>
                            <clipPath id="clip0_11783_43810">
                              <rect width="18" height="18" fill="white" />
                            </clipPath>
                          </defs>
                        </svg>
                      </button>

                      <button class="details-content-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z"
                            fill="#FC6B40" />
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z"
                            fill="#FC6B40" />
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z"
                            fill="#FC6B40" />
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z"
                            fill="#FC6B40" />
                        </svg>
                      </button>
                    </div>

                    <div class="details-wrapper">
                      <div class="tasks-tabs">
                        <a href="#" class="tasks-tab-btn active" data-tab="info">Інформація про задачу</a>
                        <a href="#" class="tasks-tab-btn" data-tab="chrono">Хронологія</a>
                      </div>
                      <div class="tab-content active" id="info">
                        <table class="detais-table">
                          <tbody>
                            <tr>
                              <td class="detais-table__row-title">
                                Title задачі:
                              </td>
                              <td>
                                Перезвонити клієнту Максиму з компанії Суші Мастер
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Description задачі:
                              </td>
                              <td>
                                Запропонувати розміщення в центрі на Проспекті
                                Незалежності та по вул. Шиллера, 12. ЗхЗ
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">Пріоритет:</td>
                              <td>
                                <span class="important">Звичайний</span>
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">Тип задачі:</td>
                              <td>Дзвінок</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">Лід/Клієнт:</td>
                              <td>
                                <span class="client-name">Sushi Master</span>
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">Статус:</td>
                              <td>
                                <span>Телеграм</span>
                                <span class="usual">Виконані</span>
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Постановник:
                              </td>
                              <td>Руководитель</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Відповідальний:
                              </td>
                              <td>Евгений</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Дія після закриття задачі:
                              </td>
                              <td>—</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Дата та час виконання задачі:
                              </td>
                              <td>2025-01-19 12:18:03</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Дата та час закриття задачі:
                              </td>
                              <td>2025-01-19 14:12:05</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="tab-content" id="chrono">
                        <table class="detais-table">
                          <tbody>
                            <tr>
                              <td class="detais-table__row-title">10:15:45</td>
                              <td>Задача створена</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">17:50:29</td>
                              <td>
                                Внесено зміни - електронна пошта ліда:
                                lead@gmail.com
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="detais-bottom-btn-wrapper">
                      <button class="change-task-time-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                          <g clip-path="url(#clip0_11783_21480)">
                            <path
                              d="M10.0013 18.3333C14.6037 18.3333 18.3346 14.6024 18.3346 9.99999C18.3346 5.39762 14.6037 1.66666 10.0013 1.66666C5.39893 1.66666 1.66797 5.39762 1.66797 9.99999C1.66797 14.6024 5.39893 18.3333 10.0013 18.3333Z"
                              stroke="#FC6B40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 5V10L13.3333 11.6667" stroke="#FC6B40" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                          </g>
                          <defs>
                            <clipPath id="clip0_11783_21480">
                              <rect width="20" height="20" fill="white" />
                            </clipPath>
                          </defs>
                        </svg>
                        <span>Відтермінувати задачу</span>
                      </button>
                      <button class="finish-task-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.74931 11.9545L14.6016 4.10226L15.3971 4.89776L6.74931 13.5455L2.60156 9.39776L3.39706 8.60226L6.74931 11.9545Z"
                            fill="white" />
                        </svg>
                        <span>Задача виконана</span>
                      </button>
                    </div>
                  </div>
                </td>
              </tr>

              <tr class="task-row-item">
                <td colspan="11">
                  <div class="task-summary-grid">
                    <div class="tasks-table-td tasks-table-col__accordeon-arrow">
                      <div class="row-expand-arrow-wrapper">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 12L10 8L6 4" stroke="#3D445C" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        </svg>
                      </div>
                    </div>
                    <div class="tasks-table-td tasks-table-col__task-type">
                      Зв'язатись з клієнтом по питанню з кредитним лимитом
                    </div>
                    <div class="tasks-table-td tasks-table-col__priority">
                      <span class="usual">Звичайний</span>
                    </div>
                    <div class="tasks-table-td tasks-table-col__title">
                      Підписати договір
                    </div>
                    <div class="tasks-table-td tasks-table-col__client">
                      ТОВ "Нова справа"
                    </div>
                    <div class="tasks-table-td tasks-table-col__status">
                      <div>Телеграм</div>
                      <div class="usual">Звичайний</div>
                    </div>
                    <div class="tasks-table-td tasks-table-col__creation-time">
                      <div>26.08.2025</div>
                      <div>13:50</div>
                    </div>
                    <div class="tasks-table-td tasks-table-col__dedline-time">
                      <div>27.08.2025</div>
                      <div>10:00</div>
                    </div>
                    <div class="tasks-table-td tasks-table-col__initiator">
                      Маруся Петровна
                    </div>
                    <div class="tasks-table-td tasks-table-col__responsible">
                      Шевченко П.П.
                    </div>
                    <div class="tasks-table-td tasks-table-col__completion-time">
                      <div>27.08.2025</div>
                      <div>10:00</div>
                    </div>
                  </div>

                  <div class="details-content">
                    <div class="details-content-btn-wrapper">
                      <button class="details-content-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                          <g clip-path="url(#clip0_11783_43810)">
                            <path
                              d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z"
                              stroke="#FC6B40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                          </g>
                          <defs>
                            <clipPath id="clip0_11783_43810">
                              <rect width="18" height="18" fill="white" />
                            </clipPath>
                          </defs>
                        </svg>
                      </button>

                      <button class="details-content-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z"
                            fill="#FC6B40" />
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z"
                            fill="#FC6B40" />
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z"
                            fill="#FC6B40" />
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z"
                            fill="#FC6B40" />
                        </svg>
                      </button>
                    </div>

                    <div class="details-wrapper">
                      <div class="tasks-tabs">
                        <a href="#" class="tasks-tab-btn active" data-tab="info">Інформація про задачу</a>
                        <a href="#" class="tasks-tab-btn" data-tab="chrono">Хронологія</a>
                      </div>
                      <div class="tab-content active" id="info">
                        <table class="detais-table">
                          <tbody>
                            <tr>
                              <td class="detais-table__row-title">
                                Title задачі:
                              </td>
                              <td>
                                Перезвонити клієнту Максиму з компанії Суші Мастер
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Description задачі:
                              </td>
                              <td>
                                Запропонувати розміщення в центрі на Проспекті
                                Незалежності та по вул. Шиллера, 12. ЗхЗ
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">Пріоритет:</td>
                              <td>
                                <span class="important">Звичайний</span>
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">Тип задачі:</td>
                              <td>Дзвінок</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">Лід/Клієнт:</td>
                              <td>
                                <span class="client-name">Sushi Master</span>
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">Статус:</td>
                              <td>
                                <span>Телеграм</span>
                                <span class="usual">Виконані</span>
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Постановник:
                              </td>
                              <td>Руководитель</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Відповідальний:
                              </td>
                              <td>Евгений</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Дія після закриття задачі:
                              </td>
                              <td>—</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Дата та час виконання задачі:
                              </td>
                              <td>2025-01-19 12:18:03</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Дата та час закриття задачі:
                              </td>
                              <td>2025-01-19 14:12:05</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="tab-content" id="chrono">
                        <table class="detais-table">
                          <tbody>
                            <tr>
                              <td class="detais-table__row-title">10:15:45</td>
                              <td>Задача створена</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">17:50:29</td>
                              <td>
                                Внесено зміни - електронна пошта ліда:
                                lead@gmail.com
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="detais-bottom-btn-wrapper">
                      <button class="change-task-time-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                          <g clip-path="url(#clip0_11783_21480)">
                            <path
                              d="M10.0013 18.3333C14.6037 18.3333 18.3346 14.6024 18.3346 9.99999C18.3346 5.39762 14.6037 1.66666 10.0013 1.66666C5.39893 1.66666 1.66797 5.39762 1.66797 9.99999C1.66797 14.6024 5.39893 18.3333 10.0013 18.3333Z"
                              stroke="#FC6B40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 5V10L13.3333 11.6667" stroke="#FC6B40" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                          </g>
                          <defs>
                            <clipPath id="clip0_11783_21480">
                              <rect width="20" height="20" fill="white" />
                            </clipPath>
                          </defs>
                        </svg>
                        <span>Відтермінувати задачу</span>
                      </button>
                      <button class="finish-task-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.74931 11.9545L14.6016 4.10226L15.3971 4.89776L6.74931 13.5455L2.60156 9.39776L3.39706 8.60226L6.74931 11.9545Z"
                            fill="white" />
                        </svg>
                        <span>Задача виконана</span>
                      </button>
                    </div>
                  </div>
                </td>
              </tr>

              <tr class="task-row-item">
                <td colspan="11">
                  <div class="task-summary-grid">
                    <div class="tasks-table-td tasks-table-col__accordeon-arrow">
                      <div class="row-expand-arrow-wrapper">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 12L10 8L6 4" stroke="#3D445C" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        </svg>
                      </div>
                    </div>
                    <div class="tasks-table-td tasks-table-col__task-type">
                      Зв'язатись з клієнтом по питанню з кредитним лимитом
                    </div>
                    <div class="tasks-table-td tasks-table-col__priority">
                      <span class="usual">Звичайний</span>
                    </div>
                    <div class="tasks-table-td tasks-table-col__title">
                      Підписати договір
                    </div>
                    <div class="tasks-table-td tasks-table-col__client">
                      ТОВ "Нова справа"
                    </div>
                    <div class="tasks-table-td tasks-table-col__status">
                      <div>Телеграм</div>
                      <div class="usual">Звичайний</div>
                    </div>
                    <div class="tasks-table-td tasks-table-col__creation-time">
                      <div>26.08.2025</div>
                      <div>13:50</div>
                    </div>
                    <div class="tasks-table-td tasks-table-col__dedline-time">
                      <div>27.08.2025</div>
                      <div>10:00</div>
                    </div>
                    <div class="tasks-table-td tasks-table-col__initiator">
                      Маруся Петровна
                    </div>
                    <div class="tasks-table-td tasks-table-col__responsible">
                      Шевченко П.П.
                    </div>
                    <div class="tasks-table-td tasks-table-col__completion-time">
                      <div>27.08.2025</div>
                      <div>10:00</div>
                    </div>
                  </div>

                  <div class="details-content">
                    <div class="details-content-btn-wrapper">
                      <button class="details-content-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                          <g clip-path="url(#clip0_11783_43810)">
                            <path
                              d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z"
                              stroke="#FC6B40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                          </g>
                          <defs>
                            <clipPath id="clip0_11783_43810">
                              <rect width="18" height="18" fill="white" />
                            </clipPath>
                          </defs>
                        </svg>
                      </button>

                      <button class="details-content-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z"
                            fill="#FC6B40" />
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z"
                            fill="#FC6B40" />
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z"
                            fill="#FC6B40" />
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z"
                            fill="#FC6B40" />
                        </svg>
                      </button>
                    </div>

                    <div class="details-wrapper">
                      <div class="tasks-tabs">
                        <a href="#" class="tasks-tab-btn active" data-tab="info">Інформація про задачу</a>
                        <a href="#" class="tasks-tab-btn" data-tab="chrono">Хронологія</a>
                      </div>
                      <div class="tab-content active" id="info">
                        <table class="detais-table">
                          <tbody>
                            <tr>
                              <td class="detais-table__row-title">
                                Title задачі:
                              </td>
                              <td>
                                Перезвонити клієнту Максиму з компанії Суші Мастер
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Description задачі:
                              </td>
                              <td>
                                Запропонувати розміщення в центрі на Проспекті
                                Незалежності та по вул. Шиллера, 12. ЗхЗ
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">Пріоритет:</td>
                              <td>
                                <span class="important">Звичайний</span>
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">Тип задачі:</td>
                              <td>Дзвінок</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">Лід/Клієнт:</td>
                              <td>
                                <span class="client-name">Sushi Master</span>
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">Статус:</td>
                              <td>
                                <span>Телеграм</span>
                                <span class="usual">Виконані</span>
                              </td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Постановник:
                              </td>
                              <td>Руководитель</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Відповідальний:
                              </td>
                              <td>Евгений</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Дія після закриття задачі:
                              </td>
                              <td>—</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Дата та час виконання задачі:
                              </td>
                              <td>2025-01-19 12:18:03</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">
                                Дата та час закриття задачі:
                              </td>
                              <td>2025-01-19 14:12:05</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="tab-content" id="chrono">
                        <table class="detais-table">
                          <tbody>
                            <tr>
                              <td class="detais-table__row-title">10:15:45</td>
                              <td>Задача створена</td>
                            </tr>

                            <tr>
                              <td class="detais-table__row-title">17:50:29</td>
                              <td>
                                Внесено зміни - електронна пошта ліда:
                                lead@gmail.com
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="detais-bottom-btn-wrapper">
                      <button class="change-task-time-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                          <g clip-path="url(#clip0_11783_21480)">
                            <path
                              d="M10.0013 18.3333C14.6037 18.3333 18.3346 14.6024 18.3346 9.99999C18.3346 5.39762 14.6037 1.66666 10.0013 1.66666C5.39893 1.66666 1.66797 5.39762 1.66797 9.99999C1.66797 14.6024 5.39893 18.3333 10.0013 18.3333Z"
                              stroke="#FC6B40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 5V10L13.3333 11.6667" stroke="#FC6B40" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                          </g>
                          <defs>
                            <clipPath id="clip0_11783_21480">
                              <rect width="20" height="20" fill="white" />
                            </clipPath>
                          </defs>
                        </svg>
                        <span>Відтермінувати задачу</span>
                      </button>
                      <button class="finish-task-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.74931 11.9545L14.6016 4.10226L15.3971 4.89776L6.74931 13.5455L2.60156 9.39776L3.39706 8.60226L6.74931 11.9545Z"
                            fill="white" />
                        </svg>
                        <span>Задача виконана</span>
                      </button>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div id="tasks-calendar">

      </div>

    </div>

  </div>

  <!-- Filters panel -->

   <div class="bk-filter-block hide" id="tasks-filter-block">
    <div class="bk-filter-header">
      {{-- <span>@lang('message.filter')</span> --}}
      <span>Фільтри</span>
      <span class="close">
        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
            fill="#3D445C" stroke="#3D445C" stroke-width="0.3" />
        </svg>
      </span>
    </div>


    <div class="bk-filter-fields">
      <h5>За типом</h5>

      <div class="field-container">
        <div class="input-block big-input-block">
          {{-- <label>@lang('message.document_type')</label> --}}
          <label>Тип задачі</label>

          <select name="taskType" class="manager-select" style="width: 100%">
            <option value="">Оберіть тип задачі</option>
            {{-- @foreach($docsTypes as $docType)
            <option value="{{$docType}}" @if($docType==@$params['docType']) selected @endif>{{$docType}}</option>
            @endforeach --}}
          </select>
        </div>
      </div>

      <div class="field-container">
        <div class="input-block big-input-block">
          {{-- <label>@lang('message.manager')</label> --}}
          <label>Статус</label>

          <select name="taskStatus" class="manager-select" style="width: 100%">
            <option value="">Невиконані задачі</option>
            {{-- @foreach($managers as $manager)
            <option value="{{$manager->name}}" @if($manager->name == @$params['manager']) selected
              @endif>{{$manager->name}}</option>
            @endforeach --}}
          </select>
        </div>
      </div>

      <div class="field-container">
        <div class="input-block big-input-block">

          <label>Термін</label>

          <select name="taskTerm" class="manager-select" style="width: 100%">
            <option value="">-</option>
            {{-- @foreach($entities as $entity)
            <option @if(@$params['entity']==$entity->name_short) selected
              @endif
              value="{{$entity->name_short}}">{{$entity->name_short}}</option>
            @endforeach --}}
          </select>
        </div>
      </div>

      <div class="field-container">
        <div class="input-block">
          <label>Показати</label>
        </div>

        <div class="show-tasks-panel">
          <input type="radio" name="showTask" id="showTasksAll" class="show-tasks-radio visually-hidden" checked>
          <label for="showTasksAll" class="show-tasks-btn show-tasks--btn__all">
            <span>Всі</span>
          </label>
          <input type="radio" name="showTask" id="showTasksLeads" class="show-tasks-radio visually-hidden">
          <label for="showTasksLeads" class="show-tasks-btn show-tasks--btn__leads">
            <span>Ліди</span>
          </label>
          <input type="radio" name="showTask" id="showTasksClients" class="show-tasks-radio visually-hidden">
          <label for="showTasksClients" class="show-tasks-btn show-tasks--btn__clients">
            <span>Клієнти</span>
          </label>
        </div>
      </div>

      <div class="field-container">
        <div class="input-block small-input-block" style="width: 88%">
          {{-- <label>@lang('message.results_period')</label> --}}
          <label>Відповідальний</label>

          <select name="tasksКesponsible" class="report_period-select" style="width: 100%">
            <option value="">-</option>
            {{-- @foreach($dates as $k => $v)
            <option value="{{ $k }}" {{ in_array($k, $params['periods']) ? 'selected' : '' }}>{{ $v }}</option>
            @endforeach --}}
          </select>
        </div>
      </div>

      <h5>За часом</h5>

      <div class="field-container">
        <div class="input-block">
          <label for="taskCreationDate">Дата створення</label>
          <input type="date" name="taskCreationDate" value="" id="taskCreationDate">

        </div>
      </div>

      <div class="field-container">
        <div class="input-block">
          <label for="taskDeadlineDate">Дата дедлайну</label>
          <input type="date" name="taskDeadlineDate" value="" id="taskDeadlineDate">

        </div>
      </div>

      <div class="field-container">
        <div class="input-block">
          <label for="taskCompleteDate">Дата закриття</label>
          <input type="date" name="taskCompleteDate" value="" id="taskCompleteDate">

        </div>
      </div>

      <div class="field-container">
        <div class="tasks-filter-modal-btn-wrapper">
          <button class="show-task-btn">Показати задачі (25)</button>
          <button class="reset-task-btn"> Скинути все </button>
        </div>
      </div>



    </div>
  </div>


  <div class="al-overlay3 zi10101 hide"></div>

  <!-- Scripts -->
  
      </div>
    </div>
  </div>
</section>

@include('add.footer')
<div class="al-overlay3 hide zi10101"></div>
@include('front.crm.footer')
<div class="confirm-popup2" style="z-index:10111">
    <div class='confirm-header'>
        <span class="confirm-title"></span>
        <span class="close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
            </svg>
        </span>
    </div>
    <div class="confirm-body">
        <div class="confirm-message"></div>
        <div class="align-right confirm-action">
            <a class="cancel pointer">@lang('message.cancel')</a>
            <a class="yes pointer">@lang('message.yes')</a>
        </div>
    </div>
</div>
@include('front.crm.scripts')