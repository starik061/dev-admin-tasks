@include('add.head')
<link rel="stylesheet" href="/assets/css/crm.css?t=20241220"/>

<body>
@include('add.header')
@include('add.menu')
@include('add.bread')


<section id="result-search-list" class="al-leeds-page">
    <div class="container-fluid container-fluid-base tbody">
        <div class="row no-gutters">
            <div class="container container-base container-search-result manager-search mw1460">
                <h1 class="title-search-result" style="display:flex">
                    {{ $data['seo']->h1_title }}
                </h1>
            </div>
            <div class="container container-base mw1460">
                <div class="content-block clearfix">
                    <form method="GET" action="{{$data['lang_url']}}/photo-reports">
                        <div class="photoreport-filter-block" style="max-width: 100% !important;">
                            <div class="field-container">
                                <div class="input-block">
                                    <label>@lang('message.code')</label>
                                    <input type="text" name="code" value="{{ request('code') }}">
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.search')</label>
                                    <input type="text" name="s" value="{{ request('s') }}">
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.place')</label>
                                    <input type="text" name="place" value="{{ request('place') }}">
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.program')</label>
                                    <select name="program" id="report-program">
                                        <option value="all">@lang('message.all')</option>
                                        @foreach($programs as $program)
                                            <option value="{{$program->id}}" {{ request('program') == $program->id ? 'selected' : '' }}>
                                                {{$program->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field-container">
                                <div class="input-block">
                                    <label>@lang('message.done')</label>
                                    <select name="done" id="report-done">
                                        <option value="all">@lang('message.all')</option>
                                    </select>
                                </div>

                                <div class="input-block">
                                    <label>@lang('message.period')</label>
                                    <select name="period[]" id="report-period" multiple>
                                        <option>@lang('message.all')</option>
                                        @if($months)
                                            @foreach($months as $ym => $month)
                                                <option value="{{$ym}}" {{ in_array($ym, request('period') ?? []) ? 'selected' : '' }}>
                                                    {{$month}}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="input-block">
                                    <label>@lang('message.photoreport_date')</label>
                                    <select name="month[]" id="report-month" multiple>
                                        <option>@lang('message.all')</option>
                                        @if($months)
                                            @foreach($months as $ym => $month)
                                                <option value="{{$ym}}" {{ in_array($ym, request('month') ?? []) ? 'selected' : '' }}>
                                                    {{$month}}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="photoreport-filter-action-block" style="max-width: 100% !important;">
                            <div class="photoreports-search-button">
                                <button type="submit" class="search-button pointer crm-button">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M12.8864 7.31845C12.8864 10.3937 10.3934 12.8866 7.3182 12.8866C4.24297 12.8866 1.75 10.3937 1.75 7.31845C1.75 4.24321 4.24297 1.75024 7.3182 1.75024C10.3934 1.75024 12.8864 4.24321 12.8864 7.31845ZM11.5687 12.65C10.4031 13.5804 8.92559 14.1366 7.3182 14.1366C3.55261 14.1366 0.5 11.084 0.5 7.31845C0.5 3.55286 3.55261 0.500244 7.3182 0.500244C11.0838 0.500244 14.1364 3.55286 14.1364 7.31845C14.1364 9.02623 13.5085 10.5874 12.471 11.7836L15.4058 15.0852L14.4715 15.9157L11.5687 12.65Z"
                                              fill="#ffffff"/>
                                    </svg>
                                    @lang('message.search_by_list')
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="container container-base mw1460">
                <div class="photoreports-table photoreports" style="max-width: 100% !important;">
                    @if(@count($reports))
                        <div class="photoreports-thead">
                            <div class="photoreports-row">

                                <div class="photoreports-col">
                                    @lang('message.code')
                                </div>
                                <div class="photoreports-col">
                                    @lang('message.city_addr')
                                </div>
                                <div class="photoreports-col">
                                    @lang('message.type_size')
                                </div>
                                <div class="photoreports-col">
                                    @lang('message.side_lc')
                                </div>
                                <div class="photoreports-col">
                                    @lang('message.period_lc')
                                </div>
                                <div class="photoreports-col">
                                    @lang('message.photoreport_date')
                                </div>
{{--                                <div class="photoreports-col">--}}
{{--                                    занятість--}}
{{--                                </div>--}}
                                <div class="photoreports-col">
                                    @lang('message.responsible')
                                </div>
                                <div class="photoreports-col">
                                    @lang('message.plot')
                                </div>
                                <div class="photoreports-col">
                                    {{ strtolower(__('message.work_type')) }}
                                </div>
                                <div class="photoreports-col">
                                    @lang('message.layout')
                                </div>
                                <div class="photoreports-col">
                                    {{ strtolower(__('message.photoreport')) }}
                                </div>
                                <div class="photoreports-col action-col">
                                </div>
                            </div>
                        </div>
                        <div class="photoreports-tbody">
                            @foreach($reports as $key => $report)
                                <div class="photoreports-row" id="report-{{ $report->report_id }}">
                                    @include('front.photo-reports.row-data')
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="no-data" style="width:100%">
                            <svg width="85" height="85" viewBox="0 0 85 85" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="85" height="85" rx="42.5" fill="#FFF0EC"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M29.6884 27.4037C28.4251 27.4037 27.401 28.4278 27.401 29.6911V55.3091C27.401 56.3967 28.1601 57.307 29.1773 57.5391L49.817 36.8995L57.5938 44.6762V29.6911C57.5938 28.4278 56.5697 27.4037 55.3064 27.4037H29.6884ZM57.5938 48.5579L49.817 40.7812L33.0018 57.5964H55.3064C56.5697 57.5964 57.5938 56.5724 57.5938 55.3091V48.5579ZM24.6562 29.6911C24.6562 26.9119 26.9092 24.6589 29.6884 24.6589H55.3064C58.0856 24.6589 60.3385 26.9119 60.3385 29.6911V55.3091C60.3385 58.0883 58.0856 60.3412 55.3064 60.3412H29.6884C26.9092 60.3412 24.6562 58.0883 24.6562 55.3091V29.6911ZM36.092 34.7232C35.334 34.7232 34.7196 35.3376 34.7196 36.0956C34.7196 36.8535 35.334 37.468 36.092 37.468C36.8499 37.468 37.4644 36.8535 37.4644 36.0956C37.4644 35.3376 36.8499 34.7232 36.092 34.7232ZM31.9748 36.0956C31.9748 33.8217 33.8181 31.9784 36.092 31.9784C38.3658 31.9784 40.2091 33.8217 40.2091 36.0956C40.2091 38.3695 38.3658 40.2128 36.092 40.2128C33.8181 40.2128 31.9748 38.3695 31.9748 36.0956Z"
                                      fill="#FC6B40"/>
                            </svg>
                            <span class="no-data-title">
                @lang('message.photoreports_empty')
              </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
@include('front.crm.scripts')




<!--Filter adaptivity-->
<script>
    document.addEventListener("DOMContentLoaded", function () {

        // Получаем все кнопки с классом .comingSoonButton
        const buttons = document.querySelectorAll('.comingSoonButton');

// Перебираем все кнопки и добавляем обработчики событий
        buttons.forEach(function(button) {
            // Находим родительский элемент .photoreports-col, который содержит tooltip
            const parent = button.closest('.photoreports-col');
            const tooltip = parent.querySelector('.tooltip'); // Находим tooltip внутри родителя

            // Показать подсказку при наведении
            button.addEventListener('mouseenter', function() {
                console.log(98)
                tooltip.style.visibility = 'visible';
                tooltip.style.opacity = 1;
            });

            // Скрыть подсказку при убирании мыши
            button.addEventListener('mouseleave', function() {
                tooltip.style.visibility = 'hidden';
                tooltip.style.opacity = 0;
            });
        });




        function rearrangeFields() {
            const container = document.querySelector(".photoreport-filter-block");
            const allBlocks = Array.from(container.querySelectorAll(".input-block"));

            // Удаляем все текущие field-container
            if (container) {
                container.innerHTML = "";
            }

            let itemsPerRow;

            if (document.documentElement.clientWidth < 718) {
                itemsPerRow = 1;
            } else if (document.documentElement.clientWidth < 1000) {
                itemsPerRow = 2;
            } else if (document.documentElement.clientWidth < 1440) {
                itemsPerRow = 3;
            } else {
                itemsPerRow = 4;
            }


            // Разбиваем элементы по field-container
            for (let i = 0; i < allBlocks.length; i += itemsPerRow) {
                const fieldContainer = document.createElement("div");
                if (fieldContainer) {
                    fieldContainer.classList.add("field-container");
                    allBlocks.slice(i, i + itemsPerRow).forEach(block => fieldContainer.appendChild(block));
                    if (container) {
                        container.appendChild(fieldContainer);
                    }
                }
            }
        }

        // Вызываем при загрузке
        rearrangeFields();

        // Перестраиваем при изменении размера окна
        window.addEventListener("resize", rearrangeFields);
    });
</script>

<!--Rows-->
<script>
    function updateView() {
        const screenWidth = document.documentElement.clientWidth;
        const photoreportsTable = document.querySelector('.photoreports-table');
        const photoreportsThead = document.querySelector('.photoreports-thead');
        const photoreportsTbody = photoreportsTable.querySelector('.photoreports-tbody');
        const photoreportsRows = photoreportsTbody.querySelectorAll('.photoreports-row');

        const labels = [
            'Код', 'Місто / Адреса', 'Тип / Розмір', 'Сторона', 'Період',
            'Відповідальний', 'Сюжет', 'Тип робіт', 'Макет', 'Фотозвіт'
        ];

        if (screenWidth < 800) {
            photoreportsTable.classList.add('photoreports-cards');
            photoreportsTable.classList.remove('photoreports');

            // Скрываем заголовок таблицы
            if (photoreportsThead) {
                photoreportsThead.style.display = 'none';
            }

            photoreportsRows.forEach(row => {
                row.querySelectorAll('.photoreports-col').forEach(cell => {
                    cell.classList.add('desktop-view');
                    cell.style.display = 'none'; // Скрываем таблицу
                });

                let card = row.querySelector('.photoreport-card');
                if (!card) {
                    card = document.createElement('div');
                    card.classList.add('photoreport-card', 'mobile-view');

                    let cardContent = '';
                    row.querySelectorAll('.photoreports-col').forEach((cell, index) => {
                        if (index < labels.length) {
                            let cellContent = cell.innerHTML.trim();
                            cardContent += `
                        <div class="card-item">
                            <span class="card-label">${labels[index]}:</span>
                            <span class="card-value">${cellContent}</span>
                        </div>`;
                        }
                    });


                    cardContent += `
                        <div class="card-item">
                            <span class="card-value" style="width: 100% !important; position: relative">
                                <button class="search-button pointer custom-crm-button custom-crm-button coming-soon" id="comingSoonButton" style="width: 100% !important; height: 35px">
                                        @lang('message.repeat')
                                </button>
                                  <div class="tooltip" id="tooltip">@lang('message.in_development')</div>
                            </span>
                        </div>`;

                    card.innerHTML = cardContent;
                    row.appendChild(card);
                }
                card.style.display = 'block'; // Показываем карточку
            });

        } else {
            photoreportsTable.classList.remove('photoreports-cards');
            photoreportsTable.classList.add('photoreports');

            // Показываем заголовок таблицы
            if (photoreportsThead) {
                photoreportsThead.style.display = '';
            }

            photoreportsRows.forEach(row => {
                row.querySelectorAll('.photoreports-col').forEach(cell => {
                    cell.classList.remove('desktop-view');
                    cell.style.display = ''; // Показываем таблицу
                });

                let card = row.querySelector('.photoreport-card');
                if (card) {
                    card.style.display = 'none'; // Скрываем карточку
                }
            });
        }
    }

    // Вызываем при загрузке и на ресайз
    updateView();
    window.addEventListener('resize', updateView);


</script>

<style>
    .tooltip {
        visibility: hidden;
        position: absolute;
        bottom: 100%; /* Расположить всплывающее окно выше кнопки */
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(0, 0, 0, 0.75);
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
        opacity: 0;
        transition: opacity 0.3s ease;
        width: 100%;
    }


    /* Стиль для кнопки */
    .custom-crm-button {
        background-color: #f4f4f4;
        color: #333;
        border: 1px solid #ccc;
        padding: 12px 20px;
        font-size: 16px;
        cursor: not-allowed;
        text-align: center;
        transition: background-color 0.3s, color 0.3s;
        border-radius: 4px;
        width: 100%;
        box-sizing: border-box;
    }

    /* Стиль для модального окна */
    .modal {
        display: none; /* Скрываем окно по умолчанию */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        max-width: 400px;
        width: 80%;
        box-sizing: border-box;
    }

    .modal h2 {
        font-size: 24px;
        margin-bottom: 15px;
    }

    .modal p {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .close-button {
        background-color: #ffcc00;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 4px;
    }

    .close-button:hover {
        background-color: #e6b800;
    }

    /* Адаптивность */
    @media (max-width: 768px) {
        .custom-crm-button {
            font-size: 14px;
            padding: 10px 15px;
        }
    }


    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        line-height: 28px;
        border: none;
        border-radius: 0;
        display: flex;
        align-items: center;
    }

    .custom-crm-button {
        height: 28px;
        box-sizing: border-box;
        border-radius: 4px;
        font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;;
        font-style: normal;
        font-weight: bold;
        font-size: 13px;
        text-align: center;
        color: #fff;
        background: #FC6B40;
        border: none;
        padding: 0 14px;
        outline: none;
    }

    .photoreports-cards .photoreports-row {
        display: block; /* Stack rows vertically */
        margin-bottom: 20px; /* Add spacing between cards */
        border: 1px solid #ddd; /* Example border */
        padding: 15px; /* Example padding */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    .photoreport-card {
        display: flex;
        flex-direction: column; /* Stack card items vertically */
    }

    .card-item {
        display: flex;
        margin-bottom: 8px;
    }

    .card-label {
        font-weight: bold;
        width: 40%; /* Adjust as needed */
    }

    .card-value {
        width: 60%; /* Adjust as needed */
    }

    /* ... other styles ... */
</style>

<style>
    #result-search-list .td-busy {
        padding-left: 12px;
    }

    #result-search-list .td-busy {
        position: relative;
        overflow: visible !important;
        padding-left: 0;
        cursor: pointer;
    }

    #result-search-list .td-busy .busy-calendar {
        position: absolute;
        bottom: 20px;
        display: none;
        width: 297px;
        padding: 20px 25px 24px 25px;
        border-radius: 3px;
        background: white;
        box-shadow: 0 4px 20px 1px rgba(177, 177, 177, .5);
        cursor: auto;
    }

    #result-search-list .td-busy .busy-calendar:before {
        position: absolute;
        bottom: -13px;
        left: 19px;
        border: 13px solid transparent;
        border-left: 10px solid white;
        content: '';
    }

    @media (min-width: 100px) and (max-width: 1000px) {
        #result-search-list .td-busy .busy-calendar {
            top: -138px;
            width: 100%;
        }
        #result-search-list .td-busy .busy-calendar:before {
            display: none;
        }
    }
    #result-search-list .td-busy .busy-calendar .title-calendar
    {
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: bold;
    }
    #result-search-list .td-busy:hover .busy-calendar {
        z-index: 2;
        display: block;
        height: max-content;
    }

    #header {
        z-index: 150;
    }

</style>
