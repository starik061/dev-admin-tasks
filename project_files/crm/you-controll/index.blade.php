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
        <div class="favorite-viewed-tab system-info-tabs">
          @include('front.crm.settings-menu')
        </div>
        <h1 class="title-search-result">
            {{ $data['seo']->h1_title }}
        </h1>
        <div class="content-block posts-block">
          <div class="posts-list">
            <div class="clients-contracts-data">
              <div class="data-table">
                <div class="data-thead">
                  <div class="data-tr">
                    <div class="data-td td-name">@lang('message.parameter')</div>
                    <div class="data-td action-col"></div>
                  </div>
                </div>
                <div class="data-tbody contracts-rows">
                  <div class="data-tr">
                    <div class="data-td td-name">@lang('message.request_count')</div>
                    <div class="data-td action-col">{{$count}} / {{$limit}}</div>
                  </div>
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
@if(session('success') || @$success)
<div class="success-mesage">
  {!! session('name') !!}
</div>
@endif
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
@include('front.crm.scripts')
