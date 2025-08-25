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
            <div class="container container-base container-search-result manager-search our-details posts-block">
                <h1 class="title-search-result">
                    {{ $data['seo']->h1_title }}
                </h1>
                <div class="content-block">
                    <div class="client-navigation" style="margin-bottom: 20px;">
                        <div class="favorite-viewed-tab">
                            <a href="/manager/balances" class="active">Просмотр</a>
                            <a href="/manager/balances/limits">Лимиты</a>
                            {{--
                            <a href="/manager/balances/edit">Редактирование балансов на 01.01.2025</a>
                            --}}
                        </div>
                    </div>
                    <div class="content-block-header">
                        <form action="" method="GET" id="balances-search">
                            <div class="field-container">
                                <div class="input-block">
                                    <label>@lang('message.company') </label>
                                    <select name="company_id" class="company_id-select">
                                        <option value="all">Все</option>
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}"
                                                    @if($company->id == $companyId) selected @endif>
                                                {{$company->name_short}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.period') </label>
                                    <select name="month" class="month-select">
                                        @foreach($months as $ym => $monthName)
                                            <option value="{{$ym}}"
                                                    @if($ym == $month) selected @endif>
                                                {{$monthName}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block mr0">
                                    <button class="crm-button">@lang('message.apply')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="result-block">
                        <table>
                            <thead>
                            <tr>
                                <td>Компания</td>
                                <td>Период</td>
                                <td>Входящий баланс</td>
                                <td>Приход</td>
                                <td>Расход</td>
                                <td>Исходящий Баланс</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ourDetails as $company)
                                @foreach($company->banks as $bank)
                                <tr class="bill-detials-{{$company->id}}">
                                    <td>{{$company->name_short}}<br>{{$bank->name}}</td>
                                    <td>{{$months[$month]}}</td>
                                    <td>{{number_format($balances[$bank->id]['incoming_balance'], 2, '.', ' ')}}</td>
                                    <td>{{number_format($balances[$bank->id]['credit'], 2, '.', ' ')}}</td>
                                    <td>{{number_format($balances[$bank->id]['debit'], 2, '.', ' ')}}</td>
                                    <td>{{number_format($balances[$bank->id]['outgoing_balance'], 2, '.', ' ')}}</td>
                                </tr>
                                @endforeach
                            @endforeach
                            <tr class="itogo">
                                <td>Итого</td>
                                <td>{{$months[$month]}}</td>
                                <td>{{number_format($balanceResult['incoming_balance'], 2, '.', ' ')}}</td>
                                <td>{{number_format($balanceResult['credit'], 2, '.', ' ')}}</td>
                                <td>{{number_format($balanceResult['debit'], 2, '.', ' ')}}</td>
                                <td>{{number_format($balanceResult['outgoing_balance'], 2, '.', ' ')}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer')
@include('front.crm.scripts')
<style>
    .content-block {
        margin: 20px 0;
    }

    #balances-search .field-container {
        margin-top: 15px;
        display: flex;
    }

    .field-container .input-block {
        margin-right: 25px;
    }

    .company_id-select, .month-select {
        width: 320px;
    }

    .mr25 {
        margin-right: 25px !important;
    }

    .result-block table {
        width: 100%;
    }

    .result-block table tr {
        border-bottom: solid 1px #cdd4d9;
    }

    .result-block table {
        font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;
        color: #3D445C;
    }

    .result-block table thead td {
        font-style: normal;
        font-weight: bold;
        font-size: 12px;
        line-height: 13px;
        text-transform: lowercase;
        padding: 12px;
    }

    .result-block table tbody td {
        font-size: 13px;
        line-height: 19px;
        padding: 24px 12px;
    }

    .result-block table tbody tr.itogo td {
        font-weight: bold;
    }

    .linked {
        background: #e5ffe5;
    }

    .send-button {
        display: block;
        white-space: nowrap;
    }
</style>
<script>
    $(document).ready(function () {
        $('.company_id-select, .month-select').select2();
    });
</script>