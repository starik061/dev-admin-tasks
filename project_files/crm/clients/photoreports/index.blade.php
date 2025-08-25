@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
    $webp = "";
@endphp

<section id="result-search-list" class="al-leeds-page">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters">
            <div class="container container-base mw-full">
                <div class="content-block clearfix">
                    <div class="container container-base container-search-result manager-search mw-full">
                        <h1 class="title-search-result" style="padding: 0 0">
                            {{ $data['seo']->h1_title }}
                        </h1>
                    </div>
                    @if(count($reports) || count($params))
                        <div class="photoreport-filter-block mw-full">
                            <div class="photoreport-filter-action-block">
                                <div class="header-styles">
                                    <div class="field-container">
                                        <div class="input-block big-input-block">
                                            <label>@lang('message.search')</label>
                                            <input type="text" name="s" id="filter-search"
                                                   @if(@$params['s']) value="{{$params['s']}}" @endif
                                                   style="width: 320px !important;">
                                        </div>
                                    </div>
                                    <div class="photoreports-search-button input-block filter-btn-block">
                                            <span class="search-button pointer crm-button" style="margin-top: 3px" >
                                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M12.8864 7.31845C12.8864 10.3937 10.3934 12.8866 7.3182 12.8866C4.24297 12.8866 1.75 10.3937 1.75 7.31845C1.75 4.24321 4.24297 1.75024 7.3182 1.75024C10.3934 1.75024 12.8864 4.24321 12.8864 7.31845ZM11.5687 12.65C10.4031 13.5804 8.92559 14.1366 7.3182 14.1366C3.55261 14.1366 0.5 11.084 0.5 7.31845C0.5 3.55286 3.55261 0.500244 7.3182 0.500244C11.0838 0.500244 14.1364 3.55286 14.1364 7.31845C14.1364 9.02623 13.5085 10.5874 12.471 11.7836L15.4058 15.0852L14.4715 15.9157L11.5687 12.65Z"
                                                  fill="#ffffff"/>
                                          </svg>
                                          @lang('message.search')
                                        </span>
                                    </div>

                                    <div class="al-selected-filter">
                                        @foreach($checkedFilters as $key => $value)
                                            @if($value)
                                                <div class="selected-filter-item" data-filter="{{$key}}">
                                                    {{$value}}
                                                    <img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>


                                    <div class="bk-filter-block" id="bk-filter-block">
                                        <div class="bk-filter-header">
                                            <span>@lang('message.filter')</span>
                                            <span class="close">
                                                  <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                       xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
                                                          fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
                                                  </svg>
                                                </span>
                                        </div>
                                        <div class="bk-filter-fields">
                                            <div class="field-container">
                                                <div class="input-block big-input-block">
                                                    <label>@lang('message.client')</label>
                                                    <select name="client_id" class="manager-select" id="report-client"
                                                            style="width: 100%">
                                                        <option value="">@lang('message.all')</option>
                                                        @foreach($clients as $client)
                                                            <option value="{{$client->id}}"
                                                                    @if(@$params['client_id'] == $client->id) selected @endif >{{$client->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="field-container">
                                                <div class="input-block big-input-block">
                                                    <label>@lang('message.month2')</label>
                                                    <select name="month_ym" class="manager-select" id="report-month"
                                                            style="width: 100%">
                                                        <option value="all">@lang('message.all')</option>
                                                        @if($months)
                                                            @foreach($months as $ym => $month)
                                                                <option value="{{$ym}}"
                                                                        @if(@$params['month_ym'] == $ym) selected @endif >{{$month}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="field-container">
                                                <div class="input-block big-input-block">
                                                    <label>@lang('message.type')</label>
                                                    <select name="report-type" class="manager-select" id="report-type"
                                                            style="width: 100%">
                                                        <option value="all">@lang('message.all')</option>
                                                        @if($filterTypes)
                                                            @foreach($filterTypes as $k => $v)
                                                                <option value="{{$k}}"
                                                                        @if(@$params['report-type'] == $k) selected @endif >{{$v}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            @if(Auth::user()->role_id == 1)
                                                <div class="field-container">
                                                    <div class="input-block big-input-block">
                                                        <label>@lang('message.manager')</label>
                                                        <select name="report-user" class="manager-select" id="report-user"
                                                                style="width: 100%">
                                                            <option value="all">@lang('message.all')</option>
                                                            @if($users)
                                                                @foreach($users as $k => $v)
                                                                    <option value="{{$k}}"
                                                                            @if(@$params['report-user'] == $k) selected @endif >{{$v}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="field-container">
                                                <div class="input-block big-input-block">
                                                    <label>@lang('message.client_active')</label>
                                                    <select name="client_is_active" class="manager-select" id="client-active" style="width: 100%">
                                                        <option value="all" @if(is_null($params['client_is_active']) || $params['client_is_active'] == 'all') selected @endif>@lang('message.all')</option>
                                                        <option value="true" @if($params['client_is_active'] === true) selected @endif>@lang('message.yes')</option>
                                                        <option value="false" @if($params['client_is_active'] === false) selected @endif>@lang('message.no')</option>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="field-container">
                                                <div class="input-block big-input-block">
                                                    <label>@lang('message.plane_code2')</label>
                                                    <input type="text" name="code" id="filter-code"
                                                           @if(@$params['code']) value="{{$params['code']}}" @endif>
                                                </div>
                                            </div>


                                            <div class="field-container">
                                                <div class="photoreports-search-button input-block mr0">
                                                    <button class="search-button crm-button">@lang('message.find')</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="header-styles">
                                    <div class="switcher-block">
                                        <div class="switcher">
                                            <input type="checkbox" class="ios8-switch" id="show-without-photo"
                                                   @if(@$params['empty']) checked @endif>
                                            <label for="show-without-photo">&nbsp;</label>
                                        </div>
                                        <div class="switcher-label">@lang('message.show_only_empty')</div>
                                    </div>
                                    <div class="input-block filter-btn-block">
                                        <a class="bk-filter-btn" style="margin-top: 0">
                                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0.989754 1.01326C1.08192 0.814602 1.28101 0.6875 1.50001 0.6875H16.5C16.719 0.6875 16.9181 0.814602 17.0103 1.01326C17.1024 1.21191 17.0709 1.446 16.9295 1.61322L11.0625 8.55096V14.75C11.0625 14.945 10.9616 15.126 10.7957 15.2285C10.6299 15.331 10.4228 15.3403 10.2485 15.2531L7.24845 13.7531C7.05788 13.6578 6.93751 13.4631 6.93751 13.25V8.55096L1.0705 1.61322C0.929088 1.446 0.897583 1.21191 0.989754 1.01326ZM2.71237 1.8125L7.92952 7.98178C8.01539 8.08333 8.06251 8.21201 8.06251 8.345V12.9024L9.93751 13.8399V8.345C9.93751 8.21201 9.98463 8.08333 10.0705 7.98178L15.2877 1.8125H2.71237Z"
                                                      fill="#FC6B40"/>
                                            </svg>
                                            @lang('message.filter')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="container container-base container-search-result manager-search mw-full"
                         style="width: 100% !important;">
                        <div class="photoreports-table photoreports">
                            @if(@count($reports))
                                <div class="photoreports-thead">
                                    <div class="photoreports-row">
                                        <div class="photoreports-col photo-report-checkbox-col">
                                            <input type="checkbox" id="select-all">
                                        </div>
                                        @if(!isset($client_view) || !$client_view)
                                            <div class="photoreports-col">
                                                @lang('message.client')
                                            </div>
                                            <div class="photoreports-col">
                                                @lang('message.manager')
                                            </div>
                                        @endif
                                        <div class="photoreports-col">
                                            @lang('message.city')
                                        </div>
                                        <div class="photoreports-col">
                                            @lang('message.address')
                                        </div>
                                        <div class="photoreports-col">
                                            @lang('message.contract')
                                        </div>
                                        <div class="photoreports-col">
                                            @lang('message.application')
                                        </div>
                                        <div class="photoreports-col">
                                            @lang('message.firm')
                                        </div>
                                        <div class="photoreports-col">
                                            @lang('message.plane_code2')
                                        </div>
                                        <div class="photoreports-col">
                                            @lang('message.contractor_code')
                                        </div>
                                        <div class="photoreports-col">
                                            @lang('message.rental_period')
                                        </div>
                                        <div class="photoreports-col">
                                            @lang('message.month2')
                                        </div>
                                        <div class="photoreports-col">
                                            @lang('message.layout')
                                        </div>
                                        <div class="photoreports-col">
                                            @lang('message.work_type')
                                        </div>
                                        <div class="photoreports-col">
                                            @lang('message.near')
                                        </div>
                                        <div class="photoreports-col">
                                            @lang('message.far')
                                        </div>
                                        <div class="photoreports-col">
                                            @lang('message.night')
                                        </div>
                                        <div class="photoreports-col action-col">
                                        </div>
                                    </div>
                                </div>
                                <div class="photoreports-tbody">
                                    @foreach($reports as $key => $report)
                                        <div class="photoreports-row" id="report-{{ $report->report_id }}">
                                            @include('front.crm.clients.photoreports.row-data')
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
                        @if ($reports->lastPage() > 1)
                            <div class="result-paginator">
                                {{ $reports->appends(request()->query())->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- RESULT SEARCH (END) -->


@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
<div class="photoreports-popup">
    <div class='popup-header'>
        <span>@lang('message.edit_photoreport')</span>
        <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
              fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
    </div>
    <div class="popup-body">
        <div class="buttons-block right-buttons">
            <a class="cancel">@lang('message.cancel')</a>
            <a class="crm-button">@lang('message.save')</a>
        </div>
    </div>
</div>
<div class="photoreports-popup2">
    <div class='popup-header'>
        <span>@lang('message.create_photoreport')</span>
        <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
              fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
    </div>
    <div class="popup-body">
        <div class="buttons-block right-buttons">
            <a class="cancel">@lang('message.cancel')</a>
            <a class="crm-button">@lang('message.save')</a>
        </div>
    </div>
</div>
@include('front.crm.scripts')
<style>
    .selected-line {
        background: #FFF0EC;
    }

    .al-power-tip {
        border: none !important;
        padding: 0 !important;
        background: none;
    }

    .header-styles {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px
    }
</style>

<script type="text/javascript">

    document.addEventListener("DOMContentLoaded", function () {

        document.querySelectorAll('.copy-link').forEach(function (el) {
            el.addEventListener('click', function (e) {
                e.preventDefault();
                const url = this.dataset.url;
                console.log(url)
                navigator.clipboard.writeText(url).then(() => {
                    notify('Ссылка скопирована в буфер обмена');
                }).catch(err => {
                    notify('Ошибка копирования');
                });
            });
        });

        const selectAllCheckbox = document.getElementById("select-all");
        const rowCheckboxes = document.querySelectorAll(".row-checkbox");

        if (!selectAllCheckbox || rowCheckboxes.length === 0) {
            console.warn("Чекбоксы не найдены!");
            return;
        }
        selectAllCheckbox.addEventListener("change", function () {
            rowCheckboxes.forEach(checkbox => {
                if (!checkbox.disabled) {
                    checkbox.checked = selectAllCheckbox.checked;
                }
            });
        });
        rowCheckboxes.forEach(checkbox => {
            checkbox.addEventListener("change", function () {
                if (!this.checked) {
                    selectAllCheckbox.checked = false;
                } else {
                    selectAllCheckbox.checked = [...rowCheckboxes].every(cb => cb.checked || cb.disabled);
                }
            });
        });
    });


    $(document).ready(function () {
        $('#report-client').select2({minimumResultsForSearch: 0});
        $('#report-month').select2({minimumResultsForSearch: 0});
        $('#report-user').select2({minimumResultsForSearch: 0});


        $(document).on('click', '.al-selected-filter .selected-filter-item img', function () {
            const filterName = $(this).parent().data('filter');
            if (filterName.indexOf('[') !== -1) {
                $('[name="' + filterName + '"] option[value=' + $(this).parent().data('id') + ']:selected').removeAttr('selected').prop('selected', false);
            } else {
                $('[name="' + filterName + '"]').val('');
                $('[name="' + filterName + '"] option:selected').removeAttr('selected').prop('selected', false);
                $('[name="' + filterName + '"]').removeAttr('checked').prop('checked', false);
            }
            $(this).parent().remove();
            $('[name="' + filterName + '"]').trigger('change');
        });
    });

    function updatePageAndSubmit() {
        // Получаем текущий URL
        const url = new URL(window.location.href);

        // Устанавливаем значение page = 1
        const newPageValue = 1;

        // Разбиваем путь на сегменты
        const pathSegments = url.pathname.split('/');

        // Проверяем, есть ли уже число в конце пути (страница)
        const lastSegment = pathSegments[pathSegments.length - 1];

        if (!isNaN(lastSegment)) {
            // Если последний сегмент является числом, заменяем его на новое значение
            pathSegments[pathSegments.length - 1] = newPageValue;
        } else {
            // Если последний сегмент не является числом, добавляем новое значение
            pathSegments.push(newPageValue);
        }

        // Обновляем путь в URL
        url.pathname = pathSegments.join('/');

        // Обновляем URL в адресной строке без перезагрузки страницы
        window.history.replaceState({}, document.title, url);
    }

    $('.al-power-tip').powerTip({placement: 'n'});
    let photoreportData = {
        id: null,
        photo_design: null,
        photo_near: null,
        photo_far: null,
        photo_night: null,
        ym: null,
        client_view: false,
        client_id: null
    }
</script>
