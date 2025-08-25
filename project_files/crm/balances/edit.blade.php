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
                            <a href="/manager/balances" >Просмотр</a>
                            <a href="/manager/balances/limits" >Лимиты</a>
                            {{--
                            <a href="/manager/balances/edit" class="active">Редактирование балансов на 01.01.2025</a>
                            --}}
                        </div>
                    </div>
                    <div class="result-block">
                        <form action="/manager/balances/edit" method="POST" id="balances-edit">
                            <table>
                                <thead>
                                <tr>
                                    <td>Компания</td>
                                    <td>Входящий баланс</td>
                                    <td>Приход</td>
                                    <td>Расход</td>
                                    <td>Исходящий Баланс</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ourDetails as $company)
                                    <tr>
                                        <td>{{$company->name_short}}</td>
                                        <td>
                                            <input type="text"
                                                   name="incoming_balance[{{$company->bank->id}}]"
                                                   value="{{$company->balance_info['incoming_balance']}}"/>
                                        </td>
                                        <td>
                                            <input type="text"
                                                   name="credit[{{$company->bank->id}}]"
                                                   value="{{$company->balance_info['credit']}}"/>
                                        </td>
                                        <td>
                                            <input type="text"
                                                   name="debit[{{$company->bank->id}}]"
                                                   value="{{$company->balance_info['debit']}}"/>
                                        </td>
                                        <td>
                                            <input type="text"
                                                   name="outgoing_balance[{{$company->bank->id}}]"
                                                   value="{{$company->balance_info['outgoing_balance']}}"/>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: right; margin-top: 20px;">
                                <button class="crm-button">@lang('message.save')</button>
                            </div>
                        </form>
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
    #balances-search .field-container{
        margin-top: 15px;
        display: flex;
    }
    .field-container .input-block{
        margin-right: 25px;
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
    td input[type=text]{
        background: white;
        border: 1px solid #CDD4D9;
        box-sizing: border-box;
        border-radius: 3px;
        width: 150px;
        height: 42px;
        font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 13px;
        line-height: 16px;
        color: #3D445C;
        padding: 0 11px;
    }
    .upd_info{
        padding: 10px;
        background:#99ff99;
        width: 100%;
        margin-top: 17px;
        display: none;
    }
</style>
<script>
    $(document).ready(function (){
        $('#balances-edit').submit(function(e){
            $('body').append('<div class="global-loader"></div>')
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: new FormData($(this)[0]),
                contentType: false,
                processData: false,
                success: function (response) {
                    toastr.success("Данные сохранены",)
                    $('.global-loader').remove();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    toastr.error("Попробуйте снова снова через какое-то время или обратитесь к администратору","Ошибка обработки данных")
                    $('.global-loader').remove();
                }
            })

            return false;
        })
    })
</script>
