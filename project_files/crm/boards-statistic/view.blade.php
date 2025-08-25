@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
    $webp = "";
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
                                <a href="/manager/boards-price-statistic" @if(!request()->is('*/selling*'))  class="active" @endif>Себестоимость</a>
                                <a href="/manager/boards-price-statistic/selling" @if(request()->is('*/selling*') && !request()->is('*/selling/kved*'))  class="active" @endif>Продажа</a>
                                <a href="/manager/boards-price-statistic/selling/kved" @if(request()->is('*/selling/kved*') &&  !request()->is('*/selling/kved/other-kveds*'))  class="active" @endif>Продажа (разбивка по основным квэд)</a>
                                <a href="/manager/boards-price-statistic/selling/kved/other-kveds" @if(request()->is('*/selling/kved/other-kveds*'))  class="active" @endif>Продажа (разбивка по дополнительным квэд)</a>
                            </div>
                        </div>
                        <div class="clients-contracts-data" style="margin-bottom: 20px;">
                            <div class="field-container">
                                <form action="/manager/boards-price-statistic{{ $selling ? '/selling' : '' }}{{$byKved ? '/kved' : ''}}" class="field-container">
                                    <div class="input-block">
                                        <label>@lang('message.month2')</label>
                                        <select name="month" class="w260">
                                            <option></option>
                                            @foreach($monthsDataList as $ym => $name)
                                                <option value="{{$ym}}" @if($month == $ym) selected @endif>{{$name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-block">
                                        @if($byKved)
                                            <label>@lang('message.kved')</label>
                                            <select name="kved" class="w260">
                                                <option></option>
                                                @foreach($kveds as $kvedId => $name)
                                                    <option value="{{$kvedId}}" @if($kved == $kvedId) selected @endif>{{$name}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <label>@lang('message.firm')</label>
                                            <select name="firm" class="w260">
                                                <option></option>
                                                @foreach($firms as $firmId => $name)
                                                    <option value="{{$firmId}}" @if($firm == $firmId) selected @endif>{{$name}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="input-block" style="margin-right: 25px;">
                                        <label>@lang('message.city')</label>
                                        <select name="city" class="w260">
                                            <option value="-">Все</option>
                                            @foreach($citiesList as $cityId => $name)
                                                <option value="{{$cityId}}" @if($city == $cityId) selected @endif>{{$name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($byKved)
                                        <div class="input-block" style="margin-right: 25px;">
                                            <label>Показывать</label>
                                            <select name="limit" class="w260">
                                                @foreach($limits as $limitId => $name)
                                                    <option value="{{$limitId}}" @if($limit == $limitId) selected @endif>{{$name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="input-block">
                                        <label>&nbsp;</label>
                                        <button class="submit execute-export3">показать</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="statistic-result">
                        @if(count($statistic))
                        <table>
                            <thead>
                                <td>{{ $byKved ? 'КВЕД' : 'Фирма' }}</td>
                                <td>Город</td>
                                <td>Тип</td>
                                <td>Сторона</td>
                                <td></td>
                                @foreach($monthsData as $ym => $monthName)
                                    <td>{{$monthName}}</td>
                                @endforeach
                            </thead>
                            @if($byKved)
                                @include('front.crm.boards-statistic.kved_rows')
                            @else
                                @include('front.crm.boards-statistic.default_rows')
                            @endif
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
    #result-search-list .manager-search.our-details.posts-block.statistics-block{
        width: 1440px;
    }
    .statistic-result thead td{

    }
    .statistic-result td{
        border: solid 1px #dee5ec;
        padding: 5px;
    }
</style>
<div class="al-overlay3 hide"></div>
@include('front.crm.footer')
@include('front.crm.scripts')
<script>
    $(document).ready(function(){
        $('[name="month"]').select2({minimumResultsForSearch: -1});
        $('[name="firm"]').select2();
        $('[name="city"]').select2();
        $('[name="kved"]').select2();
        $('[name="limit"]').select2();
    })
</script>

