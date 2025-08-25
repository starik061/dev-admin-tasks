@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
    $webp = "";
@endphp
<style>
    #schedule-table{
        width: 100%;
        margin-bottom: 10px;
    }
    #schedule-table td{
        padding: 10px;
        text-align: left;
        vertical-align: top;
    }
    input[type=text]{
        width: 150px;
        border: 1px solid #CDD4D9;
        box-sizing: border-box;
        border-radius: 3px;
        height: 42px;
        font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 13px;
        line-height: 16px;
        color: #3D445C;
        padding: 0 11px;
    }
    table label{
        margin-top: 10px;
    }
    .delete-schedule{
        display: inline-block;
        cursor: pointer;
        width: 30px;
        height: 30px;
        border: solid 1px #CDD4D9;
        border-radius: 4px;
        padding: 5px;
        position: relative;
    }
    .binotel-manager-options label{
        width: 545px;
    }
</style>
<section id="result-search-list" class="al-client-info">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters">
            <div class="container container-base container-search-result manager-search our-details posts-block">
                <div class="favorite-viewed-tab system-info-tabs">
                    @include('front.crm.settings-menu')
                </div>
                <h1 class="title-search-result">
                    {{ $data['seo']->h1_title }}
                </h1>
                <div class="content-block posts-block">
                    <div class="posts-list">
                        <div class="clients-contracts-data">
                            <div class="data-table">
                                <div class="data-thead">
                                    <div class="data-tr">
                                        <div class="data-td td-name">@lang('message.parameter')</div>
                                        <div class="data-td action-col"></div>
                                    </div>
                                </div>
                                <form method="post" action="/manager/chaport">
                                    <div class="data-tbody contracts-rows">
                                        <div class="data-tr">
                                            <div class="data-td td-name" style="flex-basis: 380px; display:block;">Праздничные дни</div>
                                            <div class="data-td action-col field-container" style="flex-basis: 565px; display:block;">
                                                <div class="input-block binotel-manager-options">
                                                    <div id="holidays"></div>
                                                    <input type="text" name="holidays" value="{{implode(', ', $holidays)}}" style="display:none"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="data-tr">
                                            <div class="data-td td-name" style="flex-basis: 380px; display:block;">Текущее состояние</div>
                                            <div class="data-td action-col field-container">
                                                <div class="input-block binotel-manager-options">
                                                    <label>
                                                    @if($settings[2]->value == '0') не принимает сообщения @else принимает сообщения @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="data-tr">
                                            <div class="data-td td-name" style="flex-basis: 380px; display:block;">Ассистент активен</div>
                                            <div class="data-td action-col field-container">
                                                <div class="input-block binotel-manager-options">
                                                    <label>
                                                        <input type="radio" name="active_bot" value="0" @if($settings[0]->value === '0') checked @endif>&nbsp;нет
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="active_bot" value="1" @if($settings[0]->value == '1') checked @endif>&nbsp;да
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="data-tr">
                                            <div class="data-td td-name" style="flex-basis: 380px; display:block;">Расписание активно</div>
                                            <div class="data-td action-col field-container">
                                                <div class="input-block binotel-manager-options">
                                                    <label>
                                                        <input type="radio" name="active_schedule" value="0" @if($settings[1]->value === '0') checked @endif>&nbsp;нет
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="active_schedule" value="1" @if($settings[1]->value == '1') checked @endif>&nbsp;да
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="data-tr">
                                            <div class="data-td td-name" style="flex-basis: 380px; display:block;">Расписание</div>
                                            <div class="data-td action-col field-container" style="display: block">
                                                <table id="schedule-table" style="width: 555px;">
                                                    <thead>
                                                        <tr class="border-bottom">
                                                            <td>ID</td>
                                                            <td>Активно</td>
                                                            <td>Дни</td>
                                                            <td>Время</td>
                                                            <td>Действие</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="schedule-body">
                                                        @if($schedule)
                                                            @foreach($schedule as $row)
                                                                @include('front.crm.chaport.schedule-row')
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table><br>
                                                <a class="add-schedule btn">Добавить</a>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="crm-button mt20">Сохранить</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('add.footer')
@if(session('success') || @$success)
    <div class="success-mesage">
        {!! session('name') !!}
    </div>
@endif
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
@include('front.crm.scripts')

