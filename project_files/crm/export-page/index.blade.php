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
                <div class="content-block posts-block">
                    <div class="posts-list">
                        <div class="clients-contracts-data">
                            <div class="field-container">
                                <div class="input-block w260">
                                    @lang('message.export_clients_and_leads')
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.month2')</label>
                                    <select id="incoming-leads-export-period">
                                        @foreach($monthList as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block">
                                    <label>&nbsp;</label>
                                    <a href="/manager/incoming-leads-export/export?ym={{date('Y-m')}}" class="submit execute-export" download>@lang('message.export')</a>
                                </div>
                            </div>
                            <div class="field-container">
                                <div class="input-block w260">
                                    @lang('message.export_clients_and_leads_by_period')
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.month_start_period')</label>
                                    <select id="incoming-leads-export-period2">
                                        @foreach($monthList as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block" style="margin-right: 25px;">
                                    <label>@lang('message.month_finish_period')</label>
                                    <select id="incoming-leads-export-period3">
                                        @foreach($monthList as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block" style="margin-right:0px;">
                                    <label>&nbsp;</label>
                                    <a href="/manager/incoming-leads-export/export?ym={{date('Y-m')}}" class="submit execute-export4" download>@lang('message.export')</a>
                                </div>
                            </div>
                            <div class="field-container">
                                <div class="input-block w260">
                                    @lang('message.weekly_statistics')
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.month2')</label>
                                    <select id="manager-competition">
                                        @foreach($monthList as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block">
                                    <label>&nbsp;</label>
                                    <a href="/manager/export-page/manager-competition?ym={{date('Y-m')}}" class="submit execute-export10" download>@lang('message.export')</a>
                                </div>
                            </div>
                            <div class="field-container">
                                <div class="input-block w260">
                                    @lang('message.clients_dynamics')
                                </div>
                                <div class="input-block">
                                    <label>&nbsp;</label>
                                    <a href="/manager/export-page/clients-dynamics-export" class="submit execute-export11" download>@lang('message.export')</a>
                                </div>
                            </div>
                            <div class="field-container">
                                <div class="input-block w260">
                                    @lang('message.active_clients_this_month')
                                </div>
                                <div class="input-block">
                                    <label>&nbsp;</label>
                                    <a href="/manager/export-page/active-clients-this-month-export" class="submit execute-export12" download>@lang('message.export')</a>
                                </div>
                            </div>
                            <hr>
                            <div class="field-container">
                                <div class="input-block w260">
                                    Маркетинг (LTV)
                                </div>
                                {{--
                                <div class="input-block">
                                    <label>@lang('message.month_start_period')</label>
                                    <select id="incoming-leads-export-period9_">
                                        @foreach($marketingPeriod as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block" style="margin-right: 25px;">
                                    <label>@lang('message.month_finish_period')</label>
                                    <select id="incoming-leads-export-period10_">
                                        @foreach($marketingPeriod as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                --}}
                                <div class="input-block" style="margin-right:0px;">
                                    <label>&nbsp;</label>
                                    <a href="/manager/export-page/ltv" class="submit execute-export9_" download>@lang('message.export')</a>
                                </div>
                            </div>
                            {{--
                            <div class="field-container">
                                <div class="input-block w260">
                                    Статистика менеджеров
                                </div>
                                <div class="input-block" style="margin-right:0px;">
                                    <label>&nbsp;</label>
                                    <a href="/manager/export-page/manager-statistics" class="submit execute-export9__" download>@lang('message.export')</a>
                                </div>
                            </div>
                            --}}
                            <hr>
                            <div class="field-container">
                                <div class="input-block w260">
                                    @lang('message.clients_fin_data')
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.month2')</label>
                                    <select id="incoming-leads-export-period8">
                                        @foreach($clientsMonthList as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block">
                                    <label>&nbsp;</label>
                                    <a href="/manager/export-page/clients-for-bookkeeper?ym={{date('Y-m')}}" class="submit execute-export8" download>@lang('message.export')</a>
                                </div>
                            </div>
                            <hr>
                            <div class="field-container">
                                <div class="input-block w260">
                                    @lang('message.clients_count_by_period')
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.month_start_period')</label>
                                    <select id="incoming-leads-export-period9">
                                        @foreach($clientsMonthList as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block" style="margin-right: 25px;">
                                    <label>@lang('message.month_finish_period')</label>
                                    <select id="incoming-leads-export-period10">
                                        @foreach($clientsMonthList as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block" style="margin-right:0px;">
                                    <label>&nbsp;</label>
                                    <a href="/manager/export-page/clients-count?ym={{date('Y-m')}}" class="submit execute-export9" download>@lang('message.export')</a>
                                </div>
                            </div>
                            <hr>
                            <div class="field-container">
                                <div class="input-block w260">
                                    @lang('message.clients_zhamkov')
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.month2')</label>
                                    <select id="incoming-leads-export-period4">
                                        @foreach($clientsMonthList as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block">
                                    <label>&nbsp;</label>
                                    <a href="/manager/export-page/clients?ym={{date('Y-m')}}" class="submit execute-export6" download>@lang('message.export')</a>
                                </div>
                            </div>
                            <div class="field-container">
                                <div class="input-block w260">
                                    @lang('message.clients_zhamkov_by_period')
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.month_start_period')</label>
                                    <select id="incoming-leads-export-period5">
                                        @foreach($clientsMonthList as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block" style="margin-right: 25px;">
                                    <label>@lang('message.month_finish_period')</label>
                                    <select id="incoming-leads-export-period6">
                                        @foreach($clientsMonthList as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block" style="margin-right:0px;">
                                    <label>&nbsp;</label>
                                    <a href="/manager/export-page/clients?ym={{date('Y-m')}}" class="submit execute-export7" download>@lang('message.export')</a>
                                </div>
                            </div>
                            <hr>
                            <div class="field-container">
                                <div class="input-block w260">
                                    @lang('message.expected_bills')
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.period')</label>
                                    <select name="period" class="w260">
                                        <option value="current" selected>@lang('message.current_month')</option>
                                        <option value="2month">@lang('message.current_and_next_month')</option>
                                        <option value="all">@lang('message.all_month_from_current')</option>
                                    </select>
                                </div>
                                <div class="input-block">
                                    <label>&nbsp;</label>
                                    <a href="/manager/expected-bills/export?period=current" class="submit execute-export2">@lang('message.export')</a>
                                </div>
                            </div>
                            <div class="field-container">
                                <div class="input-block w260">
                                    Неоплачені власники
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.period')</label>
                                    <select id="incoming-leads-export-period14" class="w260">
                                        @foreach($clientsMonthListForUnpaidSuppliers as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block">
                                    <label>&nbsp;</label>
                                    <a href="/manager/export-page/unpaid-suppliers?period={{date('Y-m', strtotime('+14days'))}}" class="submit execute-export14">@lang('message.export')</a>
                                </div>
                            </div>
                            <hr>
                            @if(Auth::user()->id != 248)
                            <div class="field-container">
                                <div class="input-block w260">
                                    @lang('message.boards_statistic')
                                </div>
                                <div class="input-block">
                                    <label>Месяц</label>
                                    <select name="period2" class="w260">
                                        @foreach($monthListBoards as $ym => $name)
                                            <option value="{{$ym}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block">
                                    <label>&nbsp;</label>
                                    <a href="/manager/boards-statistic/export?period={{date('Y-m')}}" class="submit execute-export3">@lang('message.export')</a>
                                </div>
                            </div>
                            <div class="field-container">
                                <div class="input-block w260">
                                    @lang('message.boards_statistic_period')
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.month_start')</label>
                                    <select name="period3" class="w260">
                                        @foreach($monthListBoards as $ym => $name)
                                            <option value="{{$ym}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block" style="margin-right: 25px;">
                                    <label>@lang('message.month_finish')</label>
                                    <select name="period4" class="w260">
                                        @foreach($monthListBoards as $ym => $name)
                                            <option value="{{$ym}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block" style="margin-right:0px;">
                                    <label>&nbsp;</label>
                                    <a href="/manager/boards-statistic/export?period={{date('Y-m')}}" class="submit execute-export5">@lang('message.export')</a>
                                </div>
                            </div>
                                <div class="field-container">
                                    <div class="input-block w260">
                                        @lang('message.boards_statistics_full')
                                    </div>

                                    <div class="input-block" style="margin-right:0px;">
                                        <label>&nbsp;</label>
                                        <a href="/manager/boards-statistic/export-by-firms-and-cities" class="submit execute-export-by-firms-and-cities">@lang('message.export')</a>
                                    </div>
                                </div>
                            <hr>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('add.footer')
<style>
    a.submit{
        box-sizing: border-box;
        display: inline-block;
        height: 42px;
        padding: 0 10px;
    }
    .w260,
    #incoming-leads-export-period,
    #incoming-leads-export-period2,
    #incoming-leads-export-period3,
    #incoming-leads-export-period4,
    #incoming-leads-export-period5,
    #incoming-leads-export-period6,
    #incoming-leads-export-period8,
    #incoming-leads-export-period9,
    #incoming-leads-export-period10,
    #incoming-leads-export-period9_,
    #incoming-leads-export-period10_{
        width: 260px;
    }
    .input-block.w260{
        display: flex;
        align-items: center;
        padding-top: 21px;
        font-weight: bold;
    }
</style>
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
@include('front.crm.scripts')
<script>
    $(document).ready(function (){
        //$('#incoming-leads-export-period').select2({minimumResultsForSearch: -1});
        $('#incoming-leads-export-period2').select2({minimumResultsForSearch: -1});
        $('#incoming-leads-export-period3').select2({minimumResultsForSearch: -1});
        $('#incoming-leads-export-period5').select2({minimumResultsForSearch: -1});
        $('#incoming-leads-export-period6').select2({minimumResultsForSearch: -1});
        $('#incoming-leads-export-period9').select2({minimumResultsForSearch: -1});
        $('#incoming-leads-export-period10').select2({minimumResultsForSearch: -1});
        /*$('#incoming-leads-export-period9_').select2({minimumResultsForSearch: -1});
        $('#incoming-leads-export-period10_').select2({minimumResultsForSearch: -1});*/
        $('#manager-competition').change(function (){
            $('.execute-export10').attr('href', "/manager/export-page/manager-competition?ym="+$(this).val());
        }).select2({minimumResultsForSearch: -1});
        $('#incoming-leads-export-period').change(function (){
            $('.execute-export').attr('href', "/manager/incoming-leads-export/export?ym="+$(this).val());
        }).select2({minimumResultsForSearch: -1});
        $('#incoming-leads-export-period4').change(function (){
            $('.execute-export6').attr('href', "/manager/export-page/clients?ym="+$(this).val());
        }).select2({minimumResultsForSearch: -1});
        $('#incoming-leads-export-period8').change(function (){
            $('.execute-export8').attr('href', "/manager/export-page/clients-for-bookkeeper?ym="+$(this).val());
        }).select2({minimumResultsForSearch: -1});
        $('#incoming-leads-export-period2, #incoming-leads-export-period3').change(function(){
            $('.execute-export4').attr('href', "/manager/incoming-leads-export/export?ym="+$('#incoming-leads-export-period2').val()+'/'+$('#incoming-leads-export-period3').val());
        })
        $('#incoming-leads-export-period5, #incoming-leads-export-period6').change(function(){
            $('.execute-export7').attr('href', "/manager/export-page/clients?ym="+$('#incoming-leads-export-period5').val()+'/'+$('#incoming-leads-export-period6').val());
        })
        $('#incoming-leads-export-period9, #incoming-leads-export-period10').change(function(){
            $('.execute-export9').attr('href', "/manager/export-page/clients-count?ym="+$('#incoming-leads-export-period9').val()+'/'+$('#incoming-leads-export-period10').val());
        })
        /*$('#incoming-leads-export-period9_, #incoming-leads-export-period10_').change(function(){
            $('.execute-export9_').attr('href', "/manager/export-page/marketing-data?ym="+$('#incoming-leads-export-period9_').val()+'/'+$('#incoming-leads-export-period10_').val());
        })*/
        $('[name="period"]').change(function(){
            $('.execute-export2').attr('href', '/manager/expected-bills/export?period='+$(this).val());
        }).select2({minimumResultsForSearch: -1})
        $('[name="period2"]').change(function(){
            $('.execute-export3').attr('href', '/manager/boards-statistic/export?period='+$(this).val());
        }).select2({minimumResultsForSearch: -1})
        $('[name="period3"]').select2({minimumResultsForSearch: -1});
        $('[name="period4"]').select2({minimumResultsForSearch: -1});
        $('[name="period3"], [name="period4"]').change(function(){
            $('.execute-export5').attr('href', '/manager/boards-statistic/export?period='+$('[name="period3"]').val()+'/'+$('[name="period4"]').val());
        })
        $('#incoming-leads-export-period14').change(function (){
            $('.execute-export14').attr('href', "/manager/export-page/unpaid-suppliers?period="+$(this).val());
        }).select2({minimumResultsForSearch: -1});

        $('.execute-export, .execute-export2, .execute-export3, .execute-export4, .execute-export5, .execute-export6, .execute-export7, .execute-export8, .execute-export9,  .execute-export10, .execute-export9_, .execute-export9__, .execute-export10_, .execute-export11, .execute-export12, .execute-export14, .execute-export-by-firms-and-cities').click(function(){
            let this_ = this;
            $(this).empty().append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
            $.ajax({
                url: $(this).attr('href'),
                method: 'GET',
                xhrFields: {
                    responseType: 'blob'
                },
                success: function (data, status, xhr) {
                    let filename = "";
                    let disposition = xhr.getResponseHeader('Content-Disposition');
                    if (disposition && disposition.indexOf('attachment') !== -1) {
                        let filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                        let matches = filenameRegex.exec(disposition);
                        if (matches != null && matches[1]) {
                            filename = matches[1].replace(/['"]/g, '');
                        }
                    }
                    let a = document.createElement('a');
                    let url = window.URL.createObjectURL(data);
                    a.href = url;
                    a.download = filename;
                    document.body.append(a);
                    a.click();
                    a.remove();
                    window.URL.revokeObjectURL(url);
                    $(this_).empty().append('@lang('message.export')');
                },
                error: function() {
                    toastr.warning('@lang('message.data_processing_error')');
                    $(this_).empty().append('@lang('message.export')');
                }
            });
            return false;
        })
    })
</script>
<?php
