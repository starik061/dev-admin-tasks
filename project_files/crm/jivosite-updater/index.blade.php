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
                            @if(session('success') || @$success)
                                <div class="success-message">
                                    {!! session('success') !!}
                                </div>
                            @endif
                            <form method="POST">
                                <div class="field-container">
                                    <div class="input-block">
                                        <label>Ссылка на файл jivosite</label>
                                        <input type="text" name="url" required style="width:720px;"/>
                                    </div>
                                    <div class="input-block">
                                        <label>&nbsp;</label>
                                        <button class="submit">Скачать и обработать</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('add.footer')
<style>
    .success-message{
        width: 100%;
        margin: 15px 0;
        padding: 10px;
        background: #fff0ec;
        border: solid 1px #404040;
    }
</style>
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
@include('front.crm.scripts')
