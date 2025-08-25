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
                <span class="btn crm-button update-dashboard">Обновить данные</span>
            </div>
        </div>

        <iframe width="100%" height="1024px" src="https://docs.google.com/spreadsheets/d/{{ $fileId }}/view"></iframe>
    </div>
</section>
@include('add.footer')

<div class="al-overlay3 hide"></div>
@include('front.crm.footer')
@include('front.crm.scripts')
<style>
    .posts-block{
        position: relative;
    }
    .update-dashboard{
        position: absolute;
        right: 0;
        top: 0;
    }
</style>
<script>
    $('.update-dashboard').click(function(){
        let this_ = this;
        $(this).empty().append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
        $.ajax({
            url: '/manager/marketing-data/update',
            method: 'POST',
            success: function (data, status, xhr) {
                toastr.warning('Данные обновлены');
                $(this_).empty().append('Обновить данные');
            },
            error: function() {
                toastr.warning('Ошибка обработки данных');
                $(this_).empty().append('Обновить данные');
            }
        });
    })
</script>
