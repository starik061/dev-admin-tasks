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
    #incoming-leads-export-period{
        width: 260px;
    }
</style>
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
@include('front.crm.scripts')
<script>
    $(document).ready(function (){
        $('#incoming-leads-export-period').select2({minimumResultsForSearch: -1});
        $('#incoming-leads-export-period').change(function (){
            $('.execute-export').attr('href', "/manager/incoming-leads-export/export?ym="+$(this).val());
        })
    })
</script>
