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
              <ul class="tab-navigate">
                <li class="tab-item active" data-tab="#main-kved-list">@lang('message.kved_main')</li>
                <li class="tab-item" data-tab="#other-kved-list">@lang('message.kved_addition')</li>
              </ul>
              <div class="show-count">
                @lang('message.show'):
                <span class="pointer active">5</span>
                <span class="pointer">10</span>
                <span class="pointer">20</span>
                <span class="pointer">@lang('message.all')</span>
              </div>
              <div class="data-table" id="main-kved-list">
                <div class="data-thead">
                  <div class="data-tr">
                    <div class="data-td td-name">@lang('message.kved')</div>
                    <div class="data-td td-name">@lang('message.name2')</div>
                    <div class="data-td td-name">@lang('message.qty')</div>
                  </div>
                </div>
                <div class="data-tbody contracts-rows">
                  @foreach($results as $k => $kved)
                  <div class="data-tr @if($k > 4) hide @endif">
                    <div class="data-td td-name">{{$kved['code']}}</div>
                    <div class="data-td td-name">{{$kved['name']}}</div>
                    <div class="data-td td-name">{{$kved['count']}}</div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="data-table hide" id="other-kved-list">
                <div class="data-thead">
                  <div class="data-tr">
                    <div class="data-td td-name">@lang('message.kved')</div>
                    <div class="data-td td-name">@lang('message.name2')</div>
                    <div class="data-td td-name">@lang('message.qty')</div>
                  </div>
                </div>
                <div class="data-tbody contracts-rows">
                  @foreach($otherKveds as $k=> $kved)
                  <div class="data-tr @if($k > 4) hide @endif">
                    <div class="data-td td-name">{{$kved['code']}}</div>
                    <div class="data-td td-name">{{$kved['name']}}</div>
                    <div class="data-td td-name">{{$kved['count']}}</div>
                  </div>
                  @endforeach
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
<style>
.clients-contracts-data{
  position: relative;
}
.show-count{
  position: absolute;
  right: 0;
  top: 0;
}
.show-count span{
  padding: 2px;
  margin-right: 3px;
  font-weight:500;
}
.show-count span.active,
.show-count span:hover{
  color:#FC6B40;
}
.data-table.hide,
.data-tr.hide{
  display: none;
}
.tab-navigate{
  list-style:none;
  margin: 0;
  padding: 0;
  border-bottom: solid 1px #cdd4d9;
}
.tab-navigate li{
  cursor: pointer;
  font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 18px;
  line-height: 22px;
  color: #FC6B40;
  padding-bottom: 7px;
  display: inline-block;
  margin-right: 20px;
  border-bottom: 2px solid rgba(0,0,0,0);
}
.tab-navigate li:hover,
.tab-navigate li.active{
  border-bottom: 2px solid #fc6b40;
  color: #3D445C;
}
</style>
<script>
$(document).ready(function(){
  $('.tab-item').click(function(){
    $('.tab-item').removeClass('active');
    $(this).addClass('active');
    $('.data-table').addClass('hide');
    $($(this).data('tab')).removeClass('hide');
  })
  $('.show-count span').click(function(){
    $('.show-count span').removeClass('active')
    $(this).addClass('active');
    const linesCount = isNaN(parseInt($(this).text())) ? 10000 : parseInt($(this).text());
    $('.data-tbody').each(function(){
      $(this).find('.data-tr').each(function(index){
        if(index < linesCount){
          $(this).removeClass('hide');
        }else{
          $(this).addClass('hide');
        }
      })
    })
  })
})
</script>
