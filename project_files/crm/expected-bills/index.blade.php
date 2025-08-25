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
                                <div class="input-block">
                                    <label>Период</label>
                                    <select name="period">
                                        <option value="current" selected>@lang('message.current_month')</option>
                                        <option value="2month">@lang('message.current_and_next_month')</option>
                                        <option value="all">@lang('message.all_month_from_current')</option>
                                    </select>
                                </div>
                                <div class="input-block">
                                    <label>&nbsp;</label>
                                    <a href="/manager/expected-bills/export?period=current" class="submit execute-export">@lang('message.export')</a>
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
</style>
<div class="al-overlay3 hide"></div>
@include('front.crm.footer')
@include('front.crm.scripts')
<script>
    $(document).ready(function(){
        $('[name="period"]').change(function(){
            $('.execute-export').attr('href', '/manager/expected-bills/export?period='+$(this).val());
        }).select2({minimumResultsForSearch: -1})
        $('.execute-export').click(function(){
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
                    $('.execute-export').empty().append('@lang('message.export')');
                },
                error: function() {
                    toastr.warning('@lang('message.data_processing_error')');
                    $('execute-export').empty().append('@lang('message.export')');
                }
            });
            return false;
        })
    })
</script>