<link href="/public/assets/css/jquery-ui.multidatespicker.css" rel="stylesheet" type="text/css" />
<script src="/public/assets/js/jquery-ui.multidatespicker.js"></script>
<style>
    .ui-datepicker{
        width: 19em;
    }
    .ui-icon.ui-icon-circle-triangle-w,
    .ui-icon.ui-icon-circle-triangle-e{
        width: 18px;
        height: 18px;

    }
    .ui-datepicker-next .ui-icon.ui-icon-circle-triangle-e{
        transform: rotate(-45deg);
    }
    .ui-datepicker-prev .ui-icon.ui-icon-circle-triangle-w{
        transform: rotate(135deg);
    }
</style>
<script>
    let dates = [];
    $(document).ready(function (){
        $(document).on('click', '.add-schedule', function (){
            $.get('/manager/chaport/schedule/create', {}, function(data){
                if(data.view) {
                    $('.schedule-body').append(data.view);
                    dates[data.id] = datepicker('#d-'+data.id, {
                        startDay: 1,
                        customDays: ['@lang('message.sunday')', '@lang('message.monday')', '@lang('message.tuesday')', '@lang('message.wednesday')', '@lang('message.thursday')', '@lang('message.friday')', '@lang('message.saturday')'],
                        customMonths: ['@lang('message.january')', '@lang('message.february')', '@lang('message.march')', '@lang('message.april')', '@lang('message.may')', '@lang('message.june')', '@lang('message.july')', '@lang('message.august')', '@lang('message.september')', '@lang('message.october')', '@lang('message.november')', '@lang('message.december')'],
                        onSelect: instance => {
                            console.log(instance.dateSelected)
                        },
                        formatter: (input, date, instance) => {
                            let d = date.getDate();
                            let m = date.getMonth() + 1;
                            let y = date.getYear() + 1900;
                            let y2 = date.getYear() - 100;
                            if (d < 10) {
                                d = '0' + d;
                            }
                            if (m < 10) {
                                m = '0' + m;
                            }
                            input.value = d + '.' + m + '.' + y;
                        },
                    });
                }
            })
        })
        $('.datepicker').each(function(){
            const idx = $(this).attr('id').split('-')[1];
            dates[idx] = datepicker('#d-'+idx, {
                startDay: 1,
                customDays: ['@lang('message.sunday')', '@lang('message.monday')', '@lang('message.tuesday')', '@lang('message.wednesday')', '@lang('message.thursday')', '@lang('message.friday')', '@lang('message.saturday')'],
                customMonths: ['@lang('message.january')', '@lang('message.february')', '@lang('message.march')', '@lang('message.april')', '@lang('message.may')', '@lang('message.june')', '@lang('message.july')', '@lang('message.august')', '@lang('message.september')', '@lang('message.october')', '@lang('message.november')', '@lang('message.december')'],
                onSelect: instance => {
                    console.log(instance.dateSelected)
                },
                formatter: (input, date, instance) => {
                    let d = date.getDate();
                    let m = date.getMonth() + 1;
                    let y = date.getYear() + 1900;
                    let y2 = date.getYear() - 100;
                    if (d < 10) {
                        d = '0' + d;
                    }
                    if (m < 10) {
                        m = '0' + m;
                    }
                    input.value = d + '.' + m + '.' + y;
                },
            });
        })
        $(document).on('click', '.delete-schedule', function(){
            let _this = this;
            createConfirm('Удалить', 'Вы хотите удалить это расписание', function(){
                $(_this).closest('tr').remove();
            })
        })
        $("#holidays").multiDatesPicker({
            closeText: "Закрити",
            prevText: "Попередній",
            nextText: "найближчий",
            currentText: "Сьогодні",
            monthNames: [ "Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень",
                "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень" ],
            monthNamesShort: [ "Січ", "Лют", "Бер", "Кві", "Тра", "Чер",
                "Лип", "Сер", "Вер", "Жов", "Лис", "Гру" ],
            dayNames: [ "неділя", "понеділок", "вівторок", "середа", "четвер", "п’ятниця", "субота" ],
            dayNamesShort: [ "нед", "пнд", "вів", "срд", "чтв", "птн", "сбт" ],
            dayNamesMin: [ "Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ],
            weekHeader: "Тиж",
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: "",
            altField: "[name=holidays]",
            @if(count($holidays))
            addDates: [{!! '"'.implode('", "', $holidays).'"' !!}]
            @endif
        });
    })
</script>

