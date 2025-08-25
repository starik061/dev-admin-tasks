@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<section id="result-search-list" class="al-client-info">
  <div class="container-fluid container-fluid-base">
    <div class="row no-gutters">
      <div class="container container-base container-search-result manager-search our-details">
        <div class="favorite-viewed-tab system-info-tabs">
          @include('front.crm.settings-menu')
        </div>
        <h1 class="title-search-result">
          {{ $data['seo']->h1_title }}
        </h1>
        <div class="content-block content-our-details">
          <form action="/manager/classes/{{ $class->id }}/edit" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class='input-group'>
              <div class="input-block">
                <label>@lang('message.company_name2')</label>
                <input type="text" name="name" value="{{ $class->name }}" required class="full_name--"/>
                @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class='input-group'>
              <div class="input-block mr0">
                <label>LTV</label>
                <input type="number" name="live_time_value" value="{{ $class->live_time_value }}" required/>
                @if ($errors->has('live_time_value'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('live_time_value') }}</strong>
                  </span>
                @endif
              </div>
              <div class="input-block mr0" style="margin-left: 10px">
                <label>LT</label>
                <input type="number" name="live_time" value="{{ $class->live_time }}"/>
                @if ($errors->has('live_time'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('live_time') }}</strong>
                  </span>
                @endif
              </div>

              <div class="input-block mr0">
                <label>@lang('message.real_avg_bill')</label>
                <input type="number" name="real_avg_bill" value="{{ $class->real_avg_bill }}" required/>
                @if ($errors->has('real_avg_bill'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('real_avg_bill') }}</strong>
                  </span>
                @endif
              </div>

              <div class="input-block mr0" style="margin-left: 10px">
                <label>@lang('message.background')</label>
                <input type="text" name="background" value="{{ $class->background }}"/>
                @if ($errors->has('background'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('background') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="buttons-block">
              <button class="crm-button">@lang('message.save')</button>
            </div>
          </form>
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

@include('front.crm.scripts')

@if(session('success') || @$success)
  <script>
    let w = $('.success-mesage').width();
    $('.success-mesage').css('margin-left','-'+(w/2)+'px');
    $('.success-mesage').css('opacity','1');
    if(window.location.href.indexOf("created")){
      window.history.pushState({},$('title').text(),main_url);
    }
    setTimeout(function(){
      $('.success-mesage').css('opacity','0');
    },3000)
  </script>
@endif