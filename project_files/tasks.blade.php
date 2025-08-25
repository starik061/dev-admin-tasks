@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
$webp = "";
@endphp

<section id="result-search-list" class="al-leeds-page">
  <div class="container-fluid container-fluid-base">
    <div class="row no-gutters">
      <div class="container container-base container-search-result manager-search mw1460">
        <h1 class="title-search-result">
          {{ $data['seo']->h1_title }}
        </h1>
        <div class="content-block clearfix">
          <div class="leads-table">
          <!-- Контент -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('add.footer')
<div class="al-overlay3 hide zi10101"></div>
@include('front.crm.footer')
<div class="confirm-popup2" style="z-index:10111">
    <div class='confirm-header'>
        <span class="confirm-title"></span>
        <span class="close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
            </svg>
        </span>
    </div>
    <div class="confirm-body">
        <div class="confirm-message"></div>
        <div class="align-right confirm-action">
            <a class="cancel pointer">@lang('message.cancel')</a>
            <a class="yes pointer">@lang('message.yes')</a>
        </div>
    </div>
</div>
@include('front.crm.scripts')