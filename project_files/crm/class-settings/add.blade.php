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
          <form action="/manager/classes/add" method="post" enctype="multipart/form-data">
            <div class='input-group'>
              <div class="input-block">
                <label>@lang('message.company_name2')</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="full_name--"/>
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
                <input type="number" name="live_time_value" value="{{ old('live_time_value') }}" required/>
                @if ($errors->has('live_time_value'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('live_time_value') }}</strong>
                  </span>
                @endif
              </div>
              <div class="input-block mr0" style="margin-left: 10px">
                <label>LT</label>
                <input type="number" name="live_time" value="{{ old('live_time') }}"/>
                @if ($errors->has('live_time'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('live_time') }}</strong>
                  </span>
                @endif
              </div>

              <div class="input-block mr0" style="margin-left: 10px">
                <label>@lang('message.real_avg_bill')</label>
                <input type="number" name="real_avg_bill" value="{{ old('real_avg_bill') }}"/>
                @if ($errors->has('real_avg_bill'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('real_avg_bill') }}</strong>
                  </span>
                @endif
              </div>

              <div class="input-block mr0" style="margin-left: 10px">
                <label>@lang('message.background')</label>
                <input type="text" name="background" value="{{ old('background') }}"/>
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

<script>
var main_url = '/manager/detials';
</script>

@include('front.crm.scripts')
