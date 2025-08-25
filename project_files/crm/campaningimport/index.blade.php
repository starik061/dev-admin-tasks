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
                        <div class="excel-file-ads">
                            <label for="import_file_any_w" class="forloadads">Кампания бютжет, покахзы и т.д. неделя</label>
                        <input type="file" name="import_file_ads_w" id="import_file_ads_w"/>
                            <label for="workdys_w">Кількість робочих днів</label>
                            <input type="number" name="workdys_w" id="workdys_w"/>
                        </div>

                        <div class="excel-file-ads">
                            <label for="import_file_any_w" class="forloadads">Статистика аукционов по кампаниям неделя</label>
                        <input type="file" name="import_file_any_w" id="import_file_any_w"/>
                        </div>
                        <div class="excel-file-ads">
                            <label for="import_file_any_w" class="forloadads">Потер. пок. в поиск. сети неделя</label>
                            <input type="file" name="import_file_pot_w" id="import_file_pot_w"/>
                        </div>
                        <div class="excel-file-ads">
                            <label for="import_file_any_w" class="forloadads">Кампания бютжет, покахзы и т.д. месяц</label>
                            <input type="file" name="import_file_ads_m" id="import_file_ads_m"/>
                            <label for="workdys_m">Кількість робочих днів</label>
                            <input type="number" name="workdys_m" id="workdys_m"/>
                        </div>
                        <div class="excel-file-ads">
                            <label for="import_file_any_w" class="forloadads">Статистика аукционов по кампаниям месяц</label>
                        <input type="file" name="import_file_any_m" id="import_file_any_m"/>
                        </div>
                        <div class="excel-file-ads">
                            <label for="import_file_any_w" class="forloadads">Потер. пок. в поиск. сети месяц</label>
                            <input type="file" name="import_file_pot_m" id="import_file_pot_m"/>
                        </div>

                            <a class="pointer upload-ads-excel btn btn-style" id="upload-ads-excel" style="padding: 0 20px; color:white;">Завантажити файли</a>

                    </div>
                </div>
            </div>
        </div>
        <iframe width="100%" height="1024px" src="https://docs.google.com/spreadsheets/d/1ex8WP5VKsS4iD_im38Yy8GzQLLvaF7ncH0nmguqFdrc/edit#gid=0">

        </iframe>
    </div>
</section>
@include('add.footer')

<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
@include('front.crm.scripts')
