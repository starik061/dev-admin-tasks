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
                                <a href="/manager/boards-price-history"  class="active">Анализ цен по типу</a>
                                <a href="/manager/boards-price-history/by-boards" >Анализ цен по плоскостям</a>
                            </div>
                        </div>
                        <div class="clients-contracts-data" style="margin-bottom: 20px;">
                            <div class="field-container">
                                <form action="/manager/boards-price-history" class="field-container">
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
                                        <td rowspan="2">Фирма</td>
                                        <td rowspan="2">город</td>
                                        <td rowspan="2">район</td>
                                        <td rowspan="2">Тип</td>
                                        <td rowspan="2"><span class="rotate90">Сторона</span></td>
                                        <td rowspan="2"><span class="rotate90">Освещение</span></td>
                                        <td rowspan="2"><span class="rotate90">Трасса</span></td>
                                        <td rowspan="2"></td>
                                        <td colspan="{{$interval}}">Входящая цена<br>(Цена оператора).</td>
                                        <td rowspan="2">Источник Входящей цены</td>
                                        <td colspan="{{$interval}}">Цена по городу (по типу)</td>
                                        <td colspan="{{$interval}}">Себестоимость (накладная/счет)</td>
                                        <td colspan="{{$interval}}">Себестоимость по городу (накладная/счет)</td>
                                        <td colspan="{{$interval}}">Анализ цен Разница между Входящей ценой и себестоимостью</td>
                                        <td rowspan="2">Источник Входящей цены</td>
                                        <td rowspan="2">Источник Себестоимости</td>
                                        <td rowspan="2">% Коррекции действующий сейчас</td>
                                        <td rowspan="2"></td>
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
                                @foreach($boardData as $firmId => $cityData)
                                    @foreach($cityData as $cityId => $districtData)
                                        @foreach($districtData as $districtId => $typeData)
                                            @foreach($typeData as $type => $sideData)
                                                @foreach($sideData as $side => $lightData)
                                                    @foreach($lightData as $light => $trassaData)
                                                        @foreach($trassaData as $trass => $priceData)
                                                            <tr @if($i%2 === 1) class="light-gray" @endif
                                                                data-firm_id="{{$firmId}}"
                                                                data-city_id="{{$cityId}}"
                                                                data-district_id="{{$districtId}}"
                                                                data-type="{{$type}}"
                                                                data-side_type="{{$side}}"
                                                                data-light="{{$light}}"
                                                                data-trassa="{{$trass}}"
                                                            >
                                                                <td rowspan="6">{{$firms[$firmId]}}</td>
                                                                <td rowspan="6">{{$citiesList[$cityId]}}</td>
                                                                <td rowspan="6">{{$districtsList[$districtId]}}</td>
                                                                <td rowspan="6">{{$types[$type]}}</td>
                                                                <td rowspan="6">{{$side}}</td>
                                                                <td rowspan="6">{{$light == App\Helpers\BoardConstants::LIGHT_ON ? 'Есть' : 'Нет'}}</td>
                                                                <td rowspan="6">{{$trass == App\Helpers\BoardConstants::IS_TRACK ? 'Есть' : 'Нет'}}</td>
                                                                <td>Кол-во</td>
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['boards_count']}}</td>
                                                                @endforeach
                                                                <td rowspan="6">{{$priceSource[$priceData[$currentMonth]['source']] ?? ''}}</td>
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['city_boards_count']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['cost_boards_count']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['city_cost_boards_count']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['delta']['count']}}</td>
                                                                @endforeach
                                                                <td rowspan="6">
                                                                    @foreach($correctionSource as $correctionId => $correctionName)
                                                                        <label>
                                                                            <input type="radio"
                                                                                   name="price_source_{{$i}}"
                                                                                   value="{{$correctionId}}"
                                                                                   @if($priceData[$currentMonth]['price_source'] == $correctionId || (!$correctionSource[$priceData[$currentMonth]['price_source']] && $correctionId == 1)) checked @endif
                                                                            >
                                                                            {{$correctionName}}
                                                                        </label>
                                                                    @endforeach
                                                                    {{$correctionSource[$priceData[$currentMonth]['price_source']]}}
                                                                </td>
                                                                <td rowspan="6">
                                                                    @foreach($correctionCostSource as $correctionId => $correctionName)
                                                                        <label>
                                                                            <input type="radio"
                                                                                   name="cost_source_{{$i}}"
                                                                                   value="{{$correctionId}}"
                                                                                   @if($priceData[$currentMonth]['cost_source'] == $correctionId || (!$correctionSource[$priceData[$currentMonth]['cost_source']] && $correctionId == 1)) checked @endif
                                                                            >
                                                                            {{$correctionName}}
                                                                        </label>
                                                                    @endforeach
                                                                    {{$correctionCostSource[$priceData[$currentMonth]['price_source']]}}
                                                                </td>

                                                                <td rowspan="6" id="correction-{{$i}}">{{$priceData[$currentMonth]['correction']}}</td>
                                                                <td rowspan="6">
                                                                    <input type="text" name="correction_value"/>
                                                                    <span class="calc" data-line="{{$i}}">Рассчитать</span>
                                                                    <span class="apply" data-line="{{$i}}">Применить</span>
                                                                </td>
                                                            </tr>
                                                            <tr @if($i%2 === 1) class="light-gray" @endif>
                                                                <td>Мин.</td>
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['min_price']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['city_min_price']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['min_cost']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['city_min_cost']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['delta']['min']}}</td>
                                                                @endforeach
                                                            </tr>
                                                            <tr @if($i%2 === 1) class="light-gray" @endif>
                                                                <td>Макс.</td>
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['max_price']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['city_max_price']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['max_cost']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['city_max_cost']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['delta']['max']}}</td>
                                                                @endforeach
                                                            </tr>
                                                            <tr @if($i%2 === 1) class="light-gray" @endif>
                                                                <td>Сред.</td>
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month ap_{{$i}}" @endif>{{$priceData[$month]['avg_price']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month apc_{{$i}}" @endif>{{$priceData[$month]['city_avg_price']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month ac_{{$i}}" @endif>{{$priceData[$month]['avg_cost']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month acc_{{$i}}" @endif>{{$priceData[$month]['city_avg_cost']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['delta']['avg']}}</td>
                                                                @endforeach
                                                            </tr>
                                                            <tr @if($i%2 === 1) class="light-gray" @endif>
                                                                <td>Медиана</td>
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month mp_{{$i}}" @endif>{{$priceData[$month]['median_price']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month mpc_{{$i}}" @endif>{{$priceData[$month]['city_median_price']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month mc_{{$i}}" @endif>{{$priceData[$month]['median_cost']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month mcc_{{$i}}" @endif>{{$priceData[$month]['city_median_cost']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['delta']['median']}}</td>
                                                                @endforeach
                                                            </tr>
                                                            <tr @if($i%2 === 1) class="light-gray" @endif>
                                                                <td>Мода</td>
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['mode_price']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['city_mode_price']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['mode_cost']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['city_mode_cost']}}</td>
                                                                @endforeach
                                                                @foreach($periods as $month => $monthName)
                                                                    <td @if($month === $currentMonth) class="current-month" @endif>{{$priceData[$month]['delta']['mode']}}</td>
                                                                @endforeach
                                                            </tr>
                                                            @php
                                                            $i++;
                                                            @endphp
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach
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
    td input[type=radio]{
        opacity: 1;
        position: relative;
    }
    [name=correction_value]{
        width: 100% /*90px*/;
    }
    .apply,
    .calc{
        margin-top: 5px;
        height: 30px;
        display: inline-block;
        width: 100%;
        text-align: center;
        line-height: 28px;
        box-sizing: border-box;
        border-radius: 4px;
        font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;
        font-style: normal;
        font-weight: bold;
        font-size: 13px;
        color: #fff;
        background: #FC6B40;
        border: none;
        padding: 0 14px;
        outline: none;
        cursor: pointer;
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
        $('.calc').click(function(){
            const line = $(this).data('line');
            const priceSource = {
                '1': 'mp',
                '2': 'ap',
                '3': 'mpc',
                '4': 'apc'
            };
            const costSource = {
                '1': 'mc',
                '2': 'ac',
                '3': 'mcc',
                '4': 'acc'
            };

            const priceSourceIndex = $(`[name=price_source_${line}]:checked`).val();
            const costSourceIndex = $(`[name=cost_source_${line}]:checked`).val();
            const costPrice = +$('.'+costSource[costSourceIndex]+'_'+line).text();
            const originalPrice = +$('.'+priceSource[priceSourceIndex]+'_'+line).text();
            console.log(line);
            console.log(costSourceIndex);
            console.log(priceSourceIndex);
            console.log(costSource[costSourceIndex]);
            console.log(priceSource[priceSourceIndex]);
            console.log(costPrice);
            console.log(originalPrice);
            const correction = -Math.round((1 - costPrice/originalPrice) * 100);
            $(this).parent().find('input').val(correction+'%');
        });
        $('.apply').click(function(){
            const line = $(this).data('line');
            const correction = $(this).parent().find('input').val();
            $(`#correction-${line}`).empty().append(correction);
            const tr = $(this).closest("tr");
            console.log($(tr).data('firm_id'));
            const data = {
                price_source: $(`[name=price_source_${line}]:checked`).val(),
                cost_source: $(`[name=cost_source_${line}]:checked`).val(),
                firm_id: $(tr).data('firm_id'),
                city_id: $(tr).data('city_id'),
                district_id: $(tr).data('district_id'),
                type: $(tr).data('type'),
                side_type: $(tr).data('side_type'),
                light: $(tr).data('light'),
                trassa: $(tr).data('trassa'),
                correction: correction.split('%').join(''),
            }
            addGlobalLoader()
            $.ajax({
                url: '/manager/boards-price-history/apply',
                type: 'POST',
                data: JSON.stringify(data),
                contentType: "application/json",
                accept: 'application/json',
                processData: false,
                success: function (response) {
                    removeGlobalLoader();
                    toastr.success('Значение записано в таблицу');
                },
                error: suppliersBillsResponseError
            })
        })
        $('[name=firm_id]').change(function(){
            const id = $(this).val();
            if(!id){
                //hz
            }else{
                $.ajax({
                    url: `/api/firms/${id}/cities`,
                    type: 'GET',
                    contentType: "application/json",
                    accept: 'application/json',
                    processData: false,
                    success: function (response) {
                        let options = '<option></option>';
                        if(response.cities.length){
                            response.cities.forEach(function(item){
                                const name = item.name_new && item.name_new !== item.name ? item.name_new + ` (${item.name})` : item.name;
                                options += `<option value="${item.id}">${name}</option>`;
                            });
                        }
                        $('[name="city_id"]').empty().append(options).select2();
                    },
                    error: suppliersBillsResponseError,
                });
            }
        });
        $('[name=city_id]').change(function(){
            const id = $(this).val();
            if(!id){
                $('[name="district_id"]').empty().append('<option value="-">-</option>').select2();
            }else{
                $.ajax({
                    url: `/api/cities/${id}/districts`,
                    type: 'GET',
                    contentType: "application/json",
                    accept: 'application/json',
                    processData: false,
                    success: function (response) {
                        let options = '<option></option>';
                        if(response.districts.length){
                            response.districts.forEach(function(item){
                                options += `<option value="${item.id}">${item.name}</option>`;
                            });
                        }
                        $('[name="district_id"]').empty().append(options).select2();
                    },
                    error: suppliersBillsResponseError,
                });
            }
        });
    })
</script>


