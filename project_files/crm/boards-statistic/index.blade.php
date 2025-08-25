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
                                    @lang('message.boards_statistic')
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.month2')</label>
                                    <select name="period" class="w260">
                                        @foreach($monthList as $ym => $name)
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
                                        @foreach($monthList as $ym => $name)
                                            <option value="{{$ym}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block" style="margin-right: 25px;">
                                    <label>@lang('message.month_finish')</label>
                                    <select name="period4" class="w260">
                                        @foreach($monthList as $ym => $name)
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
    .w260{
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
@include('front.crm.footer')
@include('front.crm.scripts')
<script>
    $(document).ready(function(){
        $('[name="period"]').change(function(){
            $('.execute-export3').attr('href', '/manager/boards-statistic/export?period='+$(this).val());
        }).select2({minimumResultsForSearch: -1})
        $('[name="period3"]').select2({minimumResultsForSearch: -1});
        $('[name="period4"]').select2({minimumResultsForSearch: -1});
        $('[name="period3"], [name="period4"]').change(function(){
            $('.execute-export5').attr('href', '/manager/boards-statistic/export?period='+$('[name="period3"]').val()+'/'+$('[name="period4"]').val());
        })
        $('.execute-export3, .execute-export5, .execute-export-by-firms-and-cities').click(function(){
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
                    $(this_).empty().append('Экспорт');
                },
                error: function() {
                    toastr.warning('Ошибка обработки данных');
                    $(this_).empty().append('Экспорт');
                }
            });
            return false;
        })
    })
</script>
