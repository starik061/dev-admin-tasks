@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
    $webp = "";
@endphp

<section class="lead-block">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters navigation-wrapper-">
            <div class="container container-base bank-operation-page">
                <h1 class="title-search-result">
                    {{ $data['seo']->h1_title }}
                </h1>
                <div class="content-block">
                    <div class="content-block-header">
                        <form action="{{ route('ba.index') }}" method="GET" id="bank-operations-search">
                            <div class="field-container">
                                <div class="input-block w150">
                                    <label>@lang('message.search')</label>
                                    <input type="text" name="s" placeholder="@lang('message.enter_value')"
                                           value="@if(!empty($search)){{ $search }}@endif"/>
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.recipient_') </label>
                                    <select name="details_id" class="details_id-select">
                                        <option value="">-</option>
                                        @foreach($details as $k => $v)
                                            <option value="{{$k}}"
                                                    @if($k == $detailsId) selected @endif>
                                                {{$v}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block mr25">
                                    <label>@lang('message.results_period') </label>
                                    <select name="month" class="month-select">
                                        <option value="">-</option>
                                        @foreach($monthsList as $k => $v)
                                            <option value="{{$k}}"
                                                    @if($k == $month) selected @endif>
                                                {{$v}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block mr0">
                                    <button class="crm-button">@lang('message.find')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="bank-operations-result">
                        <table>
                            <thead>
                                <tr>
                                    <td>Клиент</td>
                                    <td>ЕДРАОУ</td>
                                    <td>Плательщик</td>
                                    <td>№ док.</td>
                                    <td>Дата</td>
                                    <td>Сумма</td>
                                    <td>Назначение</td>
                                    <td>Получатель</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($bankOperations))
                                    @foreach($bankOperations as $item)
                                        <tr @if($item->bill_id) class="linked" @endif>
                                            <td>
                                                @if($item->client_info)
                                                    <a href="/manager/clients/{{$item->client_info->id}}/bills" target="_blank">
                                                        {{$item->client_info->name}}
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{$item->edrpou}}</td>
                                            <td>{{$item->payer}}</td>
                                            <td>{{$item->doc_number}}</td>
                                            <td>{{$item->operation_date}}</td>
                                            <td>{{$item->sum}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$details[$item->detail_id]}}</td>
                                            <td>
                                                @if($item->client_info && $item->bank_id !== 5)
                                                    <span class="crm-button pointer send-button" data-id="{{$item->id}}">Отправить в BAS</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        @if ($bankOperations->lastPage() > 1)
                            <div class="result-paginator" data-current-page="{{ $bankOperations->currentPage() }}" data-total-page="{{ $bankOperations->lastPage() }}">
                                <div class="result-paginator__pages">
                                    <div class='result-paginator__prev'>
                                        <i class="fa fa-arrow-left"></i>
                                        <a href="{!! $bankOperations->previousPageUrl() !!}"><p class="result-paginator__prev-title">@lang('message.prev')</p></a>
                                    </div>
                                    {!! $bankOperations->appends($params)->links() !!}
                                    <div class='result-paginator__next'>
                                        <a href="{!! $bankOperations->nextPageUrl() !!}"><p class="result-paginator__next-title">@lang('message.next')</p></a>
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        @endif
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
    .content-block{
        margin: 20px 0;
    }
    .bank-operation-page{
        width: 1260px;
        max-width: 1260px;
    }
    #bank-operations-search .field-container{
        margin-top: 15px;
        display: flex;
    }
    .field-container .input-block{
        margin-right: 25px;
    }
    .details_id-select, .month-select{
        width: 320px;
    }
    .mr25{
        margin-right: 25px !important;
    }
    .bank-operations-result table{
        width: 100%;
    }
    .bank-operations-result table tr {
        border-bottom: solid 1px #cdd4d9;
    }
    .bank-operations-result table{
        font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;
        color: #3D445C;
    }
    .bank-operations-result table thead td{
        font-style: normal;
        font-weight: 500;
        font-size: 12px;
        line-height: 13px;
        text-transform: lowercase;
        padding: 12px;
    }
    .bank-operations-result table tbody td {
        font-size: 13px;
        line-height: 19px;
        padding: 24px 12px;
    }
    .linked{
        background: #e5ffe5;
    }
    .send-button{
        display: block;
        white-space: nowrap;
    }
    .result-paginator .result-paginator__pages {
        display: flex;
        justify-content: space-between;
        height: 45px;
        margin-top: 10px;
    }
</style>
<script>
    let startSending = false;
    $(document).ready(function(){
        $('.details_id-select, .month-select').select2();
        $('.send-button').click(function(){
            if(startSending){
                return false;
            }
            let this_ = this;
            $(this).empty().append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
            startSending = true;
            const operationId = $(this).data('id');
            $.ajax({
                url: `/manager/bank-operations/${operationId}/send`,
                data: null,
                type: "post",
                dataType: "json",
                contentType: "application/json",
                processData: false,
                success: function(data){
                    toastr.success(data.message);
                    startSending = false;
                    $(this_).empty().append('Отправить в BAS');
                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(xhr);
                    toastr.error(xhr.responseJSON.message, "Ошибка", {timeOut: 5000});
                    startSending = false;
                    $(this_).empty().append('Отправить в BAS');
                }
            })
        });
    });
    @if(session('success') || @$success)
    notify("{!! session('name') !!}");
    @endif
</script>