@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
    $webp = "";
    $currentMonth = date('Y-m');
@endphp

<section id="result-search-list" class="al-client-info">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters">
            <div class="container container-base container-search-result manager-search our-details posts-block statistics-block">
                <h1 class="title-search-result">
                    {{ $data['seo']->h1_title }}
                </h1>
                <div class="content-block posts-block">
                    <div class="posts-list">
                        <div class="client-navigation" style="margin-bottom: 20px;">
                            <div class="favorite-viewed-tab">
                                <a href="/manager/boards-price-history">Анализ цен по типу</a>
                                <a href="/manager/boards-price-history/by-boards" class="active">Анализ цен по плоскостям</a>
                            </div>
                        </div>
                        <div class="clients-contracts-data" style="margin-bottom: 20px;">
                            <div class="field-container">
                                <form action="/manager/boards-price-history/by-boards" class="field-container">
                                    {{--
                                    <div class="input-block">
                                        <label>@lang('message.month2')</label>
                                        <select name="month" class="w260">
                                            <option></option>
                                            @foreach($monthsDataList as $ym => $name)
                                                <option value="{{$ym}}" @if($month == $ym) selected @endif>{{$name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    --}}
                                    <div class="input-block">
                                        <label>@lang('message.firm')</label>
                                        <select name="firm_id" class="w260">
                                            <option></option>
                                            @foreach($firms as $firmId => $name)
                                                <option value="{{$firmId}}" @if(isset($params['firm_id']) && $params['firm_id'] == $firmId) selected @endif>
                                                    {{$name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-block" style="margin-right: 25px;">
                                        <label>@lang('message.city')</label>
                                        <select name="city_id" class="w260">
                                            <option></option>
                                            @foreach($citiesList as $cityId => $name)
                                                <option value="{{$cityId}}" @if(isset($params['city_id']) && $params['city_id'] == $cityId) selected @endif>
                                                    {{$name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-block" style="margin-right: 25px;">
                                        <label>@lang('message.district')</label>
                                        <select name="district_id" class="w260">
                                            <option></option>
                                            @foreach($districtsList as $districtId => $name)
                                                <option value="{{$districtId}}" @if(isset($params['district_id']) && $params['district_id'] == $districtId) selected @endif>
                                                    {{$name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-block" style="margin-right: 25px;">
                                        <label>@lang('message.type')</label>
                                        <select name="type" class="w260">
                                            <option></option>
                                            @foreach($types as $type => $name)
                                                <option value="{{$type}}" @if(isset($params['type']) && $params['type'] == $type) selected @endif>
                                                    {{$name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-block" style="margin-right: 25px;">
                                        <label>@lang('message.side')</label>
                                        <select name="side_type" class="w260">
                                            <option></option>
                                            @foreach($sideTypes as $name)
                                                <option value="{{$type}}" @if(isset($params['side_type']) && $params['side_type'] == $name) selected @endif>
                                                    {{$name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-block" style="margin-right: 25px;">
                                        <label>@lang('message.light')</label>
                                        <select name="light" class="w260">
                                            <option></option>
                                            <option value="{{App\Helpers\BoardConstants::LIGHT_ON}}" @if(isset($params['light']) && $params['light'] == App\Helpers\BoardConstants::LIGHT_ON) selected @endif>
                                                Есть
                                            </option>
                                            <option value="{{App\Helpers\BoardConstants::LIGHT_OFF}}" @if(isset($params['light']) && $params['light'] == App\Helpers\BoardConstants::LIGHT_OFF) selected @endif>
                                                Нет
                                            </option>
                                        </select>
                                    </div>
                                    <div class="input-block" style="margin-right: 25px;">
                                        <label>@lang('message.trassa')</label>
                                        <select name="trassa" class="w260">
                                            <option></option>
                                            <option value="1" @if(isset($params['trassa']) && $params['trassa'] == 1) selected @endif>
                                                Да
                                            </option>
                                            <option value="0" @if(isset($params['trassa']) && $params['trassa'] == 0) selected @endif>
                                                Нет
                                            </option>
                                        </select>
                                    </div>
                                    <div class="input-block" style="margin-right: 25px;">
                                        <label>@lang('message.period')</label>
                                        <select name="interval" class="w260">
                                            <option value="1" @if($interval == 1) selected @endif>1 месяц</option>
                                            <option value="2" @if($interval == 2) selected @endif>2 месяца</option>
                                            <option value="3" @if($interval == 3) selected @endif>3 месяца</option>
                                            <option value="4" @if($interval == 4) selected @endif>4 месяца</option>
                                            <option value="5" @if($interval == 5) selected @endif>5 месяцев</option>
                                            <option value="6" @if($interval == 6) selected @endif>6 месяцев</option>
                                            <option value="7" @if($interval == 7) selected @endif>7 месяцев</option>
                                            <option value="8" @if($interval == 8) selected @endif>8 месяцев</option>
                                            <option value="9" @if($interval == 9) selected @endif>9 месяцев</option>
                                            <option value="10" @if($interval == 10) selected @endif>10 месяцев</option>
                                            <option value="11" @if($interval == 11) selected @endif>11 месяцев</option>
                                            <option value="12" @if($interval == 12) selected @endif>1 год</option>
                                        </select>
                                    </div>
                                    <div class="input-block">
                                        <label>&nbsp;</label>
                                        <button class="submit execute-export3">показать</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="statistic-result">
                        @if(count($boardData))
                            <table>
                                <thead>
                                <tr>
                                    <td rowspan="2">Код</td>
                                    <td rowspan="2">Фирма</td>
                                    <td rowspan="2">город</td>
                                    <td rowspan="2">район</td>
                                    <td rowspan="2">Тип</td>
                                    <td rowspan="2"><span class="rotate90">Сторона</span></td>
                                    <td rowspan="2"><span class="rotate90">Освещение</span></td>
                                    <td rowspan="2"><span class="rotate90">Трасса</span></td>
                                    <td colspan="{{$interval}}">Входящая цена<br>(Цена оператора).</td>
                                    <td colspan="{{$interval}}">Цена по городу (по типу)</td>
                                    <td colspan="{{$interval}}">Себестоимость (накладная/счет)</td>
                                    <td colspan="{{$interval}}">Себестоимость по городу (накладная/счет)</td>
                                    <td colspan="{{$interval}}">Анализ цен Разница между Входящей ценой и себестоимостью</td>
                                    <td rowspan="2">Отображаемая</td>
                                    <td rowspan="2">Источник Входящей цены</td>
                                    <td rowspan="2">Источник Себестоимости</td>
                                    <td rowspan="2">"% Коррекции действующий сейчас</td>
                                </tr>
                                <tr>
                                    @foreach($periods as $month => $monthName)
                                        <td @if($month === $currentMonth) class="current-month" @endif>{{$monthName}}</td>
                                    @endforeach
                                    @foreach($periods as $month => $monthName)
                                        <td @if($month === $currentMonth) class="current-month" @endif>{{$monthName}}</td>
                                    @endforeach
                                    @foreach($periods as $month => $monthName)
                                        <td @if($month === $currentMonth) class="current-month" @endif>{{$monthName}}</td>
                                    @endforeach
                                    @foreach($periods as $month => $monthName)
                                        <td @if($month === $currentMonth) class="current-month" @endif>{{$monthName}}</td>
                                    @endforeach
                                    @foreach($periods as $month => $monthName)
                                        <td @if($month === $currentMonth) class="current-month" @endif>{{$monthName}}</td>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($boardData as $boardId => $info)
                                    @php
                                    $statInfo = $stat[$info[$currentMonth]['firm']][$info[$currentMonth]['city']][$info[$currentMonth]['district_id']][$info[$currentMonth]['type']][$info[$currentMonth]['side_type']][$info[$currentMonth]['light']][$info[$currentMonth]['trassa']][$currentMonth];
                                    @endphp
                                    <tr @if($i%2 === 1) class="light-gray" @endif>
                                        <td>{{$info[$currentMonth]['board_id']}}</td>
                                        <td>{{$firms[$info[$currentMonth]['firm']]}}</td>
                                        <td>{{$citiesList[$info[$currentMonth]['city']]}}</td>
                                        <td>{{$districtsList[$info[$currentMonth]['district_id']]}}</td>
                                        <td>{{$types[$info[$currentMonth]['type']]}}</td>
                                        <td>{{$info[$currentMonth]['side_type']}}</td>
                                        <td>{{$info[$currentMonth]['light'] == App\Helpers\BoardConstants::LIGHT_ON ? 'Есть' : 'Нет'}}</td>
                                        <td>{{$info[$currentMonth]['trassa'] == App\Helpers\BoardConstants::IS_TRACK ? 'Есть' : 'Нет'}}</td>
                                        @foreach($periods as $month => $monthName)
                                            <td @if($month === $currentMonth) class="current-month" @endif>{{$info[$month]['price']}}</td>
                                        @endforeach
                                        @foreach($periods as $month => $monthName)
                                            <td @if($month === $currentMonth) class="current-month" @endif>
                                                @if(isset($info[$month]['city_cost']['avg']))
                                                ср. {{$info[$month]['city_price']['avg']}} <br>
                                                мед. {{$info[$month]['city_price']['median']}}
                                                @endif
                                            </td>
                                        @endforeach
                                        @foreach($periods as $month => $monthName)
                                            <td @if($month === $currentMonth) class="current-month" @endif>{{$info[$month]['cost']}}</td>
                                        @endforeach
                                        @foreach($periods as $month => $monthName)
                                            <td @if($month === $currentMonth) class="current-month" @endif>
                                                @if(isset($info[$month]['city_cost']['avg']))
                                                ср. {{$info[$month]['city_cost']['avg']}} <br>
                                                мед. {{$info[$month]['city_cost']['median']}}
                                                @endif
                                            </td>
                                        @endforeach
                                        @foreach($periods as $month => $monthName)
                                            <td @if($month === $currentMonth) class="current-month" @endif>{{$info[$month]['delta']['price']}}</td>
                                        @endforeach
                                        <td>{{$info[$month]['price']}}</td>
                                        <td>{{$priceSource[$info[$currentMonth]['source']] ?? ''}}</td>
                                        <td>
                                            @if(isset($statInfo))
                                                {{$correctionSource[$statInfo['price_source']]}}<br/><hr>
                                                {{$correctionCostSource[$statInfo['cost_source']]}}
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($statInfo))
                                                {{$statInfo['correction']}}%
                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('add.footer')
<style>
    button.submit{
        box-sizing: border-box;
        display: inline-block;
        height: 42px;
        padding: 0 10px;
    }
    .w260{
        width: 260px;
    }
    .input-block.w260{
        display: flex;
        align-items: center;
        padding-top: 21px;
        font-weight: bold;
    }
    [name=firm_id]{
        width: 300px;
    }
    [name=type]{
        width: 150px;
    }
    [name=light],
    [name=side_type],
    [name=trassa]{
        width: 100px;
    }
    [name="interval"]{
        width: 130px;
    }
    #result-search-list .manager-search.our-details.posts-block.statistics-block{
        padding: 0 20px;
        /*width: 1440px;*/
        width: 100%;
    }
    .statistic-result thead td{

    }
    .statistic-result td{
        border: solid 1px #dee5ec;
        padding: 5px;
    }
    .rotate90 {
        transform: rotate(90deg);
        display: block;
    }
    thead tr td{
        background: #f0f0f0;
    }
    tbody tr.light-gray td{
        background: #f5f5f5;
    }
    .current-month{
        font-weight: bold;
    }
</style>
<div class="al-overlay3 hide"></div>
@include('front.crm.footer')
@include('front.crm.scripts')
<script>
    $(document).ready(function(){
        //$('[name="month"]').select2({minimumResultsForSearch: -1});
        $('[name="firm_id"]').select2();
        $('[name="city_id"]').select2();
        $('[name="district_id"]').select2();
        $('[name="type"]').select2();
        $('[name="side_type"]').select2();
        $('[name="light"]').select2();
        $('[name="trassa"]').select2();
        $('[name="interval"]').select2();
    })
</script>

