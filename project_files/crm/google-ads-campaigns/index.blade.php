@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<section id="result-search-list" class="al-leeds-page">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters">
            <div class="container container-base container-search-result manager-search mw1460">
                <h1 class="title-search-result" style="position: relative">
                    {{ $data['seo']->h1_title }}
                </h1>
                <div class="content-block clearfix">
                    <div class="leads-table">
                        <div class="header-block" id="header-block">
                            <div class="search-block">
                                <form action="{{ route('manager.google-ads-campaigns.view') }}" method="GET"
                                      class="form-inline">

                                    <div class="form-group mr-2">
                                        <select name="period" class="form-control">
                                            <option value="" disabled selected
                                                    hidden>@lang('message.select_period')</option>
                                            <option value="-" @if($checkedFilters['period'] == '-') selected @endif>@lang('message.free-reserve-busy')</option>
                                            @foreach($months as $k => $value)
                                                <option value="{{$value}}"
                                                        @if($value == $checkedFilters['period']) selected @endif
                                                >{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>


                                    <div class="field-container" style="margin-top: 22px">
                                        <div class="input-block " style="width: 88%">
                                            <select name="campaign[]" class="report_custom_company-select"
                                                    multiple="multiple">
                                                <option value="" disabled>@lang('message.select_campaigns')</option>
                                                <option value="">@lang('message.free-reserve-busy')</option>
                                                @foreach($campaignsNames as $k => $value)
                                                    <option value="{{$k}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn def-custom-btn"
                                            style="margin-left: 10px">@lang('message.show')</button>

                                    <a href="{{ route('clear.cache') }}" class="btn def-custom-btn"
                                       style="margin-left: 1%; color: white;">
                                        @lang('message.update-data')
                                    </a>
                                </form>
                            </div>
                        </div>
                        <div id="selected_date_range"></div>
                        <br>
                    </div>

                    @foreach($campaigns as $manager => $periods)
                        @if(!empty($periods))
                            <!-- First Table -->
                            <h1>Roas</h1>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    @if(is_array($periods) && $periods)
                                        @foreach(array_keys($periods[array_key_first($periods)]) as $period)
                                            <th class="text-center">{{ $period }}</th>
                                        @endforeach
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($periods as $subPeriod => $values)
                                    <tr>
                                        @if($subPeriod !== __('message.summary_indicators') && $subPeriod !== __('message.month_summary_indicators'))
                                            @if ($loop->first)
                                                <td class="text-center" style="vertical-align: middle; font-weight: bold;">
                                                    {{ $manager . " - " . $subPeriod }}
                                                </td>
                                            @else
                                                <td class="text-center">{{ $subPeriod }}</td>
                                            @endif
                                            @foreach($values as $value)
                                                <td class="text-center">{{ $value['roas'] }}</td>
                                            @endforeach
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <!-- Second Table -->
                            <h1>Data</h1>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    @if(is_array($periods) && $periods)
                                        @foreach(array_keys($periods[array_key_first($periods)]) as $period)
                                            <th class="text-center">{{ $period }}</th>
                                        @endforeach
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($periods as $subPeriod => $values)
                                    <tr>
                                        @if ($loop->first)
                                            <td class="text-center" style="vertical-align: middle; font-weight: bold;">
                                                {{ $manager . " - " . $subPeriod }}
                                            </td>
                                        @else
                                            <td class="text-center">{{ $subPeriod }}</td>
                                        @endif
                                        @foreach($values as $value)
                                            @if($value['data'])

                                                <td class="text-center data-cell">
                                                    <ul class="data-list">
                                                        @if($subPeriod == __('message.month_summary_indicators'))
                                                            {{ $value['data']['month-profit'] }}
                                                        @else

                                                            <li>Кол-во лидов: {{ $value['data']['leadsCount'] }}</li>
                                                            <li>Кол-во клиентов: {{ $value['data']['clientsCount'] }}</li>
                                                            <li>Кол-во счетов: {{ $value['data']['billsCount'] }}</li>
                                                            <li>Сумма счетов лидов: {{ $value['data']['sum'] }}</li>
                                                            <li>Себестоимость: {{ $value['data']['cost'] }}</li>
                                                            <li>Затраты: {{ $value['data']['google_cost'] }}</li>
                                                            <li>Прибыль: {{ $value['data']['profit'] }}</li>
                                                        @endif
                                                    </ul>
                                                </td>
                                            @else
                                                <td class="text-center"></td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endforeach

                    <!-- Static Data Section -->


                    {{--                    <form action="#" method="POST" class="form-inline">--}}
                    {{--                        @csrf--}}
                    {{--                        <input type="hidden" name="finalData" value="{{ json_encode($finalData) }}">--}}
                    {{--                        <input type="hidden" name="startDate" value="2024-01-01">--}}
                    {{--                        <input type="hidden" name="endDate" value="2024-01-31">--}}
                    {{--                        <button type="submit" class="btn def-custom-btn">Export to XLSX</button>--}}
                    {{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>


    <div id="custom_date_range_modal" class="modal_time">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="form-group">
                <label for="custom_start_date" class="mr-2">Начальная дата:</label>
                <input type="date" id="custom_start_date" name="custom_start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="custom_end_date" class="mr-2">Конечная дата:</label>
                <input type="date" id="custom_end_date" name="custom_end_date" class="form-control" required>
            </div>
            <button id="custom_date_range_submit" class="btn def-custom-btn">Применить</button>
        </div>
    </div>

</section>


@include('add.footer')
@include('front.crm.footer')

<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table th:not(:first-child),
    .table td:not(:first-child) {
        border-left: 1px solid #ddd;
    }

    .leads-new-name-col,
    .leads-status-col,
    .leads-contacts-col,
    .leads-col,
    .with-filter,
    .binotel-info {
        pointer-events: none;
    }

    .mw1460 .field-container .input-block select[name=user_id],
    .mw1460 .field-container .input-block select[name=city_id],
    .mw1460 .field-container .input-block select[name=status_id],
    .mw1460 .field-container .input-block.w260 #leads_search,
    .mw1460 .field-container .input-block.w260 {
        width: 220px;
    }

    @if(Auth::user()->role_id == 1)
.mw1460 .search-form.field-container {
        width: 850px;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .mw1460 .search-form.field-container .w260:nth-child(1),
    .mw1460 .search-form.field-container .w260:nth-child(2),
    .mw1460 .search-form.field-container .w260:nth-child(3) {
        margin-bottom: 0;
    }

    @endif
.selected-line {
        background: #FFF0EC;
    }

    .select2-container {
        border: 1px solid #CDD4D9;
        box-sizing: border-box;
        border-radius: 3px;

        /*padding:  0 20px 0 11px;*/
        /*width: 263px;*/
        /*height: 42px;*/
        height: 42px;

        font-family: Helvetica Neue;
        font-style: normal;
        font-weight: 500;
        font-size: 13px;
        line-height: 16px;
        color: #3D445C;
        background: white;
    }

    .input-block .select2-selection--multiple {
        width: 263px;
    }

    .select2-selection__rendered {
        height: 40px;
        background: white;
    }

    .select2-container--default .select2-selection--single {
        width: 100%;
        height: 40px !important;
        border: none !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        /*padding: 0 !important;*/
    }

    .input-block .select2-selection__rendered {
        /*height: auto;*/
        background: white;
        flex-wrap: wrap;
        /*display: inline-block !important;*/
        display: flex;
        width: auto;
    }

    .select2-container--default .select2-selection--multiple {
        border: none !important;
        padding-bottom: 0;
        height: 40px;
        display: flex;
        align-items: center;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        line-height: 28px;
        border: none;
        border-radius: 0;
        display: flex;
        align-items: center;
        margin-top: 0px;
        margin-bottom: 2px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
        padding: 0px 4px 0px 5px;
        font-size: 13px;
        /*line-height: 18px;*/
    }

    .select2-selection__choice__remove span {
        /*width: 12px;
        height: 12px;
        display: block;
        line-height: 12px;*/
        display: flex;
        align-items: center;
        margin-right: 5px;
        height: 28px;
        position: relative;
    }

    .select2-selection__choice__remove span svg {
        width: 13px;
        height: 13px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        border-right: none;
        height: 28px;
        /*line-height: 28px;*/
        display: inline-block;
        /*align-items: center;*/
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        background: none;
    }

    .select2-container--default .select2-search--inline .select2-search__field {
        line-height: 30px;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border: none;
    }

    .select2-dropdown--below {
        /*width: 263px !important;*/
    }

    .field-container .input-block input {
        background: white;
    }

    .field-container .input-block textarea {
        background: white;
    }

    /* **************************************** */
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 26px;
        position: absolute;
        top: 0px;
        right: 1px;
        width: 20px;
    }

    .select2-selection__rendered {
        height: 40px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 28px;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        display: block;
        padding-left: 8px;
        padding-right: 20px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .search-form .select2-container {
        z-index: 100;
    }

    [name=user_id] {
        width: 250px;
    }

    .show-block {
        display: flex;
        flex-direction: row;
        margin-right: 13px;
        width: 410px;
        flex-wrap: wrap;
    }

    .change-popup-body form {
        padding: 0;
    }

    .visibility-change {
        margin-left: 20px;
    }


    .modal_time {
        display: none; /* По умолчанию скрыто */
        position: absolute;
        z-index: 9999; /* Установите высокий z-index, чтобы модальное окно было поверх других элементов */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow: auto; /* Добавляем прокрутку, если содержимое модального окна превышает видимую область */
        align-items: center;
        justify-content: center;
    }

    /* Контент модального окна */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        border-radius: 5px;
        width: 10%; /* Регулируйте ширину по вашему выбору */
    }

    /* Кнопка закрытия */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .multiline {
        white-space: pre-line;
    }

    .table-caption {
        font-weight: bold;
        font-size: 1.2em;
    }

    .tables-container {
        display: flex;
        gap: 20px; /* Adjust space between tables as needed */
    }

    .table {
        width: 100%; /* Adjust table width as needed */
    }

    .data-cell {
        padding: 10px;
        border: 1px solid #ddd;
        vertical-align: top;
    }

    .data-list {
        list-style: none; /* Убираем маркеры списка */
        padding: 0; /* Убираем внутренние отступы */
        margin: 0; /* Убираем внешние отступы */
        text-align: left; /* Выравниваем текст по левому краю */
    }

    .data-list li {
        margin-bottom: 5px; /* Добавляем отступ между элементами списка */
    }

    .text-center {
        text-align: center;
    }


</style>

<script>
    var page = '{{$page}}';
    document.del_click = false;
    var main_url = '/manager/leads';
    var page_type = 'leads';
    let param_sort = '{{$params['sort']}}';
    let param_dir = '{{$params['dir']}}';
    $('#lead_cities').change(function () {
        setTimeout(function () {
            let h1 = $('.lead-add-header').height();
            let h2 = $('.lead-add-form').height();
            let new_h = h1 + h2 + 51;
            $('.lead-add-popup').css('height', new_h + 'px').css('margin-top', '-' + (new_h / 2) + 'px');
        }, 200);
    })

    document.addEventListener('DOMContentLoaded', function () {
        let urlParams = new URLSearchParams(window.location.search);
        let startDate = urlParams.get('start_date');
        let endDate = urlParams.get('end_date');

        if (startDate && endDate) {
            document.getElementById('selected_date_range').innerText = startDate + ' - ' + endDate;
        }
    });

    document.getElementById('date_range').addEventListener('change', function () {
        if (this.value === 'custom') {
            document.getElementById('custom_date_range_modal').style.display = 'flex';
        }

        let startDate = '';
        let endDate = '';

        switch (this.value) {
            case 'today':
                startDate = new Date().toISOString().split('T')[0];
                endDate = startDate;
                break;
            case 'yesterday':
                let yesterday = new Date();
                yesterday.setDate(yesterday.getDate() - 1);
                startDate = yesterday.toISOString().split('T')[0];
                endDate = yesterday.toISOString().split('T')[0];
                break;
            case 'current_week':
                let currentWeek = new Date();
                let dayOfWeek = currentWeek.getDay();
                let diff = currentWeek.getDate() - dayOfWeek + (dayOfWeek === 0 ? -6 : 1);
                startDate = new Date(currentWeek.setDate(diff)).toISOString().split('T')[0];

                let endDateObject = new Date();
                endDateObject.setDate(diff + 6);
                endDate = endDateObject.toISOString().split('T')[0];
                break;
            case 'last_week':
                let today = new Date();

                if (today.getDay() === 0) {
                    today.setDate(today.getDate() - 6);
                }

                let lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);

                let prevWeekStart = new Date(lastWeek.setDate(lastWeek.getDate() - lastWeek.getDay() + 2));
                let prevWeekEnd = new Date(lastWeek.setDate(prevWeekStart.getDate() + 6));

                startDate = prevWeekStart.toISOString().split('T')[0];
                endDate = prevWeekEnd.toISOString().split('T')[0];
                break;
            case 'current_month':
                let currentMonthStart = new Date(new Date().getFullYear(), new Date().getMonth(), 1);
                currentMonthStart = new Date(currentMonthStart.setDate(currentMonthStart.getDate() + 1))
                startDate = currentMonthStart.toISOString().split('T')[0];

                let currentMonthEnd = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0);
                currentMonthEnd = new Date(currentMonthEnd.setDate(currentMonthEnd.getDate() + 1))
                endDate = currentMonthEnd.toISOString().split('T')[0];
                break;
            case 'last_month':
                let lastMonthStart = new Date(new Date().getFullYear(), new Date().getMonth() - 1, 1);
                lastMonthStart = new Date(lastMonthStart.setDate(lastMonthStart.getDate() + 1))
                startDate = lastMonthStart.toISOString().split('T')[0];

                let lastMonthEnd = new Date(new Date().getFullYear(), new Date().getMonth(), 0);
                lastMonthEnd = new Date(lastMonthEnd.setDate(lastMonthEnd.getDate() + 1))
                endDate = lastMonthEnd.toISOString().split('T')[0];
                break;
            case'all_time':
                startDate = "2024-04-01";
                endDate = new Date().toISOString().split('T')[0];
                break;
            default:
                startDate = '';
                endDate = '';
        }
        document.getElementById('start_date_hidden').value = startDate;
        document.getElementById('end_date_hidden').value = endDate;
    });

    document.getElementById('custom_date_range_submit').addEventListener('click', function () {
        document.getElementById('custom_date_range_modal').style.display = 'none';
    });


    document.querySelector("#custom_date_range_modal .close").addEventListener('click', function () {
        document.getElementById('custom_date_range_modal').style.display = 'none';
    });

    document.getElementById('custom_date_range_submit').addEventListener('click', function () {
        let startDate = document.getElementById('custom_start_date').value;
        let endDate = document.getElementById('custom_end_date').value;

        document.getElementById('start_date_hidden').value = startDate;
        document.getElementById('end_date_hidden').value = endDate;

        document.getElementById('selected_date_range').innerText = startDate + ' - ' + endDate;

        document.getElementById('custom_date_range_modal').style.display = 'none';
    });


    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        let regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

</script>

@include('front.crm.scripts')
