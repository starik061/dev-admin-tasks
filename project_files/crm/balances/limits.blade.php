@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
    $webp = "";
    $form2Sum = 0;
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
                            <a href="/manager/balances" >Просмотр</a>
                            <a href="/manager/balances/limits" class="active" >Лимиты</a>
                            {{--
                            <a href="/manager/balances/edit">Редактирование балансов на 01.01.2025</a>
                            --}}
                        </div>
                    </div>
                    <div class="result-block">
                        @foreach($ourDetails as $company)
                            @php
                            if($company->id === 5){
                                $form2Sum = $company->incoming_sum;
                                continue;
                            }
                            if($company->id === 9){
                                $company->incoming_sum += $form2Sum;
                            }
                            if($company->is_nds){
                                $company->income_limit = $company->income_limit * 1.2;
                            }
                            @endphp
                            <div class="limit-item">
                                <span>{{$company->name_short}}{{$company->id === 9 ? ' + Форма2' : ''}}</span>
                                <div class="limit-chart"
                                     id="chart-{{$company->id}}"
                                     data-limit="{{$company->income_limit}}"
                                     data-income="{{$company->incoming_sum}}"
                                     data-dimension="250"
                                     data-text="{{number_format($company->incoming_sum, '2', '.', ' ')}} ({{ $company->income_limit > 0 ?  ceil(($company->incoming_sum / $company->income_limit) * 100) : ''}}%)"
                                     data-info="из {{number_format($company->income_limit, '2', '.', ' ')}}"
                                     data-width="30"
                                     data-fontsize="18"
                                     data-percent="{{ $company->income_limit > 0 ?  ($company->incoming_sum / $company->income_limit) * 100 : ''}}"
                                     data-fgcolor="#fc6b40"
                                     data-bgcolor="#e8ebf1"
                                ></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('add.footer')
<script type="text/javascript" src="/assets/js/circliful.js"></script>
<link href="/assets/css/circliful.css" rel="stylesheet" type="text/css" />
<div class="al-overlay3 hide"></div>
@include('front.crm.footer')
@include('front.crm.scripts')

<style>
    .content-block{
        margin: 20px 0;
    }
    #balances-search .field-container{
        margin-top: 15px;
        display: flex;
    }
    .field-container .input-block{
        margin-right: 25px;
    }
    .result-block{
        display: flex;
        flex-wrap: wrap;
    }
    .result-block .limit-item{
        width: 320px;
        height: 274px;
        text-align: center;
    }
    .result-block .limit-item .circliful{
        margin: 0 auto;
    }
    .result-block table{
        width: 100%;
    }
    .result-block table tr {
        border-bottom: solid 1px #cdd4d9;
    }
    .result-block table{
        font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;
        color: #3D445C;
    }
    .result-block table thead td{
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

    .limit-chart{
        width: 643px;
        height: 241px;
    }
    .circle-text, .circle-info, .circle-text-half, .circle-info-half{
        width: 250px;
    }
    .circle-text{
        font-weight: 500;
    }
</style>
<script>
    $(document).ready(function (){
        $('.limit-chart').each(function(){
            $('#'+$(this).attr('id')).circliful();
        })
    })
</script>

