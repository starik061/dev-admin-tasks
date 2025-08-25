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
                <form method="post" action="/manager/binotel">
                  <div class="data-tbody contracts-rows">

                    <div class="data-tr" @if(Auth::user()->id == 273) style="display:none" @endif>
                      <div class="data-td td-name">Key</div>
                      <div class="data-td action-col field-container">
                        <div class="input-block" style="margin:0">
                          <input type="text" name="key" value="{{$settings[0]->value}}" required>
                        </div>
                      </div>
                    </div>
                    <div class="data-tr" @if(Auth::user()->id == 273) style="display:none" @endif>
                      <div class="data-td td-name">Secret</div>
                      <div class="data-td action-col field-container">
                        <div class="input-block" style="margin:0">
                          <input type="text" name="secret" value="{{$settings[1]->value}}" required>
                        </div>
                      </div>
                    </div>

                    {{--
                    <div class="data-tr">
                      <div class="data-td td-name">Номер телефона</div>
                      <div class="data-td action-col field-container">
                        <div class="input-block" style="margin:0">
                          <input type="text" name="phone" value="{{$settings[2]->value}}" required>
                        </div>
                      </div>
                    </div>
                    --}}
                    <div class="data-tr">
                      <div class="data-td td-name">@lang('message.manager_rotation')</div>
                      <div class="data-td action-col field-container">
                        <div class="input-block binotel-manager-options">
                          <label>
                            <input type="radio" name="rotation" value="1" @if($settings[3]->value == '1') checked @endif>&nbsp;@lang('message.by_days')
                          </label>
                          <label>
                            <input type="radio" name="rotation" value="2" @if($settings[3]->value == '2') checked @endif>&nbsp;@lang('message.during_the_day')
                          </label>
                          <label>
                            <input type="radio" name="rotation" value="3" @if($settings[3]->value == '3') checked @endif>&nbsp;@lang('message.least_busy')
                          </label>
                          <label>
                            <input type="radio" name="rotation" value="4" @if($settings[3]->value == '4') checked @endif>&nbsp;@lang('message.forcibly')
                          </label>
                          <select name="manager" class="manager-list" @if($settings[3]->value != '4') style="display:none;" @endif>
                            <option value="0" @if($settings[4]->value == '0') selected @endif>-</option>
                            @foreach($managersList as $id => $name)
                            <option value="{{$id}}" @if($settings[4]->value == $id) selected @endif>{{$name}}</option>
                            @endforeach
                          </select>
                        </div>
                            
                      </div>
                    </div>
                    <div class="data-tr">
                      <div class="data-td td-name">@lang('message.manager_exclude')</div>
                      <div class="data-td action-col field-container">
                        <div class="input-block binotel-manager-options">
                          @foreach($managersList as $id => $name)
                            @if($id != 195)
                              <label>
                                <input type="checkbox" name="exclude_manager[]" value="{{$id}}" @if(in_array($id, json_decode($settings[6]->value))) checked @endif>&nbsp;{{$name}}
                              </label>
                            @endif
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="crm-button mt20">Сохранить</button>
                </form>
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
<script>
$(document).ready(function(){
  $('[name="rotation"]').change(function(){
    if($('[name="rotation"]:checked').val() == '4'){
      $('.manager-list').show();
    }else{
      $('.manager-list').hide();
    }
  })
})
</script>
